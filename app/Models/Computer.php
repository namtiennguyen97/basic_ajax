<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 */
class Computer extends Model
{
    use HasFactory;
    public $table='computer';
    public $fillable = [
      'name','vendor','price'
    ];
}
