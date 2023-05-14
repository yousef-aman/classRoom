<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class QuestionController extends Controller
{

    public function index(Quiz $quiz)
    {
//        $questions = $quiz->questions;
//        dd($questions);

        $this->authorize('view', $quiz->subject->classRoom);

        return Inertia::render('teachers/questions/index',[
            'quiz'=>$quiz->id,
            'Questions'=>$quiz->questions()
                ->when(\Illuminate\Support\Facades\Request::input('search')?? false,function ($query,$search){
                    $query->where('name','like','%'.$search.'%');
                })
            ->get(),

                'filters'=>\Illuminate\Support\Facades\Request::only(['search'])
            ]
        );
    }

    public function add()
    {
        return Inertia::render('CreateQustions');
    }

    public function store(Request $request)
    {
//        $collect=collect($request->all());
//        $collapsed =$collect->collapse();
//        $keyed=$collect->keyBy('na);
//        dd($request->input(['name']));
//        $validator = Validator::make( $request->all(), [
//           'name.*'=>['required']
//        ],
//
//        [
//            'name.*.required'=> 'This question is not set '
//        ]);
//        if ($validator->fails()) {
//            return redirect('/ques/create')
//                ->withErrors($validator)
//                ->withInput();
//        }
//        foreach ($request->input(['name']) as  $value )
//        {
////        dd($value);
//
//            Question::create([
//                'name'=> $value
//            ]);
//        }
//        return redirect('ques/show');

                $validator = Validator::make( $request->all(), [
           'name.*'=>['required']
        ],

        [
            'name.*.required'=> 'This question is not set '
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $quiz = Quiz::find($request->quizID);
        foreach ($request->input(['name']) as  $value) {


                $quiz->questions()->create([
                    'name' =>$value,


                ]);
        }
        return redirect()->back();
    }

    public function destroy(Question $question)
    {


        $question->delete();
        return redirect()->back();

    }
}
