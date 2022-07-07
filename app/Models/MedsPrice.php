<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedsPrice extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function med(){
        $this->belongsTo(Med::class);
    }
}
