<?php

namespace Modules\Drivers\Http\Controllers;

use App\Configuration;
use App\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Modules\Drivers\Entities\Driver;
use Modules\Drivers\Events\NewDriverWasCreated;
use Modules\Drivers\Notifications\SendWelcomeEmail2Driver;
use phpDocumentor\Reflection\Types\Object_;
use Spatie\Permission\Models\Role;


class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($country = null)
    {
        $countries = Country::all();

        $hash = str_random();
        return view('drivers::index', compact(['countries', 'hash']));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'email' => 'required|email|unique:drivers',
            'phone' => 'required|min:9',
            'city' => 'required|min:2',
            'country' => 'required',
            'upload_image' => 'required',
            'vtype' => 'required',
            'carmodel' => 'required|min:2|max:50',
            'plateno' => 'required|min:3|max:25',

        ]);
        try {
            Driver::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'hash' => $request->hash,
                'email' => $request->email,
                'phone' => $request->phone,
                'city' => $request->city,
                'country' => $request->country,
                'vtype' => $request->vtype,
                'vmodel' => $request->carmodel,
                'plateno' => $request->plateno,
            ]);

            $data = new Object_();
            $data->name = $request->fname . ' ' . $request->lname;
            $data->email = $request->email;
            $data->country = $request->country;
            event(new NewDriverWasCreated($data));

            return back()->with([
                'alert' => __('leads.lead_created')
            ]);
        } catch (Exception $e) {
            return back()->with([
                'danger' => $e->getMessage()
            ]);
        }
    }

    public function sheet($active = 0)
    {



        $acl = [
            'showDriversStatics' => (Gate::allows('show-drivers-statics')) ? true : false,
            'makeDriversApproved' => (Gate::allows('make_drivers_approved')) ? true : false,
        ];
        $pendingDrivers=Driver::where('active',0)->count();


        return view('drivers::sheet', compact(['acl','pendingDrivers']));
    }

    public function active()
    {


        $acl = [
            'addCredit2user' => (Gate::allows('add_credit2user')) ? true : false,

        ];



        return view('drivers::active', compact(['acl']));
    }

    public function customers(){
        $acl = [
            'addCredit2user' => (Gate::allows('add_credit2user')) ? true : false,

        ];



        return view('drivers::customers.active', compact(['acl']));
    }

    public function test()
    {
        $user = User::find(1);
        $user->notify(new SendWelcomeEmail2Driver('hello foo', 'Medoo'));
        /* Notification::route('mail','free1soft@gmail.com')
            ->notify(new SendWelcomeEmail2Driver('hello foo','Medoo'));*/
        return 990;
    }
}
