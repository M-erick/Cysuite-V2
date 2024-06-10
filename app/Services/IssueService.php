<?php

namespace App\Services;

use App\Models\User;
use App\Models\Issue;
use App\Models\Response;
use App\Mail\IssueRaised;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class IssueService
{
    public function getAllIssues()
    {
        return Issue::all();
    }

    public function createIssue(array $data)
    {
        $issue = Issue::create($data);

        // Send email to normal admins
        $admins = User::where('role_id', 2)->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new IssueRaised($issue));
        }

        return $issue;
    }

    public function getIssueById(string $id)
    {
        return Issue::findOrFail($id);
    }

    public function updateIssue(string $id, array $data)
    {
        $issue = Issue::findOrFail($id);
        $issue->update($data);

        return $issue;
    }

    public function deleteIssue(string $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
    }

    public function markIssueResolved(string $issueId, array $data)
    {
        $issue = Issue::findOrFail($issueId);
        $issue->status = 'closed';
        $issue->save();

        if (isset($data['rating'])) {
            // Add the rating to the responses related to the issue
            Response::where('issue_id', $issueId)->update(['rating' => $data['rating']]);

            // Update the admin's average rating
            $this->updateAdminRating($issue->admin_id);
        }

        return $issue;
    }

    private function updateAdminRating($adminId)
    {
        $admin = User::findOrFail($adminId);
        $admin->average_rating = Response::where('user_id', $adminId)->avg('rating');
        $admin->save();
    }
}
