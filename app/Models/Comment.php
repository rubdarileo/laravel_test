<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'description',
        'product_id'
    ];

    /**
     * Usuarios del comentario
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
