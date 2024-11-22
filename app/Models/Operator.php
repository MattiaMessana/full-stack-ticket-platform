<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_available'];

    //relazioni ---> ad un operatore possono essere asseganti diversi ticket 

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
