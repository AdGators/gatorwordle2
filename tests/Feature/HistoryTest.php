<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_must_be_logged_in_to_access_history()
    {
        $this->get('/games')->assertRedirect('/login');
    }

    public function test_loading_game_history()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get('/games')
            ->assertOk()
            ->assertInertia(fn(Assert $page) =>
                $page->component('GameHistory')->has('games'));
    }
}
