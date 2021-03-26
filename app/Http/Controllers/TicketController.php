<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use App\Repositories\TicketRepositoryInterface; 
use App\Repositories\Eloquent\TicketRepository; 
use App\Repositories\RoleRepositoryInterface; 
use App\Repositories\Eloquent\RoleRepository; 
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\Tickets\CreateTicketRequest;

class TicketController extends Controller
{
    private $ticketRepository;
    private $roleRepository;
  
    public function __construct(TicketRepositoryInterface $ticketRepository,
                                RoleRepositoryInterface $roleRepository,
                                )
    {
        $this->ticketRepository = $ticketRepository;
        $this->roleRepository = $roleRepository;

    }
    /**
     * Display view of all tickets where a Dispatcher will assign this tickets to Agent
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTicketToDispatch(Request $request)
    {

        $userID = Auth::id();  
        $nberRows = 10;
        //retrieve all of the query string values as an associative array
        $query= $request -> query();
         // Store in session Via a request instance...
        $request->session()->put($query);
     
        if($request->session()->has('status')) {
            
            $status = $request->session()->pull('status');
            //$nberRows = $request->session()->get('nberRow');            
            //Get Ticket with status sended by query
            $tickets = $this->ticketRepository->getTicketByStatus($status,$nberRows);            
        }
        if($request->session()->has('category')) {
  
            $category = $request->session()->pull('category');
           // $nberRows = $request->session()->get('nberRow');            
            //Get Ticket with status sended by query
            $tickets = $this->ticketRepository->getTicketByCategory($category,$nberRows);          
        }

        if ($request->has('nberRows')) {
            
            $query = $request->session()->get('category','status');
            if($query =='status'){
                //Get Ticket with status sended by query
                $tickets = $this->ticketRepository->getTicketByStatus($status,$nberRows);
            }
            if($query == 'category' ){
                //Get Ticket with status sended by query
                $tickets = $this->ticketRepository->getTicketByCategory($category,$nberRows);
            }

         }
        
        //Get All User who have role Agent
        $agents = $this->roleRepository->getUserByRole('Agent');
 
        //Get value of status column from Ticket table
        $statusColumnValues = $this->ticketRepository->getAllValueOfStatusColumn();

        //Get all value of category column from Ticket table
        $categoryColumnValues = $this->ticketRepository->getAllValueOfCategoryColumn();
        //       
        return view('tickets.ticket_update_agent',['tickets'=>$tickets,
                                                    'agents'=>$agents,
                                                    'categoryColumnValues'=> $categoryColumnValues,
                                                    'statusColumnValues'=> $statusColumnValues 
                                                    ]);

    }

    /**
     *  Update user_id column of Ticket model by assigning a agent 
     *  ASSIGN TICKETS TO AGENT IN CHANGING HERS USER_ID FOREIGN KEY ATTRIBUTE
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setTicketToAgent(Request  $request)
    {
        
        if(isset($_POST['set-ticket-to-agent'])){
            //
            $ticketID = $request->ticket_id ; //Retrieve ID of ticket that is will updated
            $userID= $request->agent_id; //Retrieve the New value to update ticket

            $data = ['user_id' => $userID,
                     'status' => "Started",
                     'started_at' => Carbon::now() 
                    ];
            //
            $this->ticketRepository->update($data,$ticketID);

            return back()->with('success','Ticket # '. $ticketID .' has been Assigned successfully!');
        }
                
    }


    /**
     *  Display tickets who have been assigned to specific Agent
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ticketID
     * @param  string $status
     * @return \Illuminate\Http\Response
     */
    public function getTicketToClosure(Request $request)
    {

        $userID = Auth::id();
        //If the requested query string value data is not present, the 2nd argument to this method will be returned
        $status= $request -> query('status','Started');
        $nberRows= $request -> query('nberRows',10);

        $tickets = $this->ticketRepository->getTicketWhere($userID, $status,$nberRows);

        //Get value of status column from Ticket table
        $statusColumnValues = $this->ticketRepository->getAllValueOfStatusColumn();
        return view('tickets.ticket_update_status',['tickets'=>$tickets ,
                                                    'statusColumnValues'=> $statusColumnValues  ,  
                                                  
                                                    ]);
    }


    /**
     * Update the status of resource Ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ticketID
     * @param  string $status
     * @return \Illuminate\Http\Response
     */
    public function setStatusOfTicket(Request  $request){
        //We ensure that Auth user is effecti
        if(Auth::id() == $request->userId){
            // Retrieve ticket ID of specific handled ticket
            $ticketID = $request->ticketId; 
            //Retrieve new value of status from form inputs
            $ticketStatus =  $request->ticketStatus;
            
            $data = ['status' => $ticketStatus]; 
          
            $this->ticketRepository->update($data,$ticketID);

            return back()->with('success',' Status of Ticket # '. $ticketID .' has been updated successfully!');
        }
    }

}
