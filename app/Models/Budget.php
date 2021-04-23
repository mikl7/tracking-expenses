<?php

namespace App\Models;

use App\Models\Cost;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = ['name', 'slug'];

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
