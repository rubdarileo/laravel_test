<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'comment_id',
    ];

    /**
    * comments
    */
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
}
