<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class signup extends Model
{
    use HasFactory;

    protected $table='signups';
    protected $primarykey='id';

    public $fillable=['name','email','gender','hobbies','address','country','profile'];

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Str::of($value)->trim()->lower();
    }

    public function setHobbiesAttribute($value)
    {
        $this->attributes['hobbies'] = implode(',', $value);
    }

    

   
    public function getcountry()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    public function getHobbiesArrAttribute(){
        return explode(',', $this->hobbies);
    }
}
