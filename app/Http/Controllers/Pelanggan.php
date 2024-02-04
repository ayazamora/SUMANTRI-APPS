<?php

namespace App\Http\Controllers;


use DateTime;
use Faker\Core\DateTime as CoreDateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Pelanggan extends Controller
{
    public function updateUsers(Request $request)
    {

        DB::table('dpelanggan')
            ->where('id', $request->ids)
            ->update(['status' => $request->status]);

        return redirect('dashboard');
    }

    public function deleteUsers(Request $request)
    {

        DB::table('dpelanggan')
            ->where('id', $request->idex)
            ->delete();

        return redirect('dashboard');
    }

    public function postUsers(Request $request)
    {

        $cstKilo = $request->kiloan;

        if ($request->layanan === "Cuci Kering Lipat") {
            if ($request->jenis === "Regular") {
                $hargafix = 5000 * $cstKilo;
            } else {
                if ($request->jenis === "One Day") {
                    $hargafix = 8000 * $cstKilo;
                } else {
                    if ($request->jenis === "Express") {
                        $hargafix = 10000 * $cstKilo;
                    } else {
                        if ($request->jenis === "Quick") {
                            $hargafix = 15000 * $cstKilo;
                        } else {
                            $hargafix = 0;
                        }
                    }
                }
            }
        } else {
            if ($request->layanan === "Cuci Kering Gosok") {
                if ($request->jenis === "Regular") {
                    $hargafix = 8000 * $cstKilo;
                } else {
                    if ($request->jenis === "One Day") {
                        $hargafix = 12000 * $cstKilo;
                    } else {
                        if ($request->jenis === "Express") {
                            $hargafix = 16000 * $cstKilo;
                        } else {
                            if ($request->jenis === "Quick") {
                                $hargafix = 25000 * $cstKilo;
                            } else {
                                $hargafix = 0;
                            }
                        }
                    }
                }
            } else {
                if ($request->layanan === "Setrika Kiloan") {
                    if ($request->jenis === "Regular") {
                        $hargafix = 5000 * $cstKilo;
                    } else {
                        if ($request->jenis === "One Day") {
                            $hargafix = 10000 * $cstKilo;
                        } else {
                            if ($request->jenis === "Express") {
                                $hargafix = 12000 * $cstKilo;
                            } else {
                                if ($request->jenis === "Quick") {
                                    $hargafix = 15000 * $cstKilo;
                                } else {
                                    $hargafix = 0;
                                }
                            }
                        }
                    }
                } else {
                }
            }
        }



        $layananx = $request->layanan . '(' . $request->kiloan . ' kg)';
        DB::table('dpelanggan')->insert([
            'karyawan' => $request->karyawan,
            'nama_karyawan' => $request->nama_karyawan,
            'nama' => $request->namacustomer,
            'nomor_telepon' => $request->nomorhp,
            'alamat' => $request->alamat,
            'layanan' => $layananx,
            'jenis' => $request->jenis,
            'harga' => $hargafix,
            'masuk' => $request->tglmasuk,
            'keluar' => $request->tglkeluar,
            'status' => 'Pending',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('dashboard');
    }
}
