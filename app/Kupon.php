<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    protected $fillable = ['name', 'value', 'barcode','used','validtil','kiad'];
}
