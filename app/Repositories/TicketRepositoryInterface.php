<?php
namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Support\Collection;

interface TicketRepositoryInterface
{
   //public function all(): Collection;
   public function getTicketByStatus($status,$n);

   public function getTicketByCategory($category,$n);

   public function getTicketByUser($userID,$n);
   public function getTicketWhere($userID,$status, $n);

   public function getAllValueOfStatusColumn();

   public function getAllValueOfCategoryColumn();
}
