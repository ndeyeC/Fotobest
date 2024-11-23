<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 

class Category extends Model
{
    protected $fillable = ['name', 'description'];


    public function photos(){
        return $this->hasmany(Photo::class);

    }
}