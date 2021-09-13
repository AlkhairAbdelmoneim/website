<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = "services";
    protected $guarded = [];
    protected $appends = ['image_path'];

    function scopeSelection($q){

        // translation_lang example en ....
        return $q->select('id' ,'name' ,'description','image','translation_lang' ,'translation_of');
    }


    function scopeActive($q){
        return $q->where('active' ,1);
    }

    function getImagePathAttribute(){

        return asset('uploads/img/' .$this->image);
        
    }

    // Relation same model
    public function services()
    {
        return $this->hasMany(self::class, 'translation_of');
    }
}
