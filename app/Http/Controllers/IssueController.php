<?php

namespace App\Http\Controllers;

use App\Services\IssueService;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    protected $issueService;

    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
    }

    public function index()
    {
        $issues = $this->issueService->getAllIssues();
        return response()->json($issues);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $issue = $this->issueService->createIssue($request->all());
        return response()->json($issue, 201);
    }

    public function show(string $id)
    {
        $issue = $this->issueService->getIssueById($id);
        return response()->json($issue);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $issue = $this->issueService->updateIssue($id, $request->all());
        return response()->json($issue, 200);
    }

    public function destroy(string $id)
    {
        $this->issueService->deleteIssue($id);
        return response()->json(null, 204);
    }

    public function markResolved(Request $request, string $issueId)
    {
        $request->validate([
            'rating' => 'nullable|integer|min=1|max=5',
        ]);

        $issue = $this->issueService->markIssueResolved($issueId, $request->all());
        return response()->json($issue);
    }
}
