<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Obat;
use App\Models\FungsiObat;
use App\Models\JenisObat;
use App\Models\Kilo;
use App\Models\Buah;
use App\Models\Pajak;



class TanikuApiController extends Controller
{
    public function get_tutorial()
    {
        $tutorials = Tutorial::all()->map(function ($tutorial) {
            return [
                'id' => $tutorial->id,
                'id_buah' => $tutorial->id_buah,
                'id_obat' => $tutorial->id_obat,
                'creator' => $tutorial->creator,
                'photo_creator' => url('storage/' . $tutorial->photo_creator),
                'judul' => $tutorial->judul,
                'deskripsi' => $tutorial->deskripsi,
                'video' => url('storage/' . $tutorial->video),
                'created_at' => $tutorial->created_at,
                // 'updated_at' => $tutorial->updated_at, // Exclude this field
            ];
        });

    return response()->json(['message' => 'success', 'data' => $tutorials]);
    }
    
public function get_obat()
{
    $jenisobats = JenisObat::all()->map(function ($jenisobat) {
        $obats = Obat::with('fungsiObat1')->where('id_jenis', $jenisobat->id)->get()->map(function ($obat) {
            $fungsiobats = $obat->fungsiObat1->map(function ($fungsiobat) {
                return [
                    'fungsi' => $fungsiobat->fungsi,
                    'poto_fungsi' => url('storage/' . $fungsiobat->poto_fungsi),
                ];
            });

            return [
                'id' => $obat->id,
                'nama_obat' => $obat->nama_obat,
                'photo_obat' => url('storage/' . $obat->photo_obat),
                'deskripsi' => $obat->deskripsi,
                'fungsiobats' => $fungsiobats,
            ];
        });

        return [
            'id' => $jenisobat->id,
            'jenis' => $jenisobat->jenis,
            'obats' => $obats,
        ];
    });

    return response()->json(['message' => 'success', 'data' => $jenisobats]);
}


    public function get_market()
    {
        $buahs = Buah::all()->map(function ($buah) {
            $kilos = Kilo::with('kiloPajak1')->where('id_buah', $buah->id)->get()->map(function ($kilo) {
                return [
                    'id' => $kilo->id,
                    'id_pajak' => $kilo->id_pajak,
                    'hp' => $kilo->hp,
                    'pajak' => $kilo->kiloPajak1 ? [
                        'pajak' => $kilo->kiloPajak1->pajak,
                        'alamat' => $kilo->kiloPajak1->alamat,
                    ] : null,
                ];
            });

            return [
                'id' => $buah->id,
                'nama_buah' => $buah->nama_buah,
                'poto_buah' => url('storage/' . $buah->poto_buah),
                'kilos' => $kilos,
            ];
        });

        return response()->json(['message' => 'success', 'data' => $buahs]);
    }
   
}
