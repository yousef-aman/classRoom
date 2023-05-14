<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Subject;
use App\Policies\ClassroomPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\ClassRoom;


class QuizController extends Controller
{
    public function show(Subject $subject)
    {

        $this->authorize('view', $subject->classRoom);

        return Inertia::render('teachers/Quiz/index',[
            "subject"=>$subject->id,
            "Quizzes"=>$subject->quizzes()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'name.*'=>['required']
        ],

            [
                'name.*.required'=> 'This Quiz is not set '
            ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $subject = Subject::find($request->subjectID);
        foreach ($request->input(['name']) as  $value) {


            $subject->quizzes()->create([
                'name' =>$value,


            ]);
        }
        return redirect()->back();

//       $answers =collect($request->all());
        //        $keys = $ansCollection->pluck('1');
//        Option::find()
        //
//       $optionmap= $optionsCollect->map(fn($option)=>['is'=>$option->isCorrect]);
//
//        $ansCollection = collect($ans);
        //      $result = $full*$optionget;
/////////
//        $ans =$request->input('answer');
//        foreach ($ans as $value)
//        {
//            $options[] = Option::find($value);
//        }
//        $questionNumber = count(Question::all());
//        $optionsCollect=collect($options);
//         $optionGet= $optionsCollect->where('isCorrect' , 1)->count();
//         $result= (100/$questionNumber) * $optionGet;
//
//        dd('you get '.$result .' from 100');
//
/////////////

    }
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->back();
    }
}
