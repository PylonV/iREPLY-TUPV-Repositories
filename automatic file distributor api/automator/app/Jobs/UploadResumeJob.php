<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // ⬅️ This is important
use Illuminate\Foundation\Bus\Dispatchable; // ⬅️ This too
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadResumeJob implements ShouldQueue // ⬅️ This is required
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $path;
    public $destination;

    public function __construct($path, $destination)
    {
        $this->path = $path;
        $this->destination = $destination;
    }

public function handle()
{
    if ($this->destination === 'zoho') {
        // Logic to send resume to Zoho
    } elseif ($this->destination === 'airtable') {
        // Logic to send to Airtable
    } else {
        // Handle unknown or custom destination
        Log::warning("Unknown destination: " . $this->destination);
    }
    $service = app()->make('App\Services\ResumeUploadService');

    $service->send($this->filePath, $this->destination);
}
}
