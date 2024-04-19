<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPlan extends Model
{
public function modelinfo(){
    return $this->belongsTo(ModelInfo::class);
}

public function subjectContent(){
    return $this->belongsTo(SubjectContent::class);
}

    use HasFactory;
    protected $guarded = [];
}
