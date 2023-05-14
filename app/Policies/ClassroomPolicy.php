<?php

namespace App\Policies;

use App\Models\ClassRoom;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassroomPolicy
{
    use HandlesAuthorization;

    public function view(User $user,ClassRoom $classRoom)
    {
        return $classRoom->users->contains($user);
    }

}
