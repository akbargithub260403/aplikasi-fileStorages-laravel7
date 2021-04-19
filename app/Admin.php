<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'users';

    protected $fillable = ['role','name','email','prodi','password','jabatan','avatar'];

    public function getAvatar()
    {
        if($this->avatar == ""){
            return asset('images/laravel.png');
        }

        return asset('img/'.$this->avatar);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
