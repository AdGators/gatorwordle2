<?php

namespace Database\Factories;

use App\Enums\GameStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'answer' => Str::random(5),
            'status' => GameStatus::InProgress,
            'game_grid' => [
                ["","","","",""],
                ["","","","",""],
                ["","","","",""],
                ["","","","",""],
                ["","","","",""],
                ["","","","",""]
            ],
            'evaluations' => [
                ["Empty","Empty","Empty","Empty","Empty"],
                ["Empty","Empty","Empty","Empty","Empty"],
                ["Empty","Empty","Empty","Empty","Empty"],
                ["Empty","Empty","Empty","Empty","Empty"],
                ["Empty","Empty","Empty","Empty","Empty"],
                ["Empty","Empty","Empty","Empty","Empty"]
            ]
        ];
    }
}
