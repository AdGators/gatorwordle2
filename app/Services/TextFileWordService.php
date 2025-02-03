<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TextFileWordService implements WordService
{
    protected $wordFile = 'words.txt';

    public function getAllWords() : Collection
    {
        return collect(explode("\n", file_get_contents(storage_path($this->wordFile))));
    }

    public function getNewWord() : string
    {
        return Str::of($this->getAllWords()->random())->trim()->upper();
    }
}
