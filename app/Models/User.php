<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the tickets for the user.
     */
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    //
    public function roles(){
        return $this->belongsToMany(Role::class, 'role_users');
    }

    /* define a admin user role */
    public function isAdmin(){
        //Retrieve role(s) of user model
        $roles = $this->roles;
        //
        foreach ($roles as $role){
            if($role->name === 'Admin' ) return true;        
        }
    }
    /* define a agent user role */
    public function isAgent(){
        //Retrieve role(s) of user model
        $roles = $this->roles;
        //
        foreach ($roles as $role){
            if($role->name === 'Agent' ) return true;        
        }
    }
    /* define a Dispatcher user role */
    public function isDispatcher(){
        //Retrieve role(s) of user model
        $roles = $this->roles;
        //
        foreach ($roles as $role){
            if($role->name === 'Dispatcher' ) return true;        
        }
    }
    /* define Manager user role */
    public function isManager(){
        //Retrieve role(s) of user model
        $roles = $this->roles;
        //
        foreach ($roles as $role){
            if($role->name === 'Manager' ) return true;        
        }
    }
}
