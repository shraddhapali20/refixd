<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Validator;
//use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$a = session()->get("admin");
        //echo "session in Customer: ".$a;
        //exit;
        if(session()->has('admin'))
        {
            $customers = Customer::orderBy("id","desc")->paginate(2);
            return view("customer.index", ['data'=>$customers]);
        }
        else
        {
            return redirect("admin");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("customer.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all());
        //exit;
        $data = Validator::make($request->all(),[
            "name"=>"required|max:255",

            "email"=>"required|max:255|email",

            "phone"=>"required|numeric"
        ],[
             "name.required"=>"Customer name need to fill",

            "email.required"=>"Customer Email address need to fill",

            "email.email"=>"Customer Email address is not in proper format",

            "phone.required"=>"Customer Phone number need to fill",

            "phone.integer"=>"Customer Phone number should be an integer"
        ])->validate();
       //print_r($data);
       //exit;
       $obj = new Customer;
        $obj->name = $request->name;
           $obj->email = $request->email;
           $obj->phone = $request->phone;
           $obj->created_at = date("Y-m-d h:i:s ");
       $is_saved = $obj->save();
       if ($is_saved)
       {
            //session()->flash("adminMessage", "Admin is successfully login");
            return redirect("customer/");

       }
       //print_r($data);
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
        $customer = Customer::find($id);

        return view("customer.edit", compact("customer"));
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
        //return "form update";
        print_r($request->all());
        //exit;
         $data = Validator::make($request->all(),[
            "name"=>"required|max:255",

            "email"=>"required|max:255|email",

            "phone"=>"required|numeric"
        ],[
             "name.required"=>"Customer name need to fill",

            "email.required"=>"Customer Email address need to fill",

            "email.email"=>"Customer Email address is not in proper format",

            "phone.required"=>"Customer Phone number need to fill",

            "phone.integer"=>"Customer Phone number should be an integer"
        ])->validate();

         $obj = Customer::find($id);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return "in destroy";
        $customer = Customer::find($id);
        $is_deleted = $customer->delete();
        if($is_deleted)
        {
            session()->flash("customerMessage","Customer has been deleted");
            return redirect("customer");
        }

    }

}
