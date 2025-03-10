<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface WordService
{
    public function getAllWords(): Collection;

    public function getNewWord(): string;
}
