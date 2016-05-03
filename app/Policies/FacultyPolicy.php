<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class FacultyPolicy
 * @package App\Policies
 */
class FacultyPolicy
{
    use HandlesAuthorization;

    /**
     *
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
    public function createOrUpdateOrDeleteFaculty($user)
    {
        return $user->role == "administrator";
    }
}
