<?php

namespace App\Http\Controllers\Api;


use App\Services\WordService;
use App\Enums\GameStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WordApiController extends Controller
{
    public function __construct(protected WordService $wordService) { }
    public function validate(Request $request): JsonResponse
    {
        $request->validate([
            'answer' => 'required|string'
        ]);
        return response()->json(["valid"=> $this->wordService->isWord($request->answer)]);
    }
}
