<?php   

namespace App\Repositories\Eloquent;   

use App\Repositories\EloquentRepositoryInterface; 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB;  

class BaseRepository implements EloquentRepositoryInterface 
{     
    /**      
     * @var Model      
     */     
     protected $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
 
    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
 
    /**
    * @param $id
    * @return Model
    */
    public function getById($id): ?Model
    {
        //return $this->model->find($id);
        return $this->model->findOrFail($id);
    }

    /**
    * Get ticket with pagination
    * @param $n record number per page
    * @return Model
    */
    public function getPaginate($n)
    {
        return $this->model->latest('created_at')->paginate($n);
    }

    /**
     * Update ticket data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(Array $data,$id)
    {

        DB::beginTransaction();

        try {
            $ticket = $this->getById($id)->fill($data)->save();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update ticket data');
        }

        DB::commit();

        return $ticket;
    }
    /**
     * Delete ticket by id.
     *
     * @param $id
     * @return String
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $icket = $this->getById($id)->delete();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete ticket data');
        }

        DB::commit();

        return $ticket;
    }


}
