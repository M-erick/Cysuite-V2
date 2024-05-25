<?php

namespace App\Http\Controllers;

use App\Models\GuestIssue;
use Illuminate\Http\Request;

class GuestIssueController extends Controller
{
    //

    public function index()
    {
        $issues = GuestIssue::all();
        return response()->json($issues);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $issue = GuestIssue::create($request->all());
        return response()->json($issue, 201);
    }
    public function resolve($id)
    {
        $issue = GuestIssue::findOrFail($id);
        $issue->status = 'resolved';
        $issue->save();

        return response()->json($issue);
    }
}
