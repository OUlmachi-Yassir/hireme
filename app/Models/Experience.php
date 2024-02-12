<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['cv_id', 'title', 'company', 'description'];

    public function cv()
    {
        return $this->belongsTo(CV::class);
    }
}
