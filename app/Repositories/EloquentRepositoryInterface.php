<?php

    namespace App\Repositories;


    use Illuminate\Database\Eloquent\Model;

    /**
    * Interface EloquentRepositoryInterface
    * @package App\Repositories
    */
    interface EloquentRepositoryInterface
    {
        /**
            * @param array $attributes
            * @return Model
            */
        public function create(array $attributes): Model;

        /**
        * @param $id
        * @return Model
        */
        public function getById($id): ?Model;

        public function getPaginate($n);

        public function update(Array $data,$id);

        public function destroy($id);
    }
