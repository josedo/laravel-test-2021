<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMeeting extends Model
{
    use HasFactory;


    /**
     * Atributos a buscar dentro de cada mensaje.
     *
     * @var string[]
     */
    const data_message = [
        'done', 'doing', 'blocking', 'todo'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'done', 'doing', 'blocking', 'todo',
    ];

    /**
     * Get the user that the daily meeting belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user() {
        return $this->belongsTo(User::class);
    }
}
