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
    public function index(Request $request)
    {
        
            $properties = Property::paginate(100);

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
            'building_name'=> 'required|string|max:191',
            'price' => 'required|numeric',
            'full_price' => 'required|numeric',
            'site_area' => 'required|numeric',
            'building_area' => 'required|numeric',
            'architecture' => 'required',
            'prefecture' => 'required',
            'city' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'station' => 'required|string|max:191',
            'on_foot' => 'required|numeric|max:191',
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
            'building_name'=> 'required|string|max:191',
            'price' => 'required|numeric',
            'full_price' => 'required|numeric',
            'site_area' => 'required|numeric',
            'building_area' => 'required|numeric',
            'architecture' => 'required',
            'prefecture' => 'required',
            'city' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'station' => 'required|string|max:191',
            'on_foot' => 'required|numeric|max:191',
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
    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        if(!empty($keyword)){
            $properties = Property::where('building_name','like','%'.$keyword.'%')
                ->paginate(100);
             
        }else{
            $properties= Property::paginate(100);
        }
        
        return view('properties.find',[
            'properties' => $properties,
            'keyword' => $keyword,
            ]);
    }
}
