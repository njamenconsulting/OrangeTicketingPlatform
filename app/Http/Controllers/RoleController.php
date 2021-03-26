<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepositoryInterface; 
use App\Repositories\Eloquent\RoleRepository; 
use Illuminate\Http\Request;
use App\Http\Requests\Roles\CreateRoleRequest;

class RoleController extends Controller
{
    private $roleRepository;
  
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleRepository->getPaginate(3);
        return view('roles.role_index',['roles' => $roles ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.role_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        //Retrieve POST FORM DATA
        $data = [
            'name' => $request->roleName,
            'description'  => $request->roleDescription,
        ];

        //
        try {                 
            $result = $this->roleRepository->create($data);
        } catch (Exception $e) {

            return back()->with('error','An Error it\s occur!'.$e->getMessage());
        }
        //
        return back()->with('success','A New role has been created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
