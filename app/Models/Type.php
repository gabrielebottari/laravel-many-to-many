<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name','slug'];

    public function getRouteKeyName()
    {
        return 'slug'; // Usa 'slug' per il Route Model Binding
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
