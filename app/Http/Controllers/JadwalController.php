<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use App\Models\Guru;
use App\Models\Kelas;
// use App\Models\JKhusus;
// use App\Models\Mapel;
// use App\Models\Ruang;
// use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guru()
    {
        //
        $data['dataGuru'] = Guru::all();
        $data['dataManual'] = Manual::with(['guru','mapel','kelas','ruang','slot'])->oldest()->get();
        return view('frontend.jadwal.guru.index',$data);
    }

    // public function findGuru($id)
    // {
    //     //
    //     $data['find'] = Jadwal::find($id);
    //     if(!$data['find']){
    //         Alert::error('error','Data Not Found!');
    //         return redirect()->route('jadwal.index');
    //     }
    //     return view('frontend.jadwal.guru.index',$data);
    // }
    // public function filterGuru(Request $request, $id)
    // {
    //     //
    //     $filter=$request->all();
    //     dd($filter);
    // }

    public function findGuru(Request $request)
    {
        //
        $find = $request->get('guru_id');
        $data['dataGuru'] = Guru::all();
        // dd($find);
        if(!$find){
            Alert::error('error','Data not Found!');
            return redirect()->route('jadwal.guru');
        } elseif ($find == 'all') {
            $data['dataManual'] = Manual::with(['guru','mapel','kelas','ruang','slot'])->get();
            // dd($data);
            return view('frontend.jadwal.guru.index',$data);
        } else {
            // Alert::success('success','Data Added successfully');
            // $data['Jadwal'] = DB::select('select * from manuals where guru_id = ?', [$find])->get();
            $data['dataManual'] = Manual::with(['guru','mapel','kelas','ruang','slot'])
            ->where('guru_id', $find)
            ->orderBy('slot_id', 'asc')
            ->get();
            // dd($data);
            return view('frontend.jadwal.guru.index',$data);
        }
    }
    
    public function kelas()
    {
        //
        $data['dataKelas'] = Kelas::all();
        $data['dataManual'] = Manual::with(['guru','mapel','kelas','ruang','slot'])->oldest()->get();
        return view('frontend.jadwal.kelas.index',$data);
    }

    public function findKelas(Request $request)
    {
        //
        $find = $request->get('kelas_id');
        $data['dataKelas'] = Kelas::all();
        // dd($find);
        if(!$find){
            Alert::error('error','Data not Found!');
            return redirect()->route('jadwal.kelas');
        } elseif ($find == 'all') {
            $data['dataManual'] = Manual::with(['guru','mapel','kelas','ruang','slot'])->get();
            // dd($data);
            return view('frontend.jadwal.kelas.index',$data);
        } else {
            // Alert::success('success','Data Added successfully');
            // $data['Jadwal'] = DB::select('select * from manuals where guru_id = ?', [$find])->get();
            $data['dataManual'] = Manual::with(['guru','mapel','kelas','ruang','slot'])
            ->where('kelas_id', $find)
            ->orderBy('slot_id', 'asc')
            ->get();
            // dd($data);
            return view('frontend.jadwal.kelas.index',$data);
        }
    }
}
