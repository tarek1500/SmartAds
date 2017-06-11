<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SMPTServerTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:smtp-server-connection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test smpt server connection.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $testHeader = 'SMTP Server Connection Test';
        $this::info($testHeader . ": Establishing Connection...");
        try {
            $transport = \Swift_SmtpTransport::newInstance('smtp.mailtrap.io', '2525');
            $transport->setUsername(env('MAIL_USERNAME'));
            $transport->setPassword(env('MAIL_PASSWORD'));
            $mailer = \Swift_Mailer::newInstance($transport);
            $mailer->getTransport()->start();
            Log::info($testHeader . ': Connection Established Successfully');
            $this::info($testHeader . ': Connection Established Successfully');
        } catch (\Swift_TransportException $e) {
            Log::error($testHeader . ': ' . $e->getMessage());
            $this->error($testHeader . ': ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error($testHeader . ': ' . $e->getMessage());
            $this->error($testHeader . ': ' . $e->getMessage());
        }
    }
}
