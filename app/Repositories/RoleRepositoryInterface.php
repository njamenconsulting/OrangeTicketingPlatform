<?php

    namespace App\Repositories;

    use App\Models\Role;
    use Illuminate\Support\Collection;

    interface RoleRepositoryInterface
    {
        
        public function all(): Collection;
        public function getUserByRole($roleName);

    }
