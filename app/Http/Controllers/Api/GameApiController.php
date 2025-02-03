<?php

namespace App\Http\Controllers\Api;

use App\Enums\GameStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GameApiController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'answer' => 'required|string',
            'game_grid' => 'required|array',
            'evaluations' => 'required|array',
            'status' => ['required', Rule::in(GameStatus::values())]
        ]);
        $game = $request->user()->games()->create($request->all());
        return response()->json($game);
    }
}
