<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Issue;
use App\Models\Response;
use App\Mail\IssueRaised;
use App\Mail\IssueReplied;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::all();
        return response()->json($issues);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $issue = Issue::create($request->all());

        // Send email to normal admins
        $admins = User::where('role_id', 2)->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new IssueRaised($issue));
        }

        return response()->json($issue, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $issue = Issue::findOrFail($id);
        return response()->json($issue);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $issue = Issue::find($id);
        $issue->update($request->all());

        return response()->json($issue, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return response()->json(null, 204);
    }

    public function markResolved(Request $request, $issueId)
    {
        $request->validate([
            'rating' => 'nullable|integer|min=1|max=5',
        ]);

        $issue = Issue::findOrFail($issueId);
        $issue->status = 'closed';
        $issue->save();

        if ($request->has('rating')) {
            // Add the rating to the responses related to the issue
            Response::where('issue_id', $issueId)->update(['rating' => $request->rating]);

            // Update the admin's average rating
            $this->updateAdminRating($issue->admin_id);
        }

        return response()->json($issue);
    }

    private function updateAdminRating($adminId)
    {
        $admin = User::findOrFail($adminId);
        $admin->average_rating = Response::where('user_id', $adminId)->avg('rating');
        $admin->save();
    }
}
