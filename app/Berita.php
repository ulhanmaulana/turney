<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
	protected $table = "beritas";
	protected $primarykey ="id";
    protected $fillable = ['id','title','content','gambar'];
    
}
