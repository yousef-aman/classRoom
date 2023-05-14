<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Carbon\Carbon;
class QuizAttendController extends Controller
{
    public function show(Request $request)
    {


        $quizId = $request->input('quiz_id');
        // Retrieve the quiz from the database
        $quiz = Quiz::findOrFail($quizId);


        // Check if the quiz is available
        if (now()->toDateTimeString() < $quiz->available_date) {
            return Inertia::render('ErrorPage');
        }

        // Check if the quiz is open
        if ($quiz->start_time == null)
        {
            $quiz->start_time = now()->toDateTimeString();
            $quiz->save();
        }

        $quizStartTime = Carbon::parse($quiz->start_time)->toDateTimeString();
        $quizEndTime = Carbon::parse($quiz->start_time)->addMinutes($quiz->duration);

        if (now()->toDateTimeString() > $quizEndTime)
        {
//            $correctAnswersCount = $this->calculateCorrectAnswersCount($quiz);
//            $totalQuestionsCount = $quiz->questions()->count();
//            $percentageCorrect = $correctAnswersCount / $totalQuestionsCount * 100;
//            $grade = $this->convertPercentageToGrade($percentageCorrect);
            return Inertia::render('ErrorPage');
        }


        $timeDifference = $quizEndTime->diff(now());
        $MinutesDifference = $quizEndTime->floatDiffInMinutes(now());
//            $hours = $timeDifference->h;
//            $minutes = $timeDifference->i;
            $seconds = $timeDifference->s;



        // Retrieve the quiz questions and options
        $questions = $quiz->questions()->with('options')->get();

        // Return the quiz data to the Vue component
        return Inertia::render('students/quiz/attendQuiz', [
            'quiz'=>$quiz,
            'questions'=>$questions,
            'minutes'=>$MinutesDifference,

        ]);
    }

//    private function calculateCorrectAnswersCount($quiz)
//    {
//        return Auth::user()->quizResponses()
//            ->join('options', 'quiz_responses.selected_option_id', '=', 'options.id')
//            ->where('quiz_responses.quiz_id', '=', $quiz->id)
//            ->where('options.isCorrect', '=', 1)
//            ->count();
//    }

//    private function convertPercentageToGrade($percentage)
//    {
//        // Define a grading scale based on percentage ranges
//        $gradingScale = [
//            ['grade' => 'A', 'range' => [90, 100]],
//            ['grade' => 'B', 'range' => [80, 89]],
//            ['grade' => 'C', 'range' => [70, 79]],
//            ['grade' => 'D', 'range' => [60, 69]],
//            ['grade' => 'F', 'range' => [0, 59]],
//        ];
//
//        // Find the grade that matches the percentage
//        foreach ($gradingScale as $grade) {
//            if ($percentage >= $grade['range'][0] && $percentage <= $grade['range'][1]) {
//                return $grade['grade'];
//            }
//        }
//
//        // Default to F if no grade matches
//        return 'F';
//    }

}
