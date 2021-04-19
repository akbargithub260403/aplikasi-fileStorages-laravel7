<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'postingan';

    protected $fillable = ['id_admin','judul','pembuat','file','keterangan','prodi'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
