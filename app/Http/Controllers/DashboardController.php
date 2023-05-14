<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function show(ClassRoom $classRoom)
    {
        $this->authorize('view', $classRoom);

        return Inertia::render('Dashboard',[
            'questions'=> Question::latest()->with('options')->get(),
            'can'=>[
                'IsTeacher'=>auth()->user()->can('create', User::class)
            ],
            'classroom'=>$classRoom->id

        ]);
    }
}
