<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenusModel extends Model
{
    use HasFactory;

    protected $table = 'menus';

    // Tentukan kolom mana saja yang bisa diisi
    protected $fillable = ['menu_name', 'description', 'price', 'image', 'isAvailable'];
}