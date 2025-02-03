<?php

namespace App\Http\Controllers;

use App\Enums\GameStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class GameHistoryController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('GameHistory', [
            'games' => auth()->user()->games()->orderByDesc('created_at')->get()
        ]);
    }
}
