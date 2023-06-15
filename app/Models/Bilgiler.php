<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilgiler extends Model
{ 
  protected $table = 'users';
  protected $fillable = ['adsoyad','email','sifre','securityquestion','securityanswer','resimurl'];
  
    use HasFactory;
}
