<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OptionsController extends Controller
{
    public function show(Question $question)
    {
        $this->authorize('view', $question->quiz->subject->classRoom);
        return Inertia::render('teachers/options/index',[
            "options"=>$question->options
            ]);
    }
    public function store(Request $request)
    {

        $ques = Question::find($request->questionID);
        foreach ($request->input(['name']) as   $key => $value) {

            if ($key == $request->input(['correctAns']) )
            {
                $ques->options()->create([
                    'name' =>$value,
                    'isCorrect'=>1


                ]);
            }
            else
            $ques->options()->create([
                'name' =>$value,


        ]);
        }
       return redirect()->back();
    }
}
