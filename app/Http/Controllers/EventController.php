<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
        
        return view('events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required'
        ]);

         //image upload
         if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $user_id = Auth::id();
        $event = new  Event([
            'name'=>$request->name,
            'description'=>$request->description,
            'date' => $request->date,
            'location' => $request->location,
            'cover_image'=> $fileNameToStore,
            'user_id'=> $user_id
          ]);
          $event->save();

  
     
        return redirect()->route('events.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
            'cover_image'=> 'image|nullable|max:1999'
        ]);
       
        $event-> user_id = Auth::id();
        
         $event->update($request->all());
    
        return redirect()->route('events.index')
                        ->with('success','Event updated successfully');
    
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
    
        return redirect()->route('events.index')
                        ->with('success','Event deleted successfully');
    }
    }

