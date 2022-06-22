<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedsCategory extends Model
{
    use HasFactory;

    public $timestamps=false;
    public function med(){
        return $this->hasMany(Med::class);
    }
}
