<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tickets\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.nom.type.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nom.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $type = new Type();
        $type->name = $request->input('title');
        $type->description = $request->input('body');
        $type->id_user = Auth::user()->id;
        $type->save();

        return redirect('/type')->with('success', 'Type Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::find($id);
        return view('admin.nom.type.show')->with('type', $type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.nom.type.edit')->with('type', $type);
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
        $type = Type::find($id);
        $type->name = $request->input('title');
        $type->description = $request->input('body');
        $type->save();

        return redirect('/type')->with('success', 'Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();

        return redirect('/type')->with('success', 'Type Has Been Successfully Deleted');
    }
}
