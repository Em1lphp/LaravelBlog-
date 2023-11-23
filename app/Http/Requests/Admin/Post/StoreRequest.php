<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;                        //меняю на true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'         => 'required|string',
            // правила для валидации
            'content'       => 'required|string',
            // правила для валидации
            'preview_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // правила с указаанием формата изображения и максимального размера
            'main_image'    => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // правила с указаанием формата изображения и максимального размера
            'category_id'   => 'required|integer|exists:categories,id',
            // правила для валидации
            'tag_ids'       => 'nullable|array',
            // правила для валидации
            'tag_ids.*'     => 'nullable|integer|exists:tags,id',
            // правила для валидации
        ];
    }

    public function messages()  // прописываю сообщения с ошибками
    {
        return [
            'title.required'         => 'Это поле необходимо для заполнения!',
            'title.string'           => 'Данные должны соответствовать строчному типу!',
            'content.required'       => 'Это поле необходимо для заполноения!',
            'content.string'         => 'Данные должны соответствовать строчному типу!',
            'preview_image.required' => 'Это поле необходимо для заполнения!',
            'preview_image.file'     => 'Необходимо выбрать файл!',
            'main_image.required'    => 'Это поле необходимо для заполнения!',
            'main_image.file'        => 'Необходимо выбрать файл!',
            'category_id.required'   => 'Это поле необходимо для заполнения!',
            'category_id.integer'    => 'ID категории должен быть числом!',
            'category_id.exists'     => 'ID категории должен быть в базе данных!',
            'tag_ids.array'          => 'Необходимо отправить массив данных!',
        ];
    }

}
