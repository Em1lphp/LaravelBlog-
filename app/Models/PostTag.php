<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Model
{
    use HasFactory;
    use SoftDeletes;  // использование "мягкого удаления"


    protected $guarded = [];
    //Поскольку структура pivot-таблицы  может изменяться в зависимости от связей, используем $guarded = [] для разрешения массового присвоения всех атрибутов.
}
