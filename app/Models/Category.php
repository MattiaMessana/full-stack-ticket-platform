<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // relazioni ---> una categoria può essere assegnata a più ticket 

    public function categories() {
        return $this->hasMany(Ticket::class);
    }
}
