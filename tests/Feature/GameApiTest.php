<?php

namespace Tests\Feature;

use App\Enums\GameStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_successfully_creating_new_game()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->post(route('api.games.store'), [
                'answer' => 'STINK',
                'game_grid' => [
                    ["S","T","I","N","K"],
                    ["","","","",""],
                    ["","","","",""],
                    ["","","","",""],
                    ["","","","",""],
                    ["","","","",""]
                ],
                'evaluations' => [
                    ["Correct","Correct","Correct","Correct","Correct"],
                    ["Empty","Empty","Empty","Empty","Empty"],
                    ["Empty","Empty","Empty","Empty","Empty"],
                    ["Empty","Empty","Empty","Empty","Empty"],
                    ["Empty","Empty","Empty","Empty","Empty"],
                    ["Empty","Empty","Empty","Empty","Empty"]
                ],
                'status' => GameStatus::Win->value
            ])
            ->assertOk();

        // Make sure the game was created for the user
        $this->assertCount(1, $user->games);
    }

    public function test_missing_params_throws_errors()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->post(route('api.games.store'), [
                'answer' => 'STINK',
                'status' => GameStatus::Win->value
                // no game_grid or evaluations provided
            ])
            ->assertInvalid([
                'game_grid',
                'evaluations'
            ]);

        // make sure the game was not created
        $this->assertCount(0, $user->games);
    }
}
