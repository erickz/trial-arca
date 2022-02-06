<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\CompanyTrait;

use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory, CompanyTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'zipcode',
        'city',
        'state',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    //Whenever the name is set It generates the slug
    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value , "-");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
