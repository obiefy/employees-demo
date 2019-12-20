<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'website'];


    public function getLogoAttribute($logo)
    {
        if(!is_null($logo)){
            return url(str_replace('public', 'storage', $logo));
        }
        return asset('images/default-logo.jpg');
    }
}
