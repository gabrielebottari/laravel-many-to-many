<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    
    protected $fillable = ['title', 'slug', 'image', 'description', 'date','type_id','technology_id'];

    /**
     * The "booting" method of the model.
     */
    protected static function boot()
    {
        parent::boot();

    
        static::creating(function ($project) {

            $project->slug = Str::slug($project->title);

        });
    }

    public function getRouteKeyName()
    {
        return 'slug'; // Usa 'slug' per il Route Model Binding
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}