<?php

namespace Tests\Feature;

use App\Models\Issue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   public function test_paginated_guest_table_contains_11th_record(){
    for($i = 1 ; $i<=11; $i++){
        $issue = Issue::create([
            'name' => 'issue' .$i ,
            'price' =>rand(100,999)

        ]);
        $response = $this->get('/issue');
        $response->assertStatus(200);
        $response->assertViewHas('products', function($collection) use($issue) {

            return !$collection>contains($issue);
        });

    }
   }
}
