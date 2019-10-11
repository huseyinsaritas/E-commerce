<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KullaniciDetay extends Model
{
    protected $table = "kullanici_detay";
    protected $fillable = ['adres', 'telefon','ceptelefonu'];
    public $timestamps = false;
    protected $guarded = [];

    public function kullanici(){
        return $this->belongsTo('App\Models\Kullanici','kullanici_id');
    }
}
