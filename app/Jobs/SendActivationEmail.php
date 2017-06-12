<?php

namespace App\Jobs;

use App\User;
use App\Mail\UserActivation;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendActivationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $token = hash_hmac('sha256', str_random(40), config('app.key'));
        DB::table('user_activations')->insert([
          'userId' => $this->user->id,
          'token' => $token
        ]);
        Mail::to($this->user)->send(new UserActivation($token));
    }
}
