<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\PostService;


class BaseController extends Controller
{
    public $service;  // Определение свойства $service для хранения экземпляра сервиса

    public function __construct(PostService $service)  // Конструктор класса, который принимает экземпляр PostService
    {
        $this->service = $service;  // Привсваиваем свойству $service экземпляр класса PostService
    }

}
