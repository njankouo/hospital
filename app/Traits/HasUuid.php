<?php
namespace App\Traits;
use illuminate\Support\Str;
trait HasUuid{





    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            if(!$model->getkey()){
                $model->setAttribute($model->getKeyName(),Str::Uuid()->toString());
            }
        });
    }
    public function getIncrementing(){

        return false;
    }
    public function getKeyType(){
        return 'string';
    }
}
