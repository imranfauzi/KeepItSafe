<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;

class ItemsController extends Controller
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
       // $items = Item::all(); //fetch all data in this model Item. Jadikan dia variable $items
        
        $user_id = auth()->user()->id;
        $user  = User::find($user_id);
      
        //$items = Item::orderBy('name','desc')->paginate(10); //10 item per page
       // return view('items.index')->with('items', $items); 
       return view('items.index')->with('items',$user->items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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

            'name'=>'required',
            'place'=>'required',
            'description'=>'required',
            'photo'=>'required',


        ]);

       // Item::create($request->all());

      /* Item::create([

        'name' =>$request->name,
        'place'=>$request->place,
        'description'=>$request->description,


       ]); */

       $item = new Item;
       $item->name = $request->input('name');
       $item->place = $request->input('place');
       $item->description = $request->input('description');
       $item->user_id = auth()->user()->id;   //setiap item akan ikut id yg login tu
       $item->save();


       if($request->hasfile('photo')){
        $request->file('photo')->move('images/',$request->file('photo')->getClientOriginalName());
        $item->photo = $request->file('photo')->getClientOriginalName();
        $item->save();
    }


        return redirect('/items')->with('status','Item Added Successfully');
       }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        
        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);

        //check for correct user
        if(auth()->user()->id !==$item->user_id){
        return redirect('items.index')->with('error', 'Unauthorized Page');
        }
        return view('items.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([

            'name'=>'required',
            'place'=>'required',
            'description'=>'required',


        ]);

       // Item::create($request->all());

       Item::where('id', $item->id)
       
       ->update([

        'name' =>$request->name,
        'place'=>$request->place,
        'description'=>$request->description,


       ]);

       if($request->hasfile('photo')){
        $request->file('photo')->move('images/',$request->file('photo')->getClientOriginalName());
        $item->photo = $request->file('photo')->getClientOriginalName();
        $item->save();
    }

        return redirect('/items')->with('status','Item Updated Successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);
        return redirect('/items')->with('status','Data Deleted Successfully');
    }



    //For all user


    public function list()
    {
        $items = Item::all(); //fetch all data in this model Item. Jadikan dia variable $items
        
      //  $user_id = auth()->user()->id;
       // $user  = User::find($user_id);
      
        //$items = Item::orderBy('name','desc')->paginate(10); //10 item per page
       // return view('items.index')->with('items', $items); 
       return view('items.allindex')->with('items', $items); 
    }


    public function showlist($id)
    {
        $item = Item::find($id);
        
        return view('items.showlist')->with('item', $item);
    }
}
