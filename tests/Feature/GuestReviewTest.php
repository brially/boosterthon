<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GuestReviewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGuestReviewCreate()
    {
        $response = $this->get('/guest-review/create');
        $response->assertStatus(200);
    }
}
