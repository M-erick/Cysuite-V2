<?php

namespace App\Console;

use App\Models\User;
use App\Models\Issue;
use App\Mail\IssueReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $issues = Issue::where('status', 'open')
                            ->where('created_at', '<', now()->subDay())
                            ->get();

            foreach ($issues as $issue) {
                // Send reminder email to admins
                $admins = User::where('role', 'normal_admin')->get();
                foreach ($admins as $admin) {
                    Mail::to($admin->email)->send(new IssueReminder($issue));
                }

                // Escalate issue to supervisors
                $supervisors = User::where('role', 'supervisor_admin')->get();
                foreach ($supervisors as $supervisor) {
                    Mail::to($supervisor->email)->send(new IssueReminder($issue));
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


}
