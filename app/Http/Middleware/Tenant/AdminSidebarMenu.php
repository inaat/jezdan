<?php

namespace App\Http\Middleware\Tenant;

use Closure;
use Menu;

class AdminSidebarMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if ($request->ajax()) {
            return $next($request);
        }
        $user = \Auth::user();

        if ($user->user_type == 'teacher') {
          
        } elseif ($user->user_type == 'student') {
           
        } elseif ($user->user_type == 'guardian') {
            $this->guardianSidebar();
        } elseif ($user->user_type == 'staff') {
            $this->staffSidebar();
        } else {
            $this->adminSidebar();
        }



        return $next($request);
    }

    private function adminSidebar()
    {
        Menu::create('admin-sidebar-menu', function ($menu) {
            // active mm-active $enabled_modules = !empty(session('business.enabled_modules')) ? session('business.enabled_modules') : [];

            $is_admin = auth()->user()->hasRole('Admin#' . session('system_details.id')) ? true : false;
            //Home

            $menu->header('MAIN MENU');
            $menu->url(action('HomeController@index'), __('english.dashboard'), ['icon' => 'bx bx-home', 'active' => request()->segment(1) == 'home'])->order(2);

            if (auth()->user()->can('campus.view')) {
                $menu->url(action('CampusController@index'), __('english.campuses'), ['icon' => 'bx bx-buildings', 'active' => request()->segment(1) == 'campuses'])->order(3);
            }
            if (auth()->user()->can('general_settings.view') || auth()->user()->can('session.view') || auth()->user()->can('roles.view') || auth()->user()->can('award.view') || auth()->user()->can('class_level.view') || auth()->user()->can('province.view') || auth()->user()->can('district.view') || auth()->user()->can('city.view') || auth()->user()->can('region.view')) {
                $menu->dropdown(
                    __('english.global_settings'),
                    function ($sub) {
                        if (auth()->user()->can('general_settings.view')) {
                            $sub->url(
                                action('SystemSettingController@index'),
                                __('english.general_setting'),
                                ['icon' => 'bx bx-cog ', 'active' => request()->segment(1) == 'setting']
                            );
                        }
                        if (auth()->user()->can('session.view') || auth()->user()->can('session.create')) {
                            $sub->url(
                                action('SessionController@index'),
                                __('session.sessions'),
                                ['icon' => 'bx bx-calendar ', 'active' => request()->segment(1) == 'session']
                            );
                        }
                        if (auth()->user()->can('roles.view')) {
                            $sub->url(
                                action('RoleController@index'),
                                __('english.roles'),
                                ['icon' => 'fa fas fa-briefcase', 'active' => request()->segment(1) == 'roles']
                            );
                        }

                        // $sub->url(
                        //     action('DesignationController@index'),
                        //     __('designation.designations'),
                        //     ['icon' => 'bx bx-shape-circle ', 'active' => request()->segment(1) == 'designation']
                        // );
                        // $sub->url(
                        //     action('DiscountController@index'),
                        //     __('discount.discounts'),
                        //     ['icon' => 'bx bx-disc ', 'active' => request()->segment(1) == 'discounts']
                        // );
                        if (auth()->user()->can('award.view')) {
                            $sub->url(
                                action('AwardController@index'),
                                __('award.awards'),
                                ['icon' => 'bx bx-award ', 'active' => request()->segment(1) == 'awards']
                            );
                        }
                        if (auth()->user()->can('class_level.view')) {
                            $sub->url(
                                action('ClassLevelController@index'),
                                __('class_level.class_level'),
                                ['icon' => 'bx bx-menu ', 'active' => request()->segment(1) == 'class_levels']
                            );
                        }
                        if (auth()->user()->can('province.view')) {
                            $sub->url(
                                action('ProvinceController@index'),
                                __('english.provinces'),
                                ['icon' => 'bx bx-cabinet ', 'active' => request()->segment(1) == 'provinces']
                            );
                        }
                        if (auth()->user()->can('district.view')) {
                            $sub->url(
                                action('DistrictController@index'),
                                __('english.districts'),
                                ['icon' => 'bx bx-cabinet ', 'active' => request()->segment(1) == 'districts']
                            );
                        }
                        if (auth()->user()->can('city.view')) {
                            $sub->url(
                                action('CityController@index'),
                                __('english.cities'),
                                ['icon' => 'bx bx-cabinet ', 'active' => request()->segment(1) == 'cities']
                            );
                        }
                        if (auth()->user()->can('region.view')) {
                            $sub->url(
                                action('RegionController@index'),
                                __('english.regions'),
                                ['icon' => 'bx bx-cabinet ', 'active' => request()->segment(1) == 'regions']
                            );
                        }
                    },
                    ['icon' => 'bx bx-globe']
                )->order(4);
            }
            if (auth()->user()->can('student.view') || auth()->user()->can('student.create') || auth()->user()->can('student_category.view')) {
                $menu->dropdown(
                    __('english.student_information'),
                    function ($sub) {
                        if (auth()->user()->can('student.view')) {
                            $sub->url(
                                action('StudentController@index'),
                                __('english.student_details'),
                                ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'students']
                            );
                        }
                        if (auth()->user()->can('student.create')) {
                            $sub->url(
                                action('StudentController@create'),
                                __('english.add_new_admission'),
                                ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'students' && request()->segment(2) == 'create']
                            );
                            $sub->url(
                                action('StudentController@bulkEdit'),
                                __('english.bulk_edit'),
                                ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'students' && request()->segment(2) == 'bulk-edit' || request()->segment(2) == 'get-bulk-edit']
                            );
                        }
                        if (auth()->user()->can('student_category.view')) {
                            $sub->url(
                                action('CategoryController@index'),
                                __('english.student_category'),
                                ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'categories']
                            );
                        }
                        if (auth()->user()->can('student_category.view')) {
                            $sub->url(
                                action('ImportStudentsController@index'),
                                __('english.import_students'),
                                ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'import-students']
                            );
                        }
                    },
                    ['icon' => 'bx bx-user-plus']
                )->order(5);
            }
            if (auth()->user()->can('class.view') || auth()->user()->can('section.view') || auth()->user()->can('subject.view') || auth()->user()->can('assign_subject.view')) {
                $menu->dropdown(
                    __('english.academic'),
                    function ($sub) {
                        if (auth()->user()->can('class.view')) {
                            $sub->url(
                                action('ClassController@index'),
                                __('class.classes'),
                                ['icon' => 'bx bx-right-arrow-alt ', 'active' => request()->segment(1) == 'classes']
                            );
                        }
                        if (auth()->user()->can('section.view')) {
                            $sub->url(
                                action('ClassSectionController@index'),
                                __('class_section.sections'),
                                ['icon' => 'bx bx-right-arrow-alt ', 'active' => request()->segment(1) == 'sections']
                            );
                        }
                     
                    },
                    ['icon' => 'bx bxs-institution']
                )->order(10);

            }
                //Fee Collector
                if (auth()->user()->can('fee.add_fee_payment') || auth()->user()->can('fee.fee_transaction_view') || auth()->user()->can('fee.fee_transaction_create') || auth()->user()->can('fee_head.view')) {
                    $menu->dropdown(
                        __('english.fees_collection'),
                        function ($sub) {
                            if (auth()->user()->can('fee.add_fee_payment')) {
                                $sub->url(
                                    action('FeeTransactionPaymentController@feeReceipt'),
                                    __('english.collect_fee'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'fee_receipt']
                                );
                                $sub->url(
                                    action('IndividualFeeCollectionController@create'),
                                    __('english.individual_fee_collect_with_detail'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'fee-collection']
                                );
                                $sub->url(
                                    action('FeeCollectionController@create'),
                                    __('english.fee_collect_with_detail'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'fee-collection']
                                );
                            }
                            if (auth()->user()->can('fee.fee_transaction_view')) {
                                $sub->url(
                                    action('FeeAllocationController@index'),
                                    __('english.fee_transactions'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'fee-allocation']
                                );
                            }
                            if (auth()->user()->can('fee.fee_transaction_create')) {
                                $sub->url(
                                    action('FeeAllocationController@create'),
                                    __('english.fees_allocation'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'fee-allocation' || request()->segment(1) == 'fees-assign-search' && request()->segment(2) == 'create']
                                );
                                $sub->url(
                                    action('FeeAllocationController@bulkAllocationCreate'),
                                   __('english.bulk'). __('english.fees_allocation'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'bulk-fee-allocation-create']
                                );
                                $sub->url(
                                    action('OtherFeeAllocationController@create'),
                                    __('english.other') . ' ' . __('english.fees_allocation'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'other-fee' || request()->segment(1) == 'fees-assign-search' && request()->segment(2) == 'create']
                                );
                            }
                            if (auth()->user()->can('fee_head.view')) {
                                $sub->url(
                                    action('FeeHeadController@index'),
                                    __('english.fee_heads'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'fee-heads']
                                );
                            }
                            if (auth()->user()->can('fee.increment_decrement')) {
                                $sub->url(
                                    action('FeeIncrementController@index'),
                                    __('english.fee_increment_decrement'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'fee-increment']
                                );
                            }
                            if (auth()->user()->can('print.challan_print')) {
                                $sub->url(
                                    action('SchoolPrinting\FeeCardPrintController@createClassWisePrint'),
                                    __('english.challan_print'),
                                    ['icon' => 'bx bx-right-arrow-alt ', 'active' => request()->segment(1) == 'class-wise-fee-card-printing']
                                );
                            }
                            if (auth()->user()->can('print.student_particular')) {
                                $sub->url(
                                    action('SchoolPrinting\StudentPrintController@index'),
                                    __('english.student_particular'),
                                    ['icon' => 'bx bx-right-arrow-alt ', 'active' => request()->segment(1) == '/student-particular']
                                );
                            }
                        },
                        ['icon' => 'bx bx-money']
                    )->order(8);
                }
                if (auth()->user()->can('notification.lesson_send_to_students') || auth()->user()->can('notification.weekend_and_holiday')) {
                    $menu->dropdown(
                        __('english.notifications'),
                        function ($sub) {
                        
                            if (auth()->user()->can('notification.weekend_and_holiday')) {
                                $sub->url(
                                    action('WeekendHolidayController@index'),
                                    __('english.weekend_and_holiday'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'weekend-holiday']
                                );
                            
                                $sub->url(
                                    action('GeneralSmsController@create'),
                                    __('english.general_sms'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'general-sms']
                                );
                              
                            }
                            if (auth()->user()->can('notification.weekend_and_holiday')) {
                                $sub->url(
                                    action('NotificationController@FeeRemainderCreate'),
                                    __('english.fee_remainder'),
                                    ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'fee_remainder']
                                );
                            }
                        
                            $sub->url(
                                action('WhatsAppController@index'),
                                __('Whatsapp Sms '),
                                ['icon' => 'bx bx-right-arrow-alt', 'active' => request()->segment(1) == 'sms-logs']
                            );
                        },
                        ['icon' => 'bx bxs-bell']
                    )->order(23);
                }
        });
    }



    private function guardianSidebar()
    {
        Menu::create('admin-sidebar-menu', function ($menu) {
            $menu->header('MAIN MENU');
            $this->global($menu);
            $menu->url(action('GuardianLayout\GuardianDashboardController@index'), __('english.dashboard'), ['icon' => 'bx bx-home', 'active' => request()->segment(2) == 'dashboard'])->order(1);
        
        });
    }
    private function staffSidebar()
    {
        Menu::create('admin-sidebar-menu', function ($menu) {
            $menu->header('MAIN MENU');
            $menu->url(action('StaffLayout\StaffDashboardController@index'), __('english.dashboard'), ['icon' => 'bx bx-home', 'active' => request()->segment(2) == 'dashboard'])->order(1);
            $menu->url(action('Hrm\HrmEmployeeController@employeeProfile', [\Auth::user()->hook_id]), __('english.profile'), ['icon' => 'bx bx-user', 'active' => request()->segment(1) == 'employee-profile'])->order(2);
        });
    }

    private function global ($menu)
    {
        
    }

}









//  Menu::create('navbar', function($menu) {
//     $menu->url('/', 'Home');
//     $menu->dropdown('Accounhhht', function ($sub) {
//         $sub->url('profile', 'Visit My Profile');
//         $sub->dropdown('Settings', function ($sub) {
//             $sub->url('settings/account', 'Account');
//             $sub->url('settings/password', 'Password');
//             $sub->url('settings/design', 'Design');
//         });
//         $sub->url('logout', 'Logout');
//     });