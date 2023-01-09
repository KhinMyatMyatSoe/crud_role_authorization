<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('user.user');
        // return "test";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $request->validate([
        'product_name'=>'required',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price'=>'required',
        'quantity'=>'required'
       ]);
       $path = $request->file('image')->store('uploads');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $image_path = $name;
        }else{
            $image_path = '';
        }
        $admin = new Admin;
        $admin->product_name = $request->product_name;
        $admin->image = $image_path;
        $admin->price = $request->price;
        $admin->quantity = $request->quantity;
        $admin->save();
        return redirect('customer_profile');
        // return route('customer_profile.index');
        // return redirect()->route('customer_profile.index');
        // return redirect()->route('categories.index')->with('success', 'Post created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin,$id)
    {
        $admin = Admin::find($id);
        if(Gate::allows('view')){
            return view('admin.admin_edit',compact('admin'));
        }else{
             return back()->with('error','you are Unauthorize');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin,$id)
    {
        $admin = Admin::find($id);
        if(Gate::allows('view')){
            $admin->product_name = $request-> product_name;
            // $admin->image =$request->image;
            $admin->price = $request->price;
            $admin->quantity = $request->quantity;
            $admin->save();
            return redirect()->route('customer_profile.index');
        }else{
            return back()->with('error','you are Unauthorize');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin, $id)
    {
        $admin = Admin::find($id);
        if(Gate::allows('view')){
             $admin->delete();
        return redirect()->route('customer_profile.index')->with('success','Category delete successfully');
        }else{
            return back()->with('error','you are Unauthorize');
        }

        // return back();

    }
}