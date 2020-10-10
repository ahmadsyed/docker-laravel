<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'name','path','type','provider_id'
    ];
    /**
     * Get the post that owns the comment.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}

