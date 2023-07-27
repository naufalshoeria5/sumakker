<?php

namespace App\Http\Controllers;

use App\Http\Requests\Letter\StoreRequest;
use App\Http\Requests\Letter\UpdateRequest;
use App\Models\Letter;
use App\Models\LetterType;
use App\Models\Unit;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Contact model instance.
     *
     * @var \App\Models\Letter
     * @var \App\Models\Unit
     * @var \App\Models\LetterType
     */
    protected $letter;
    protected $unit;
    protected $letterType;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(Letter $letter, Unit $unit, LetterType $letterType)
    {
        $this->letter = $letter;
        $this->unit = $unit;
        $this->letterType = $letterType;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = (object) [
            'status' => request()->input('status')
        ];

        $letters = $this->letter::filter($filter)
            ->latest()
            ->get();

        return view('pages.letter.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units  = $this->unit::get()->pluck('name', 'id');
        $letterType  = $this->letterType::get()->pluck('name', 'id');

        return view('pages.letter.create', compact('units', 'letterType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $letter = $this->letter->fill([
            'code' => $request->code,
            'code_agenda' => $request->code_agenda,
            'status' => $request->status,
            'date' => $request->date,
            'from' => $request->from,
            'regarding' => $request->regarding,
            'unit_id' => $request->unit_id,
            'letter_type_id' => $request->letter_type_id
        ]);

        $this->letter
            ->addMedia($request->file('file'))
            ->toMediaCollection('letter');

        $letter->save();

        return redirect()->route('surat.index', ['status' => $request->status])->withSuccess('Berhasil Tambah Surat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $letter = $this->letter::find($id);

        if (!$letter) {
            abort(404);
        }

        return view('pages.letter.show', compact('letter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $letter = $this->letter::find($id);

        if (!$letter) {
            abort(404);
        }

        $units  = $this->unit::get()->pluck('name', 'id');
        $letterType  = $this->letterType::get()->pluck('name', 'id');

        return view('pages.letter.edit', compact('letter', 'units', 'letterType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $letter = $this->letter::find($id);

        if (!$letter) {
            abort(404);
        }

        $letter->fill([
            'code' => $request->code,
            'code_agenda' => $request->code_agenda,
            'status' => $request->status,
            'date' => $request->date,
            'from' => $request->from,
            'regarding' => $request->regarding,
            'unit_id' => $request->unit_id,
            'letter_type_id' => $request->letter_type_id
        ]);

        if ($request->hasFile('file')) {
            $letter->clearMediaCollection('letter');

            $this->letter
                ->addMedia($request->file('file'))
                ->toMediaCollection('letter');
        }

        $letter->save();

        return redirect()->route('surat.index', ['status' => $request->status])->withSuccess('Berhasil Update ' . $request->status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
