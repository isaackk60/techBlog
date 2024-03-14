<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'name' => 'required_if:user_id,null|string|max:255', // Required if user_id is null (i.e., guest)
            'email' => 'required_if:user_id,null|email|max:255', // Required if user_id is null (i.e., guest)
        ]);

        $question = new Question();
        $question->title = $validatedData['title'];
        $question->description = $validatedData['description'];

        // If user is authenticated, associate the question with the user
        if (auth()->check()) {
            $question->user_id = auth()->user()->id;
            $question->name = auth()->user()->name;
            $question->email = auth()->user()->email;
        } else {
            // If user is a guest, set name and email
            $question->name = $validatedData['name'];
            $question->email = $validatedData['email'];
        }

        $question->save();

        return back()->with('message', 'Your question or comment is submitted');
    }
}
