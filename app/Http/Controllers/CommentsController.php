<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    public function show()
    {
        $comments = Comment::all();
        return view('welcome', compact('comments'));
    }

    public function store(Request $request, Response $response)
    {
        $validated = $request->validate(['name' => 'required|min:3',
            'email' => 'email',
            'comment' => 'required']);

        $comment = Comment::create($validated);


        if ($comment['id'] % 2 != 0) {
            $mod = 1;
        } else {
            $mod = 2;
        };


        return $response->setContent(['success' => 'Комментарий был успешно добавлен!',
            'name' => $comment['name'],
            'email' => $comment['email'],
            'comment' => $comment['comment'],
            'mod' => $mod]);
    }
}
