<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_must_be_logged_in_to_access_home()
    {
        $this->get('/')->assertRedirect('/login');
    }

    public function test_homepage_loads_game_with_new_word()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get('/')
            ->assertOk()
            ->assertInertia(fn(Assert $page) => $page->component('Home')->has('answer'));
    }
}
