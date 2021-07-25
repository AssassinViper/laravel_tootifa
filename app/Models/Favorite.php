<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public function favoritable()
    {
        return $this->morphTo();
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
