<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Photo extends Model
{
    protected $fillable=['user_id','category_id','titre','chemin_fichier'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function commentaires(){
        return $this->hasMany(Commentaire::class);
    
}
}
