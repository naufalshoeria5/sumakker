<?php

namespace App\Http\Controllers;

use App\Http\Requests\Type\StoreRequest;
use App\Models\LetterType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Contact model instance.
     *
     * @var \App\Models\Type
     */
    protected $type;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(LetterType $type)
    {
        $this->type = $type;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = $this->type::get()->pluck('name', 'id');

        return view('pages.type.index', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $type = $this->type->fill($request->except('_token'));

        $type->save();

        return redirect()->back()->withSuccess('Berhasil Tambah Jenis Surat');
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
        $this->type::where('id', $id)->delete();

        return redirect()->back()->withSuccess('Berhasil Hapus Data');
    }
}
