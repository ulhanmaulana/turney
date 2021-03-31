<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turnamen extends Model
{
    protected $table = 't_turnamen';
    protected $primaryKey = 'id_turnamen';
    protected $fillable = ['id_turnamen','nama_turnamen','deskripsi','kategori', 'maksimum_slot', 'penyelenggara', 'file_gambar', 'hadiah', 'tempat', 'waktu', 'peraturan', 'biaya_turnamen', 'sistem_turnamen', 'turnamen_status'];
}
