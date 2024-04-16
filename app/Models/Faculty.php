<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $guarded = [];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
    use HasFactory;
}
