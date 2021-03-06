<?php

namespace App\Policies;

use App\User;
use App\Office;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfficePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->role == 'admin') {
            return true;
        }
    }


    /**
     * Determine whether the user can view the office.
     *
     * @param  \App\User  $user
     * @param  \App\Office  $office
     * @return mixed
     */
    public function view(User $user, Office $office = null)
    {
        if($user->role != 'operator')
            return false;

        return true;
    }

    /**
     * Determine whether the user can create offices.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->role != 'operator')
            return false;

        return true;
    }

    /**
     * Determine whether the user can update the office.
     *
     * @param  \App\User  $user
     * @param  \App\Office  $office
     * @return mixed
     */
    public function update(User $user, Office $office)
    {
        if($user->role != 'operator')
            return false;

        if(!$office->mobile)
            return false;

        if($user->interministerial){

        }else if($user->ministerial){
            if($user->institution->ministry_id != $office->institution->ministry_id){
                return false;
            }
        }else{
            if($user->institution_id != $office->institution_id){
                return false;
            }
        }

        return true;
    }

    /**
     * Determine whether the user can delete the office.
     *
     * @param  \App\User  $user
     * @param  \App\Office  $office
     * @return mixed
     */
    public function delete(User $user, Office $office)
    {
        return $this->update($user, $office);
    }
}
