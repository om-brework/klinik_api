<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
