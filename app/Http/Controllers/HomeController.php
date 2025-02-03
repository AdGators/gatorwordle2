<?php

namespace App\Http\Controllers;

use App\Services\WordService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __construct(protected WordService $words) { }

    public function index(): Response
    {
        return Inertia::render('Home', [
            'answer' => $this->words->getNewWord()
        ]);
    }
}
