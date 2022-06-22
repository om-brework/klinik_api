<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function service_category(){
        return $this->belongsTo(ServiceCategory::class);
    }
    public function service_price(){
        return $this->hasMany(ServicePrice::class);
    }
}
