<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Contact model instance.
     *
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user::get();

        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $user = $this->user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('file')) {
            $this->user
                ->addMedia($request->file('file'))
                ->toMediaCollection('users');
        }


        dd($request->all());

        $user->save();

        return redirect()->route('users.index')->withSuccess('Berhasil Tambah User');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->user::find($id);

        if (!$user) {
            abort(404);
        }

        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $user = $this->user::find($id);

        if (!$user) {
            abort(404);
        }

        $user->fill([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $user['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('file')) {
            $user->clearMediaCollection('users');

            $user
                ->addMedia($request->file('file'))
                ->toMediaCollection('users');
        }

        $user->save();

        return redirect()->route('users.index')->withSuccess('Berhasil Update User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->id == $id) {
            return redirect()->back()->withSuccess('Gagal, Anda tidak bisa menghapus diri anda sendiri');
        }
        $this->user::where('id', $id)->delete();

        return redirect()->back()->withSuccess('Berhasil Hapus Data');
    }

    /**
     * export the specified resource from storage.
     */
    public function export()
    {
        $month = date('F');
        $year = date('Y');

        $filename = "User Periode $month Tahun $year.xlsx";

        return Excel::download(new UserExport(), $filename);
    }
}
