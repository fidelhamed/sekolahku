<?php

namespace App\Http\Controllers\Backend\Pengguna;

use DB;
use Session;
use ErrorException;
use App\Models\User;
use App\Models\UsersDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ppdbRequest;
use App\Http\Controllers\Controller;

class PPDBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('userDetail')->where('role','PPDB')->get();
        return view('backend.pengguna.ppdb.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengguna.ppdb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ppdbRequest $request)
    {
        try {
            DB::beginTransaction();

            $image = $request->file('foto_profile');
            $nama_img = time()."_".$image->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/profile';
            $image->storeAs($tujuan_upload,$nama_img);

            // Pilih kalimat
            $kalimatKe  = "1";
            $randomNumber = rand(1, 9999);
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)) . $randomNumber; // ambil kalimat

            $user = new User();
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->username         = strtolower($username);
            $user->role             = 'PPDB';
            $user->status           = 'Aktif';
            $user->foto_profile     = $nama_img;
            $user->password         = bcrypt('Bismillah');
            $user->save();

            if ($user) {
                $userDetail = new UsersDetail();
                $userDetail->user_id      = $user->id;
                $userDetail->role         = $user->role;
                $userDetail->nip          = $request->nip;
                $userDetail->email        = $request->email;
                $userDetail->pj_jenjang   = $request->pj_jenjang;
                $userDetail->linkedln     = $request->linkedln;
                $userDetail->instagram    = $request->instagram;
                $userDetail->website      = $request->website;
                $userDetail->facebook     = $request->facebook;
                $userDetail->twitter      = $request->twitter;
                $userDetail->youtube      = $request->youtube;
                $userDetail->save();
            }

            $user->assignRole($user->role);
            DB::commit();
            Session::flash('success','Staf PPDB Berhasil ditambah !');
            return redirect()->route('backend-pengguna-ppdb.index');

        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
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
        $user = User::with('userDetail')->find($id);
        return view('backend.pengguna.ppdb.edit', compact('user'));
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
        try {
            DB::beginTransaction();

            if ($request->foto_profile) {
                $image = $request->file('foto_profile');
                $nama_img = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/profile';
                $image->storeAs($tujuan_upload,$nama_img);
            }

           
            $user = User::find($id);
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->status           = $request->status;
            $user->foto_profile     = $nama_img ?? $user->foto_profile;
            $user->save();

            if ($user) {
                $userDetail = UsersDetail::where('user_id',$id)->first();
                $userDetail->user_id      = $user->id;
                $userDetail->nip          = $request->nip;
                $userDetail->is_active    = $user->status == 'Aktif' ? '0' : '1';
                $userDetail->email        = $request->email;
                $userDetail->pj_jenjang   = $request->pj_jenjang;
                $userDetail->linkedln     = $request->linkedln;
                $userDetail->instagram    = $request->instagram;
                $userDetail->website      = $request->website;
                $userDetail->facebook     = $request->facebook;
                $userDetail->twitter      = $request->twitter;
                $userDetail->youtube      = $request->youtube;
                $userDetail->save();
            }

            DB::commit();
            Session::flash('success','Staf PPDB Berhasil diubah !');
            return redirect()->route('backend-pengguna-ppdb.index');

        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    public function resetPassword(User $user)
    {
        // Pastikan hanya superadmin yang dapat mengakses fungsi ini
        if (!Auth::user()->role == 'Admin') {
            return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
        }

        // Reset password
        $user->password = Hash::make('Bismillah');
        $user->save();

        // Berikan feedback kepada superadmin
        Session::flash('success', 'Password untuk ' . $user->name . ' telah direset menjadi "Bismillah".');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
