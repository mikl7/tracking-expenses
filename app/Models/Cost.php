<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $table = 'costs';

    protected $guarded = ['id'];

    public function budget()
    {
      return $this->belongsTo(Budget::class);
    }
}
