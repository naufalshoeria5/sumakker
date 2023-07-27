<?php

namespace App\Http\Controllers;

use App\Exports\UnitExport;
use App\Http\Requests\Unit\StoreRequest;
use App\Models\Unit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $unit = $this->unit->fill($request->except('_token'));

        $unit->save();

        return redirect()->back()->withSuccess('Berhasil Tambah Unit');
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

        return redirect()->back()->withSuccess('Berhasil Hapus Data');
    }

    /**
     * export the specified resource from storage.
     */
    public function export()
    {
        $month = date('F');
        $year = date('Y');

        $filename = "Unit Periode $month Tahun $year.xlsx";

        return Excel::download(new UnitExport(), $filename);
    }
}
