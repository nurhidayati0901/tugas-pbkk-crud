<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'Details';

    protected $fillable = [
        'id',
        'book_id',
        'book_detail'
    ];

    public function book() {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
