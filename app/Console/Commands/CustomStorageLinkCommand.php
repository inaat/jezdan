<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Illuminate\Support\Facades\Artisan;

#[AsCommand(name: 'custom-storage:link')]
class CustomStorageLinkCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'custom-storage:link
                {--relative : Create the symbolic link using relative paths}
                {--force : Recreate existing symbolic links}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the symbolic links configured for the application';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $relative = $this->option('relative');
        //dd($relative);
        foreach ($this->links() as $link => $target) {
            if (file_exists($link) && ! $this->isRemovableSymlink($link, $this->option('force'))) {
                $this->components->error("The [$link] link already exists.");
             
                $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';

                // Change directory to the parent directory of the storage folder
                $parentDirectory = $isWindows ? '..' : '../';
                chdir(public_path($parentDirectory));
        
                // Path to the storage folder
                $storageFolderPath = public_path('storage');
        
                // Remove the storage folder recursively
                $removeCommand = $isWindows ? 'rmdir /s /q ' : 'rm -rf ';
                exec($removeCommand . $storageFolderPath);

              Artisan::call('storage:link', [
                
              ]);
            continue;
            }

            if (is_link($link)) {
                $this->laravel->make('files')->delete($link);
            }

            if ($relative) {
                $this->laravel->make('files')->relativeLink($target, $link);
            } else {
                $this->laravel->make('files')->link($target, $link);
            }

            $this->components->info("The [$link] link has been connected to [$target].");
        }
    }

    /**
     * Get the symbolic links that are configured for the application.
     *
     * @return array
     */
    protected function links()
    {
        return 
               [public_path('storage') => storage_path('app/public/storage')];
    }

    /**
     * Determine if the provided path is a symlink that can be removed.
     *
     * @param  string  $link
     * @param  bool  $force
     * @return bool
     */
    protected function isRemovableSymlink(string $link, bool $force): bool
    {
        return is_link($link) && $force;
    }
}
