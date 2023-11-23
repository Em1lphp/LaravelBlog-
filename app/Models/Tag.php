<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;  // использование "мягкого удаления"


    protected $fillable = ['title']; // Массив атрибутов модели, которые могут быть обновлены.


}
