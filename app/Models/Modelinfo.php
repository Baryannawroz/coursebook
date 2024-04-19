<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelinfo extends Model
{
use HasFactory;

protected $guarded = [];

public function subject()
{
return $this->belongsTo(Subject::class);
}

public function stage()
{
return $this->belongsTo(Stage::class);
}

public function deliveryPlans()
{
return $this->belongsToMany(DeliveryPlan::class);
}
}
