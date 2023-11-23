<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const ROLE_ADMIN = 1;
    const ROLE_READER = 2;

    public static function getRoles(
    )  // создаю статический метод и даю значения константам, для более логичной ролевой системы
    {
        return [
            self::ROLE_ADMIN  => 'Администратор',
            self::ROLE_READER => 'Пользователь',
        ];
    }


    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // добавляю роль в список изменяемых полей
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];


    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }

    // многие ко многим, связываем посты с юзерами, через пивот таблицу, чтобы отображать лайкнуты посты


    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
    // связываем комментарий с юзером
}
