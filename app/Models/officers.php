<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class officers extends Model
{
    use HasFactory; 
    protected $fillable = ['name']; 
    protected $primarykey = 'id'; 
    public function reports()
    {
        return $this->hasMany(Reports::class);
    }
}
