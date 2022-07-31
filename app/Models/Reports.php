<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory; 
    protected $fillable = ['user_id', 'office_id', 'name' ,'price' ,'phone','stat','active']; 
    protected $primarykey = 'id';
}
