<?php

namespace Modules\PPDB\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use ErrorException;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Modules\PPDB\Entities\Angket;
use Modules\PPDB\Entities\AngketResponse;
use Modules\PPDB\Entities\AngketAnswer;

class AngketController extends Controller
{
    public function index()
    {
        $angkets = Angket::all();
        return view('ppdb::backend.angket.index', compact('angkets'));
    }

    public function addAngket(Request $request)
    {
        try {
            Angket::create([
                'pertanyaan' => $request->pertanyaan
            ]);
            Session::flash('success','Pertanyaan berhasil ditambah dalam angket');
            return back();    
        }
        catch (\ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    public function showAngketForm()
    {
        $cekAngket = AngketResponse::where('user_id', Auth::id())->first();
        if ($cekAngket !== null) {
            Session::flash('error', 'Kamu sudah mengisi angket, angket hanya bisa diisi sekali');
            return redirect('/home');
        }
        $angkets = Angket::all();
        return view('ppdb::backend.angket.angketForm', compact('angkets'));
    }

    public function submitAngketForm(Request $request)
    {

        // Validasi input
        $request->validate([
            'jawaban.*' => 'required|string|max:1000', // Validasi setiap jawaban
        ]);

        // Membuat respons angket baru
        $angketResponse = AngketResponse::create([
            'user_id' => Auth::id(), // Mengambil ID pengguna yang sedang login
        ]);

        // Menyimpan jawaban ke dalam database
        foreach ($request->jawaban as $angketId => $jawaban) {
            AngketAnswer::create([
                'angket_response_id' => $angketResponse->id,
                'angket_id' => $angketId,
                'jawaban' => $jawaban,
            ]);
        }
        Session::flash('success', 'Sukses, Jawaban angket berhasil dikirim !');
        return redirect('/home');
    }

    public function destroy($id)
    {
        try {
            $angket = Angket::findOrFail($id);
            $angket->delete();
            Session::flash('success', 'Pertanyaan berhasil dihapus dari angket');
            return back();
        } catch (\ErrorException $e) {
            Session::flash('error', 'Gagal menghapus pertanyaan: ' . $e->getMessage());
            return back();
        }
    }
        
}
