<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentOrTeacher
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return $user->role === 'teacher';
    }


}
