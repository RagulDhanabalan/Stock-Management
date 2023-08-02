<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entry;

class Product extends Model
{
    use HasFactory;
    protected  $guarded = [];
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
