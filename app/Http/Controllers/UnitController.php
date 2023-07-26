<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Contact model instance.
     *
     * @var \App\Models\Unit
     */
    protected $unit;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = $this->unit::get()->pluck('name', 'id');

        return view('pages.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit = $this->unit->fill($request->except('_token'));

        $unit->save();

        return redirect()->back()->withSuccess('berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->unit::where('id', $id)->delete();

        return redirect()->back()->withSuccess('berhasil');
    }
}
