<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'description', 'link', 'type_id'];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
