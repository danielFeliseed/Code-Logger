<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deck;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }
}
