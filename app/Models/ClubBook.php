<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubBook extends Model
{
    protected $table = 'club_book';

    protected $fillable = [
        'book_id',
        'club_id',
        'code',
        'init_count',
        'current_count',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
