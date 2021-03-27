<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
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
    //
    public function getTicketToDispatch(User $user){
        return $user -> isDispatcher();
    }
    //
    public function setTicketToAgent(User $user){
        return $user -> isDispatcher();
    }
    //
    public function getTicketToClosure(User $user){
        return $user -> isAgent();
    }
    //
    public function setStatusOfTicket(User $user){
        return $user -> isAgent();
    }
}
