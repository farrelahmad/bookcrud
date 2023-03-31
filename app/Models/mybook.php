<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mybook extends Model
{
    use HasFactory;
    protected $fillable = ['nmbook','nmpenulis','halaman'];
    protected $table = 'buku';
    public $timestamps = false;
}
