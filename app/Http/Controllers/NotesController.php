<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Notes::where('user_id','=',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.notes.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('user_id','=',Auth::user()->id)->get();
        return view('admin.notes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'topic' => ['required', 'min:4'],
            'notes' => ['required'],
            'category_id' => 'required',
        ]);

        $note = new Notes();
        $note->topic = $request->topic;
        $note->notes = $request->notes;
        $note->category_id = $request->category_id;
        $note->user_id = auth()->user()->id;
        
        $note->save();
        return to_route('dashboard.notes.index')->with('message', 'Notes created Sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        $category = Category::where('id','=',$notes->category_id)->first();
        return view('admin.notes.show',compact('notes','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $notes)
    {
        $categories = Category::where('user_id','=',Auth::user()->id)->get();
        $cat = Category::where('id','=',$notes->category_id)->first();
        // dd($cat);
        return view('admin.notes.edit', compact('categories','cat','notes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $notes)
    {
        $notes->delete();
        return back()->with('message', 'Notes Deleted Sucessfully!');
    }
}
