<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addimg extends Model
{
    use HasFactory;
    protected $table = 'images';

    public function product()
    {
        return $this->belongsTo(addprod::class);
    }
}
