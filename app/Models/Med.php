<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Med extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function meds_category(){
        return $this->belongsTo(MedsCategory::class);
    }
    public function meds_price(){
        return $this->hasMany(MedsPrice::class);
    }
}
