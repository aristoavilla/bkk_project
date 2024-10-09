<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
