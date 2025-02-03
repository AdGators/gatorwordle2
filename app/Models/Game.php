<?php

namespace App\Models;

use App\Enums\GameStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $user_id
 * @property string $answer
 * @property array $game_grid
 * @property array $evaluations
 * @property GameStatus $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $user
 */
class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $casts = [
        'game_grid' => 'array',
        'evaluations' => 'array',
        'status' => GameStatus::class
    ];

    protected $fillable = [
        'user_id',
        'answer',
        'game_grid',
        'evaluations',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
