<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id',  'keluhan', 'admin_id' ];
    
    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
