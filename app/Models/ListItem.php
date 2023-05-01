<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    use HasFactory;
    protected $table = "listitems";
    protected $hidden = ['count_row']; 
    protected $fillable = ['name','quantity','unit_price','tax','order_id'];
}