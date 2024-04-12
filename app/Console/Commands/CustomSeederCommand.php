<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Database\Console\Seeds\SeedCommand;
use Stancl\Tenancy\Concerns\HasATenantsOption;
use Stancl\Tenancy\Events\DatabaseSeeded;
use Stancl\Tenancy\Events\SeedingDatabase;
use Illuminate\Support\Facades\Artisan;

class CustomSeederCommand extends SeedCommand
{
    use HasATenantsOption;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed tenant database(s).';

    protected $name = 'Customtenants:seed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ConnectionResolverInterface $resolver)
    {
        parent::__construct($resolver);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (config('tenancy.seeder_parameters') as $parameter => $value) {
            if (! $this->input->hasParameterOption($parameter)) {
                $this->input->setOption(ltrim($parameter, '-'), $value);
            }
        }

        if (! $this->confirmToProceed()) {
            return;
        }

        tenancy()->runForMultiple($this->option('tenants'), function ($tenant) {
            $this->line("Tenant: {$tenant->getTenantKey()}");
            Artisan::call("passport:install");
        
        });
    }
}
