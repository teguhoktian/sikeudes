<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Desa;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(User::get())
                ->addColumn('action', function ($row) {
                    $button  = '<a href="' . route('user.edit', ['user' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    return $button;
                })->make();
        }
        return view('user.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desas = Desa::get()->pluck('full_name', 'id');
        return view('user.create')->with([
            'desas' => $desas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        User::create($request->all());
        return redirect()->route('user.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $desas = Desa::get()->pluck('full_name', 'id');
        return view('user.edit')->with([
            'user' => $user,
            'desas' => $desas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $request['password'] = (is_null($request->password)) ? $user->password : Hash::make($request->password);
        $user->update($request->all());
        return redirect()->route('user.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            User::find($id)->delete();
        }
        return redirect()->route('user.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
