<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Uploadimage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filename;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename,$data)
    {
        $this->filename = $filename;
        $this->data = $data['email'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $filename = $this->filename;
        $user = User::where('email',$data)->first();
        $user->certification_file = $filename;
        $user->save();
    }
}
