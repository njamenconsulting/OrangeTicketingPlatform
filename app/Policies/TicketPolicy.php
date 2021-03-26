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
        //
    }
    //
    public function setTicketToAgent(User $user){
        //
    }
    //
    public function getTicketToClosure(User $user){
        //
    }
    //
    public function setStatusOfTicket(User $user){
        //
    }
}
