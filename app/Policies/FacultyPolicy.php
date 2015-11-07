<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class FacultyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Method return true, only if user role administrator or university administrator
     *
     * @param $user
     * @return bool
     */
    public function createFaculty($user)
    {
        return ($user->role == "administrator") || ($user->role == "university_administrator");
    }
}
