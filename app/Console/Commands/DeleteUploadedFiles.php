<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteUploadedFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'files:delete {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete files from the specified uploads path';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('path');  // Get the directory path from the argument

        // Get all files in the directory and its subdirectories
        $files = Storage::disk('public')->allFiles($path);

        if (empty($files)) {
            $this->info("No files found in the directory {$path}.");
        } else {
            // Delete all files
            Storage::disk('public')->delete($files);
            $this->info("All files in {$path} and its subdirectories have been deleted.");
        }

        return 0;
    }

}
