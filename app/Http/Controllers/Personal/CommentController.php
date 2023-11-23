<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\UpdateRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $comments = auth()->user()->comments;  // отображаем комментарии  для определённого пользователя
        return view('personal.comment.index',compact('comments','posts')); //ретурним вью, прокидываем свойства
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();  // Удаление комменатрия из базы данных
        return redirect()->route('comment.index', compact('comment'))->with('success', 'Комментарий успешно удален.')->with('comment', $comment);  // Перенаправление на страницу отображения комментов с информацией о удаленном комменте
    }

    public function edit(Comment $comment) {

        return view('personal.comment.edit',compact('comment'));
    }

    public function update(Comment $comment, UpdateRequest $request) {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('comment.index',compact('comment'))->with('success','Комментарий успешно обновлен')->with('comment',$comment); // Перенаправление на страницу отображения комментов с информацией об обновлённом комменте
    }

}
