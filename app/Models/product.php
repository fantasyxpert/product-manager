<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';
     protected $fillable = [
        'name',
        'description',
        'price',
        'added_by',];

    public function getAddedByAttribute()
    {
        $id=$this->attributes['added_by'] == '0'?'1':$this->attributes['added_by'];
        $user=User::where('id',$id)->first()->name;
        return $user;
    }
}

