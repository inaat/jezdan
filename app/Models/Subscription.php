<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


class Subscription extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'package_details' => 'array'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Scope a query to only include approved subscriptions.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeWaiting($query)
    {
        return $query->where('status', 'waiting');
    }

    public function scopeDeclined($query)
    {
        return $query->where('status', 'declined');
    }
    
    /**
    * Get the package that belongs to the subscription.
    */
    public function package()
    {
        return $this->belongsTo('Package')
            ->withTrashed();
    }

    /**
     * Returns the active subscription details for a business
     *
     *
     * @return Response
     */
    public static function active_subscription()
    {
        $date_today = Carbon::today()->toDateString();
        
        $subscription = Subscription::
                        whereDate('start_date', '<=', $date_today)
                            ->whereDate('end_date', '>=', $date_today)
                            ->approved()
                            ->first();

        return $subscription;
    }

    /**
     * Returns the upcoming subscription details for a business
     *
     *
     * @return Response
     */
    public static function upcoming_subscriptions()
    {
        $date_today = Carbon::today();
        
        $subscription = Subscription::
                            whereDate('start_date', '>', $date_today)
                            ->approved()
                            ->get();

        return $subscription;
    }

    /**
     * Returns the subscriptions waiting for approval for superadmin
     *
     * @param $business_id int
     *
     * @return Response
     */
    public static function waiting_approval()
    {
        $subscriptions = Subscription::
                            whereNull('start_date')
                            ->waiting()
                            ->get();

        return $subscriptions;
    }

    public static function end_date()
    {
        $date_today = Carbon::today();

        // $subscription = Subscription::
        //                 approved()
        //                     ->select(DB::raw("MAX(end_date) as end_date"))
        //                     ->first();

       // if (empty($subscription)) {
            return $date_today;
        // } else {
        //     $end_date = $subscription->end_date->addDay();
        //     if ($date_today->lte($end_date)) {
        //         return $end_date;
        //     } else {
        //         return $date_today;
        //     }
        // }
    }

    /**
     * Returns the list of packages status
     *
     * @return array
     */
    public static function package_subscription_status()
    {
        return ['approved' => trans("lang.approved"), 'declined' => trans("lang.declined"), 'waiting' => trans("lang.waiting")];
    }

    /**
     * Get the created_by.
     */
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_id');
    }

    /**
     * Get the subscription business relationship.
     */
  
}
