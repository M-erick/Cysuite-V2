<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Issue;
use App\Mail\IssueReminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendIssueReminders extends Command
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:issue-reminders';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders for open issues and escalate to supervisors';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $issues = Issue::where('status', 'open')
                        ->where('created_at', '<', now()->subDay())
                        ->get();

        foreach ($issues as $issue) {
            // Send reminder email to  normal_admin
            $admins = User::where('role_id', 2)->get();
            foreach ($admins as $admin) {
                Mail::to($admin->email)->send(new IssueReminder($issue));
            }

            // Escalate issue to supervisors_admin
            $supervisors = User::where('role_id', 3)->get();
            foreach ($supervisors as $supervisor) {
                Mail::to($supervisor->email)->send(new IssueReminder($issue));
            }
        }
    } //

}
