<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Budget extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = ['name', 'slug', 'money'];

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function author()
    {
        return $this->hasOne(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function remove()
    {
        $this->delete();
    }
}
