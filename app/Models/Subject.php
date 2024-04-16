<?php

namespace App\Models;

use App\Http\Controllers\SubjectContentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function contents()
    {
        return $this->belongsToMany(SubjectContent::class);
    }
}
