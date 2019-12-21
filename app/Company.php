<?php

namespace App;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'website'];

    /**
     * @param $logo
     * @return UrlGenerator|string
     */
    public function getLogoAttribute($logo)
    {
        if(!is_null($logo)){
            return url(str_replace('public', 'storage', $logo));
        }
        return asset('images/default-logo.jpg');
    }

    /**
     * @return HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
