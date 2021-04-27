<?php

namespace App\Http\Controllers;

use App\Models\Bettor;
use Illuminate\Http\Request;

class BettorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request->horse_id) && $request->horse_id !== 0) {
            $bettors = \App\Models\Bettor::where('horse_id', $request->horse_id)->orderBy('bet', 'desc')->get();
        }
        else if ($request->get('search')) {
            //$search = $request->get('search');
            $search = $request->input('search');
            $bettors = \App\Models\Bettor::
            orWhere('bettor_name', 'like', '%' . $search . '%')
            ->orWhere('bettor_surname', 'like', '%' . $search . '%')
            ->get();

        } else {
            $bettors = \App\Models\Bettor::orderBy('bet', 'desc')->get();
        }
            
        $horses = \App\Models\Horse::orderBy('horse_name')->get();
        return view('bettors.index', ['bettors' => $bettors, 'horses' => $horses]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = \App\Models\Horse::orderBy('horse_name')->get();
        return view('bettors.create', ['horses' => $horses]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bettor = new Bettor();
        // can be used for seeing the insides of the incoming request
        // dd($request->all());;
        $bettor->fill($request->all());
        $bettor->save();
        return redirect()->route('bettors.index', ['horse_id' => $request->horse_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bettor  $bettor
     * @return \Illuminate\Http\Response
     */
    public function show(Bettor $bettor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bettor  $bettor
     * @return \Illuminate\Http\Response
     */
    public function edit(Bettor $bettor)
    {
        $horses = \App\Models\Horse::orderBy('horse_name')->get();
        return view('bettors.edit', ['bettor' => $bettor, 'horses' => $horses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bettor  $bettor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bettor $bettor)
    {
        $bettor->fill($request->all());
        $bettor->save();
        return redirect()->route('bettors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bettor  $bettor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bettor $bettor, Request $request)
    {
        $bettor->delete();
        return redirect()->route('bettors.index', ['horse_id' => $request->input('horse_id')]);
    }
}
