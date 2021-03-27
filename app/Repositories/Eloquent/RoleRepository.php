<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;
use App\Repositories\RoleRepositoryInterface;
use Illuminate\Support\Collection;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    /**
    * RoleRepository constructor.
    *
    * @param Role $model
    */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    /**
    * @return Collection
    */
    public function all(): Collection
    {
        return $this->model->all();    
    }
    /**
     * Get User by role with pagination
     * @param $roleID 
     * @param $n record number per page
     * 
     * @return model
     */
    public function getUserByRole($roleName): Collection
    {
        $roleID = $this->model->select('id')
                              ->where('name',$roleName)->first()->toArray(); 
         
        return $users = $this->model->find($roleID['id'])->users()->orderBy('name')->get();
    }
        /**
     * Get values of name column without duplication form Role Table
     * 
     * @return model
     */
    public function getNameColumnfromRole(){
        return $this->model->distinct()->get('name');//Get values of name column 
    }
}
