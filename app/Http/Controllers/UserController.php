<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use App\Repositories\TicketRepositoryInterface; 
use App\Repositories\Eloquent\TicketRepository; 
use App\Repositories\RoleRepositoryInterface; 
use App\Repositories\Eloquent\RoleRepository; 
use App\Repositories\UserRepositoryInterface; 
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller
{

    private $userRepository;
    private $ticketRepository;
    private $roleRepository;
  
    public function __construct(UserRepositoryInterface $userRepository,
                               TicketRepositoryInterface $ticketRepository,
                                RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->ticketRepository = $ticketRepository;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        foreach ($users as $user){
            $user['roles'] = $user->roles;
        }
        return view('users.user_index',['users'=>  $users]);
    }

 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDetailOfUser($id)
    {
        return view('users.user_update_role', [
            'user'   => User::find($id),
            'user_roles'  => (new User())->find($id)->roles,
            'roles'  => Role::all()
        ]);
    }
   
    /**
     * Set role(s) to specific user that id has been sended by post method
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setRoleToUser(Request $request)
    {
        if(isset($_POST['set-role-to-user'])) { 
            //Retrieve ID of user that we want to set role(s)
            $userID = $request->userID;
            //Retrieve New role(s) that we want to set to this specific user
            $roles = $request->roles;

            $exists = RoleUser::where('user_id', $userID)->get();

            DB::beginTransaction();
            try {
                foreach ($exists as $role){
                    $role->delete();
                }

                foreach ($roles as $roleId){
                    $userRole = new RoleUser();
                    $userRole->user_id = $userID;
                    $userRole->role_id = $roleId;
                    $userRole->save();
                }
                DB::commit();

            }catch (\Exception $e){
                Log::error('Error: '. $e->getMessage());
                DB::rollBack();
            }
            return back()->with('success',' New Role(s) has been setted to user #'. $userID  .' successfuly!');
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.user_create',['roles'=>(new Role())->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
 
        try {
            //$result = $this->UserRepository->create($request->all());

            $user = User::create($request->all());
            $user->roles()->attach($request->role_id);

        } catch (Exception $e) {
  
            return back()->with('error','An Error it\s occur!'.$e->getMessage());
        }
        //

        return back()->with('success','New User has been created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get user where by Id
        $user = $this->userRepository->getById($id);
        $userRoles = $user->roles;
        return view('users.user_show', ['user' => $user,
                                        'roles'  => $userRoles  ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getById($id)->toArray(); //dd($user);

        return view('users.user_update',['user' => $user] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();
        $user = $this->userRepository->update($data,$id);
        return back() -> with('success', 'Congrat! Your profile has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
