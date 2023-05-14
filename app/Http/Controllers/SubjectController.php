<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function show(ClassRoom $classRoom)
    {
        $this->authorize('view', $classRoom);

        return Inertia::render('teachers/Subjects/index',[
            "Subjects"=>$classRoom->Subjects
        ]);

    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->back();
    }

}
