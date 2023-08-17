<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    // use HasFactory;
    protected $table="items";
    protected $primaryKey="id";
    protected $dates = ['entry_date'];
    protected $fillable=[
        'brand_id',
        'model_id',
        'name',
        'entry_date',
    ];
}
