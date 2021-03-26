<?php

namespace App\Repositories\Eloquent;

use App\Models\Ticket;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Support\Collection;

class TicketRepository extends BaseRepository implements TicketRepositoryInterface
{

    /**
    * TicketRepository constructor.
    *
    * @param Ticket $model
    */
    public function __construct(Ticket $model)
    {
        parent::__construct($model);
    }

    /**
     * Get ticket by status with pagination
     * @param $status ticket status
     * @param $n record number per page
     * 
     * @return model
     */
    public function getTicketByStatus($status,$n){
        return $this->model->where('status', $status)->paginate($n);
    }

    
    /**
     * Get ticket by category with pagination
     * @param $$category ticket $category
     * @param $n record number per page
     * 
     * @return model
     */
    public function getTicketByCategory($category,$n){
        return $this->model->where('title', $category)->paginate($n);
    }

    /**
     * Get ticket by user with pagination
     * @param $userID logged User ID 
     * @param $n record number per page
     * 
     * @return model
     */
    public function getTicketByUser($userID,$n){

        return $this->model->where('user_id',$userID)->paginate($n);
    }


    public function getTicketWhere($userID,$status, $n){

        return $this->model->where('user_id',$userID)
                           ->where('status',$status)
                           ->paginate($n);
    }

    /**
     * Get values of status column without duplication form Ticket Table
     * 
     * @return model
     */
    public function getAllValueOfStatusColumn(){
        return $this->model->distinct()->get('status');//Get values of status column 
    }
    /**
     * Get values of Title column without duplication
     * 
     * @return model
     */
    public function getAllValueOfCategoryColumn(){
        return $this->model->distinct()->get('title');//Get values of title column 
    }
}
