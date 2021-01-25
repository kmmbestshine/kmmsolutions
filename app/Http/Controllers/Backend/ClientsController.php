<?php
namespace App\Http\Controllers\Backend;

use Config;
use Dinero;
use Datatables;
use App\Client;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Repositories\User\UserRepositoryContract;
use App\Repositories\Client\ClientRepositoryContract;
use App\Repositories\Setting\SettingRepositoryContract;
use Auth;
use DB;



class ClientsController extends BackendController
{

    protected $users;
    protected $clients;
    protected $settings;

  //  public function __construct(
   //     UserRepositoryContract $users,
    //    ClientRepositoryContract $clients,
    //    SettingRepositoryContract $settings
 //   )
   // {
     //   $this->users = $users;
    //    $this->clients = $clients;
    //    $this->settings = $settings;
    //    $this->middleware('client.create', ['only' => ['create']]);
    //    $this->middleware('client.update', ['only' => ['edit']]);
  //  }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = DB::table('clients')->get();
        //dd('ffffff',$clients);
        return view('backend.clients.index', compact('clients'));
    }

    /**
     * Make json respnse for datatables
     * @return mixed
     */
    public function anyData()
    {
        $clients = Client::select(['id', 'name', 'company_name', 'email', 'primary_number']);
        return Datatables::of($clients)
            ->addColumn('namelink', function ($clients) {
                return '<a href="clients/' . $clients->id . '" ">' . $clients->name . '</a>';
            })
            ->add_column('edit', '
                <a href="{{ route(\'clients.edit\', $id) }}" class="btn btn-success" >Edit</a>')
            ->add_column('delete', '
                <form action="{{ route(\'clients.destroy\', $id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="submit" value="Delete" class="btn btn-danger" onClick="return confirm(\'Are you sure?\')"">

            {{csrf_field()}}
            </form>')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        //dd('kkkkk');
        return view('backend.clients.create');
            //,compact())
            //->withUsers($this->users->getAllUsersWithDepartments())
            //->withIndustries($this->clients->listAllIndustries());
    }
    public function clientstore(Request $request)
    {
          $lastlead = DB::table('clients')->orderBy('created_at','DESC')->first();
       // $order_id = '#'.str_pad($latestOrder->order_id + 1, 8, "0", STR_PAD_LEFT);
       // dd($latestOrder);
        if($lastlead){
          $lastleadno=$lastlead->lead_no;
          
        }else{
          $lastleadno='L-' . date('Ymd').'0000';
         // dd($lastorderId);
        }
        
// Get last 3 digits of last order id
            $lastIncreament = substr($lastleadno, -4);

            // Make a new order id with appending last increment + 1
            $newLeadNo = 'L-' . date('Ymd') . str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);
        //dd($newLeadNo);
        $message =  DB::table('clients')->insert(
                array(
            'user_id' => Auth::user()->id,
            'state' => $request->state,
            'district' => $request->district,
            'taluk' => $request->taluka,
            'lead_no' => $newLeadNo,
            'name' => $request->name,
            'company_name' => $request->company_name,
            'software_type' => $request->softwaretype,
            'pri_mobile' => $request->pri_mobile,
            'sec_mobile' => $request->sec_mobile,
            'email' => $request->email,
             'address' => $request->address,
            'landmark' => $request->landmark,
            'created_at' => date('Y-m-d H:i:s'),
                ));
        
        return redirect()->route('backend.client.index');
    }
    

    /**
     * @param StoreClientRequest $request
     * @return mixed
     */
    public function store(StoreClientRequest $request)
    {
        dd($request);
        $this->clients->create($request->all());
        return redirect()->route('clients.index');
    }

    /**
     * @param Request $vatRequest
     * @return mixed
     */
    public function cvrapiStart(Request $vatRequest)
    {
        return redirect()->back()
            ->with('data', $this->clients->vat($vatRequest));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return mixed
     */
    public function show($id)
    {
        return view('clients.show')
            ->withClient($this->clients->find($id))
            ->withCompanyname($this->settings->getCompanyName())
            ->withInvoices($this->clients->getInvoices($id))
            ->withUsers($this->users->getAllUsersWithDepartments());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('clients.edit')
            ->withClient($this->clients->find($id))
            ->withUsers($this->users->getAllUsersWithDepartments())
            ->withIndustries($this->clients->listAllIndustries());
    }

    /**
     * @param $id
     * @param UpdateClientRequest $request
     * @return mixed
     */
    public function update($id, UpdateClientRequest $request)
    {
        $this->clients->update($id, $request);
        Session()->flash('flash_message', 'Client successfully updated');
        return redirect()->route('clients.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->clients->destroy($id);

        return redirect()->route('clients.index');
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function updateAssign($id, Request $request)
    {
        $this->clients->updateAssign($id, $request);
        Session()->flash('flash_message', 'New user is assigned');
        return redirect()->back();
    }

}
