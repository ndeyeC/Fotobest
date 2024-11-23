<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    protected $fillable=['photo_id','parent_id','nom','email','message'];

    public function photo(){
        return $this->belongsTo(Photo::class);
    }

    public function parent(){
        return $this->belongsTo(Commentaire::class, 'parent_id');
    }
    public function reponses()
    {
        return $this->hasMany(Commentaire::class, 'parent_id');
    }
}
