<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        
        return view('properties.index',[
            'properties' => $properties,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = new Property;
        
        
        return view('properties.create',[
            'property' => $property,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'building_name'=> 'required|max:191',
            'price' => 'required|max:191',
            'full_price' => 'required|max:191',
            'site_area' => 'required|max:191',
            'building_area' => 'required|max:191',
            'architecture' => 'required',
            'prefecture' => 'required',
            'city' => 'required|max:191',
            'address' => 'required|max:191',
            'station' => 'required|max:191',
            'on_foot' => 'required|max:191',
            ]);
        
        $property = new Property;
        
            $property->building_name = $request->building_name;
            $property->price = $request->price;
            $property->full_price = $request->full_price;
            $property->site_area = $request->site_area;
            $property->building_area = $request->building_area;
            $property->architecture = $request->architecture;
            $property->prefecture = $request->prefecture;
            $property->city = $request->city;
            $property->address = $request->address;
            $property->station = $request->station;
            $property->on_foot = $request->on_foot;
            $property->save();
            
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        
        return view('properties.show',[
            'property' => $property,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property =Property::find($id);
        
        return view('properties.edit',[
            'property'=>$property,
            ]);
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
        $this->validate($request,[
            'building_name'=> 'required|max:191',
            'price' => 'required|max:191',
            'full_price' => 'required|max:191',
            'site_area' => 'required|max:191',
            'building_area' => 'required|max:191',
            'architecture' => 'required',
            'prefecture' => 'required',
            'city' => 'required|max:191',
            'address' => 'required|max:191',
            'station' => 'required|max:191',
            'on_foot' => 'required|max:191',
            ]);
        
        $property =Property::find($id);
        
            $property->building_name = $request->building_name;
            $property->price = $request->price;
            $property->full_price = $request->full_price;
            $property->site_area = $request->site_area;
            $property->building_area = $request->building_area;
            $property->architecture = $request->architecture;
            $property->prefecture = $request->prefecture;
            $property->city = $request->city;
            $property->address = $request->address;
            $property->station = $request->station;
            $property->on_foot = $request->on_foot;
            $property->save();
            
        return redirect('properties/'.$property->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        
        return redirect('/');
    }
}
