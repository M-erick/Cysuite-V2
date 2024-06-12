<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IssueTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_issue_page_is_accessible(): void
    {
        $response = $this->get('/issue');

        $response->assertStatus(200);
    }
}
