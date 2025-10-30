<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\DownloadJob;
use Illuminate\Console\Command;

class TriggerDownloadCommand extends Command
{
    protected $signature = 'download:client {clientId}';
    protected $description = 'Triggers a file download from a specified client.';

    public function handle()
    {
        $clientId = $this->argument('clientId');
        
        if (!Client::find($clientId)) {
            $this->error("Client with ID {$clientId} not found.");
            return Command::FAILURE;
        }

        $job = DownloadJob::create([
            'client_id' => $clientId,
            'status' => 'pending',
            'file_path' => '$HOME/file_to_download.txt',
        ]);
        
        $this->info("Download job #{$job->id} created for client ID {$clientId}.");
        $this->comment("The client is expected to start the upload on its next poll.");

        return Command::SUCCESS;
    }
}