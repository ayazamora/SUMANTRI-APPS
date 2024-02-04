<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth()->user()->email && Auth()->user()->role === "karyawan") {
            $dpl = DB::table('dpelanggan')->where('karyawan', Auth()->user()->email)->get();
            $hargi = "Rp " . number_format($dpl->sum('harga'), 2, ',', '.');
            $pesanx = $dpl->where('status', 'Selesai')->count();
            $jmlp = $dpl->count();
            return view('home', ['pelanggans' => $dpl, 'ppp' => $hargi, 'ccc' => $jmlp, 'ddd' => $pesanx]);
        } else {
            $dpl = '';

            if (Auth()->user()->email && Auth()->user()->role === "admin") {
                $dpl = DB::table('dpelanggan')->get();
                $dpr = DB::table('users')->get();
                $hargi = "Rp " . number_format($dpl->sum('harga'), 2, ',', '.');
                $pesanx = $dpl->where('status', 'Selesai')->count();
                $jmlp = $dpl->count();
                return view('home', ['pelanggans' => $dpl, 'aad' => $dpr, 'ppp' => $hargi, 'ccc' => $jmlp, 'ddd' => $pesanx]);
            } else {
                $dpl = '';
                return view('home', ['pelanggans' => $dpl]);
            }

            return view('home', ['pelanggans' => $dpl]);
        }
    }

    public function nambahKaryawan(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->namakarya,
            'email' => $request->emailkarya,
            'role' => 'karyawan',
            'password' => bcrypt($request->passwordkarya),
        ]);

        return redirect('dashboard');
    }

    public function roleChange(Request $request)
    {

        DB::table('users')
            ->where('id', $request->idex)
            ->update(['role' => $request->statuskarya]);

        return redirect('dashboard');
    }

    public function deletekaryawan(Request $request)
    {

        DB::table('users')
            ->where('id', $request->idexx)
            ->delete();

        return redirect('dashboard');
    }
}
