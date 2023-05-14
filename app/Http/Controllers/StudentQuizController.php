<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentQuizController extends Controller
{
    public function show(ClassRoom $classRoom)
    {
        $this->authorize('view', $classRoom);

        $quizzes = $classRoom->Subjects()->with('quizzes')->get()->flatMap(function ($subject) {
            return $subject->quizzes->map(function ($quiz) use ($subject) {
                return array_merge($quiz->toArray(), [
                    'formatted_available_date' => $quiz->formatted_available_date,
                    'subject_name' => $subject->name,
                ]);
            });
        });

        return inertia::render('students/quiz/index',
            [
                'quizzes' => $quizzes
            ]);
    }
}

