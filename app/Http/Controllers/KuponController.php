<?php

namespace App\Http\Controllers;
use App\Kupon;
use Illuminate\Http\Request;

class KuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kupon = Kupon::all();
        return view('index', compact('kupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:60',
            'value' => 'required|numeric',
            'barcode' => 'required|numeric',
            'validtil' => 'required|date:Y-m-d',
            'kiad'=>'required',
            'used' => 'required',
        ]);

        $kupon = Kupon::create($storeData);

        return redirect('/kuponok')->with('completed', 'Felvitted a kupont!');
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
        $kupon = Kupon::findOrFail($id);
        return view('edit', compact('kupon'));
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
        $updateData = $request->validate([
            'name' => 'required|max:60',
            'used' => 'required',
            'kiad' => 'required|date:Y-m-d',
        ]);
        Kupon::whereId($id)->update($updateData);
        return redirect('/kuponok')->with('completed', 'Frissítve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kupon = Kupon::findOrFail($id);
        $kupon->delete();

        return redirect('/kuponok')->with('completed', 'Töröltük a kupont');
    }
}
