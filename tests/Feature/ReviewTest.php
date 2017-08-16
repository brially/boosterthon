<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReviewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testReviewCreate()
    {

        $user = User::find(1);
        $response = $this->actingAs($user)
            ->get('/review/create');
        $response->assertStatus(200);
    }
}
