<?php

namespace App\Http\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function store($data)
    {
        try {

            DB::beginTransaction();  // Начало транзакции для обеспечения целостности данных

            $tagIds = $data['tag_ids'];  // Извлечение и
            unset($data['tag_ids']);  // Удаление тегов из данных.

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);  // Сохранение изображений в public директории
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);  // Сохранение изображений в public директории

            $post = Post::firstOrCreate($data);  // Создание или обновление поста в базе данных

            $post->tags()->attach($tagIds);  // Привязка тегов к посту

            DB::commit();  // Фиксация транзакции

            return $post;  // Возвращаем созданный пост
        } catch (\Exception $exception) {
            // Откат транзакции в случае ошибки
            DB::rollBack();

            Log::error('Error storing post: ' . $exception->getMessage());  // Логирование ошибки

            throw $exception;  // Пробрасываем исключение для обработки на уровне вызова
        }
    }

    public function update($data, $post)
    {
        try {

            DB::beginTransaction();  // Начало транзакции для обеспечения целостности данных

            $tagIds = $data['tag_ids'];  // Извлечение и
            unset($data['tag_ids']);  // Удаление тегов из данных

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);  // Сохранение изображений в public директории.
            }

            $post->update($data);  // Обновление данных поста в базе данных

            $post->tags()->sync($tagIds);  // Обновление тегов поста

            DB::commit();  // Фиксация транзакции

            return $post;  // Возвращаем обновленный пост
        } catch (\Exception $exception) {
            // Откат транзакции в случае ошибки
            DB::rollBack();

            Log::error('Error updating post: ' . $exception->getMessage());  // Логирование ошибки

            throw $exception;  // Пробрасываем исключение для обработки на уровне вызова.
        }
    }
}
