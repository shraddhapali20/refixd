<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use Validator;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $un = $request['username'];
         $pw = $request['password'];
        //echo "in login submit";
         $data = Validator::make($request->all(),[
            "username"=>"required|max:20|min:6",

            "password"=>"required|max:20|min:6"
        ],[
             "username.required"=>"Admin username need to fill",
             "password.required"=>"Password is required"        

            
        ])->validate();
       print_r($request->all());

       $obj = Admin::where([
        ["name","=",$un],["passowrd","=",$pw]
        ])
        ->get();
        echo "<br><br><br><pre>";
      print_r($obj->all());
      //exit;
      if ($obj)
       {
            echo "login successfull";
            session()->put("admin",$un);
            echo "session:".
            $a = session()->get("admin");
            if($a)
            {
                echo "about to redirect";
                return redirect("customer");
            }
       }
       else
       {
        return redirect("admin");
       }

 /*        $obj = Customer::find($id);
           $obj->name = $request->name;
           $obj->email = $request->email;
           $obj->phone = $request->phone;
           $obj->created_at = date("Y-m-d h:i:s ");
           $is_saved = $obj->save();
      
       if ($is_saved)
       {
            session()->flash("customerMessage", "Customer has been updated successfully");
            return redirect("customer/".$id."/edit");

       }
*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "in logout";
        $a = session()->get("admin");
        //echo "session in admin: ".$a;
        //exit;
        if(session()->has('admin'))
        {
            session()->forget('admin');

            session()->flush();
            //$a = session()->get("admin");
            //echo "session in admin: ".$a;
            //exit;
            return redirect("admin");
            
        }
       

    }
     
}
