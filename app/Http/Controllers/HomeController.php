<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\event;
use App\vote;
use App\Meeting;
use App\model_has_roles;
use Illuminate\Support\Facades\DB;

    class HomeController extends Controller
    {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function permissiontorole(Request $request){
    //     $role1 = Role::findById($user);
    //     $permission1 = Permission::findById($permission);
    //     $role1->givePermissionTo($permission1);
    //  }

    public function assignHome()
    {
        //dd("test");
        $assign = DB::table('roles')->get();
        //return Auth::user()->id;

        //for assign role view
$d=DB::table('model_has_roles')
->join('users','users.id','=','model_has_roles.model_id')
->join('roles','roles.id','=','model_has_roles.role_id')
->select('users.id','users.nameWithInitials','users.nic','users.contactNumber','users.email','roles.name')
->take(10)
->get();


        return view('assign\assignHome')->with(['assign'=>$assign,'d'=>$d]);
    }

    public function Home(request $request)
    {

           return view('home');

    }

    public function index(request $request)
    {

    //    dd($request->all());
       $memberId = $request['memberId'];
       $role = $request['role'];



    //   relavent to role dashboard
    //   $role_id => $request["p_name"];.
    //  'description' => $request->p_description,
    //  'prize' => $request->p_price,



        //creating roles for 4 types of users
        //$role = Role::create(['name' => 'p_member']);
       // $role = Role::create(['name' => 'or_fol']);
         // $role = Role::create(['name' => 'or_pm']);
       // $role = Role::create(['name' => 'supervising_officer']);
       // $role = Role::create(['name' => 'temporyMember']);



      //creating permissions for 4 types of users
       // $permission = Permission::create(['name' => 'view event']);
       // $permission = Permission::create(['name' => 'create event']);
       // $permission = Permission::create(['name' => 'delete event']);
       // $permission = Permission::create(['name' => 'update event']);

//giveing permission to p_member
    $role1 = Role::findById(1);
    $permission1 = Permission::findById(1);
    $role1->givePermissionTo($permission1);

//giveing permission to or_fol
    $role2 = Role::findById(2);
    //$permission1 = Permission::findById(1);
    $role2->givePermissionTo($permission1);

//giveing permission to or_pm
   $role3 = Role::findById(3);
   $permissionAll = Permission::all();
   $role3->givePermissionTo($permissionAll);

//giveing permission to supervising_officer
    $role4 = Role::findById(4);
    $permissionAll = Permission::all();
    $role4->givePermissionTo($permissionAll);


    $assign = DB::table('users')->get();
    $a=Auth::user()->isActive;

  // dd($a);

 //for dashboard
  $data=DB::table('events')
  ->join('votes','votes.event_id','=','events.id')
  ->select('events.eventName','events.reason','events.region','events.budget','events.startDate','events.startTime')
  ->take(3)
  ->get();
  //return $data;


  $detail=DB::table('meetings')
  ->select('name','email','date','startTime','endTime','venue','invitees','status')
  ->where('date', '<', date('y-m-d', strtotime('+1 month')))
  ->where('date', '>', date('y-m-d', strtotime('0 month')))
  ->take(3)
  ->get();
//return $detail;

//for assign role view
$d=DB::table('model_has_roles')
->join('users','users.id','=','model_has_roles.model_id')
->join('roles','roles.id','=','model_has_roles.role_id')
->select('users.id','users.nameWithInitials','users.nic','users.contactNumber','users.email','roles.name')
->take(10)
->get();

    if($a==0){

        auth()->user()->assignRole('temporyMember');
       // echo("added you role correctly as a temporyMember");

    }
    else{
        
            return view('home')->with(['data'=>$data, 'detail'=>$detail,'d'=>$d]);
        
      
    }

//


//assign p_member role to user
    //$user1=User::find($memberId);
   // $user1->assignRole($role);




   
    return view('home')->with(['data'=>$data, 'detail'=>$detail,'d'=>$d]);



    }

    public function assignNewRole(request $request)
    {

        $memberId = $request['memberId'];
        $roleId = $request['roleId'];

        $assign = DB::table('model_has_roles')->get()->toArray();

        foreach($assign as $value){
            if($memberId == $value->model_id){

                $assign = DB::table('roles')->get();

                DB::table('model_has_roles')
                ->where('model_id', $value->model_id)
                ->update(['role_id' => $roleId]);
            }
        }

        $d=DB::table('model_has_roles')
        ->join('users','users.id','=','model_has_roles.model_id')
        ->join('roles','roles.id','=','model_has_roles.role_id')
        ->select('users.id','users.nameWithInitials','users.nic','users.contactNumber','users.email','roles.name')
        ->take(10)
        ->get();

        return redirect()->back()->with('d',$d);

    }


    public function assignORFOL(Request $request){
      // dd($request->memberId);
        $pMember = User::find($request->memberId);
        $users = User::role('or_fol')->get();

        $min = 99999999;
        $user = null;

        $client = new \GuzzleHttp\Client(); 

        for($i=0; $i<$users->count(); $i++){
          //  echo $users[$i]->pollingDivision." : ";
            $res = $client->get('https://maps.googleapis.com/maps/api/directions/json?origin='.$pMember->pollingDivision.'&destination='.$users[$i]->pollingDivision.'&key=AIzaSyBOBD8RfyIG-op1SKN3p1Ylqfca_ZdYFJQ', ['auth' =>  ['user', 'pass']]);
            $s = $res->getBody(); // { "type": "User", ....
            if($min>json_decode($s, true)['routes'][0]['legs'][0]['distance']['value']){
                $min = json_decode($s, true)['routes'][0]['legs'][0]['distance']['value'];
                $user = $users[$i];
            }
           // echo json_decode($s, true)['routes'][0]['legs'][0]['distance']['value'];
           // echo '                        ';
        }
      
 //return ( $user);

   return view('assign.assignorfolview')->with(['user'=>$user,'min'=>$min/100]);
    }
}


