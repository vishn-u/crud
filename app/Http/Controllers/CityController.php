<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\State;
use Session;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cities=City::all();
         //dd($c);

          return view('city', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::where('status', 1)->pluck('name','id')->prepend('select state','');
        return view('city_create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                 'name' => 'required|string',
                 'status' => 'required',
                 'state_id' => 'required'
                         ]);

        /*if($request->ajax()){
            return response()->json(['message'=>'name already exists'],500);

        }*/


        $city=new City;
        $city->name = $request->name;
        $city->status =$request->status;
        $city->state_id =$request->state_id;
        $city->save();

        $message='City added successfully!';

        if($request->ajax()){
            return response()->json(['message'=>$message]);

        }

        Session::flash('flash_message', $message);
         return redirect()->route('city.index');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //dd($id);


        $city=City::where('id',$id)->first();
        //dd($city)
         $states = State::where('status', 1)->pluck('name','id')->prepend('select state','');
        return view('city_edit', compact('city','states'));

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

        $request->validate([
                 'name' => 'required|string',
                 'status' => 'required',
                 'state_id' => 'required'
                         ]);

        //dd($request->all());
        $city = City::findorfail($id);
        $city->name = $request->name;
        $city->status =$request->status;
        $city->state_id =$request->state_id;
        $city->save();

               $message='City Updated successfully!';

           if($request->ajax()){
            return response()->json(['message'=>$message]);

        }

         Session::flash('flash_message', 'City updated successfully!');
         return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $city=City::where('id',$id)->delete();
        return redirect()->route('city.index');
    }
   
}
