<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

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
}
