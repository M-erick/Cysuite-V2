<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $issueId)
    {
        $responses = Response::where('issue_id', $issueId)->get();
        return response()->json($responses);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'response_text' => 'required|string',
            'user_id' => 'required|integer',
            'issue_id' => 'required|integer',
        ]);

        $response = Response::create($request->all());
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $response = Response::findOrFail($id);
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'response_text' => 'required|string',
            'user_id' => 'required|integer',
            'issue_id' => 'required|integer',
        ]);

        $response = Response::findOrFail($id);
        $response->update($request->all());
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $response = Response::findOrFail($id);
        $response->delete();
        return response()->json(null, 204);
    }
}
