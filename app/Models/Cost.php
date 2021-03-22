<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Cost extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = ['name', 'slug', 'money', 'budget_id'];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }



    public static function add($fields)
    {
        $cost = new static;
        $cost->fill($fields);
        $cost->user_id = 1;
        $cost->save();

        return $cost;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }

    public function setBudget($id)
    {
        if ($id == null) {
            return;
        }
        $this->budget_id = $id;
        $this->save();
    }
}
