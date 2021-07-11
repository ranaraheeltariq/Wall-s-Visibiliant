<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        if(!in_array(Auth::user()->department->name, array('Admin') )){
            return redirect('/')->with('Message','You Are Not Allowed There');
        }
        $users = User::all();
        return view('users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!in_array(Auth::user()->department->name, array('Admin') )){
            return redirect('/')->with('Message','You Are Not Allowed There');
        }
        return view('create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!in_array(Auth::user()->department->name, array('Admin') )){
            return redirect('/')->with('Message','You Are Not Allowed There');
        }
         $request->validate([
            'employeeid' => 'required|string',
            'name' => 'required|string',
            'username'   =>  'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'nullable|min:11|numeric',
            'designation' => 'required|string',
            'department_id' => 'required|numeric',
            'region_id' => 'nullable|exists:App\Models\Region,id',
            'conc_id' => 'nullable|exists:App\Models\Conc,id',
            'territory_id' => 'nullable|exists:App\Models\Territory,id',
            'password' => 'required|string|min:6|',
            
        ]);

        $data = ([
            'employeeid' => $request->employeeid,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'designation' => $request->designation,
            'department_id' => $request->department_id,
            'region_id' => $request->region_id,
            'conc_id' => $request->conc_id,
            'territory_id' => $request->territory_id,
            'password' => bcrypt($request->password),
        ]);

        $user = User::create($data);
         $email = array(
                    'to' => $user->email,
                    'to-name' => $user->name,
                    'subject' => "Welcome to Wall's Visibiliant CMR",
                    'content' => "Dear ".$user->name."<br><br> Welcome to Wall\'s Visibiliant CRM, your login detail are following<br><br> Username:  ".$user->username."<br>Password:  ".$request->password,
                );
                
                Mail::send([], [], function($message) use ($email) {
                $message->to($email['to']);
                $message->subject($email['subject']);
                $message->setBody($email['content'], 'text/html');
                });

        return back()->with('status','New User Successfully Register');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if($user->id == null)
            return view('myprofile');
        else
            return view('profile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!in_array(Auth::user()->department->name, array('Admin') )){
            return redirect('/')->with('Message','You Are Not Allowed There');
        }
        return view('edit_user')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, User $user)
    {
        if($request->filled('selfuser'))
        {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);
            $data = ([
                'password' => bcrypt($request->password),
            ]);
        }
        else {
            $request->validate([
                'employeeid' => 'required|string',
                'name' => 'required|string',
                'username'   =>  'required|string|unique:users',
                'mobile' => 'nullable|min:11|numeric',
                'designation' => 'required|string',
                'department_id' => 'required|numeric',
                'region_id' => 'nullable|exists:App\Models\Region,id',
                'conc_id' => 'nullable|exists:App\Models\Conc,id',
                'territory_id' => 'nullable|exists:App\Models\Territory,id',
                'password' => 'nullable|string|min:6|',
            ]);

            $data = ([
                'employeeid' => $request->employeeid,
                'name' => $request->name,
                'username' => $request->username,
                'mobile' => $request->mobile,
                'designation' => $request->designation,
                'department_id' => $request->department_id,
                'region_id' => $request->region_id,
                'conc_id' => $request->conc_id,
                'territory_id' => $request->territory_id,
                'password' => bcrypt($request->password),
            ]);
        }
        $user->update($data);
        return back()->with('status','Your Password Successfully Changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!in_array(Auth::user()->department->name, array('Admin') )){
            return redirect('/')->with('Message','You Are Not Allowed There');
        }
        $user->delete();
        return back()->with('status','User Successfully Deleted');
    }
}
