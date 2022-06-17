<?php

namespace App\Http\Controllers;

use App\Models\Unavailable;
use Illuminate\Http\Request;

class UnavailableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware(['auth', 'admin'])->except('show');
    } 
    public function index()
    {
        $unavailable = Unavailable::orderBy('id', 'desc')->paginate(10);
        // dd($unavailable);
        // return "unavailable.index";
        return view('unavailable.index',['unavailable' => $unavailable]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unavailable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'date' => 'required|date|date_format:Y-m-d', 
        ]);
        
        $unavailable = Unavailable::create($data);

        // dd($unavailable);

        return redirect()->route('unavailable.index')->with('message', 'Unavailable created!');
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
    public function edit(Unavailable $unavailable)
    {
        // dd($unavailable);
        return view('unavailable.edit', ['unavailable' => $unavailable]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unavailable $unavailable)
    {
        
        // dd($request->input());
        $data = $request->validate([
            'name' => 'required',
            'date' => 'required|date|date_format:Y-m-d', 
        ]);

        $unavailable->update(
            $data
        );

        // dd($unavailable);
        return redirect()->route('unavailable.edit', $unavailable)->with('message', 'Unavailable updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unavailable = Unavailable::find($id);
        $unavailable->delete();
        return redirect()->route('unavailable.index', $unavailable)->with('message', 'Unavailable deleted!');
    }
}
