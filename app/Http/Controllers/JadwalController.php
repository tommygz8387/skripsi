<?php

namespace App\Http\Controllers;

use App\Models\Ampu;
use App\Models\Guru;
use App\Models\Kelas;
// use App\Models\JKhusus;
// use App\Models\Mapel;
// use App\Models\Ruang;
// use App\Models\Slot;
use App\Models\Manual;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    private $manual;
    public function __construct()
    {
        $this->manual = Manual::with(['ampu','kelas','ruang','slot']);
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
        $data['dataManual'] = $this->manual->oldest()->get();
        return view('frontend.jadwal.guru.index',$data);
    }

    // public function findGuru($id)
    // {
    //     //
    //     $data['find'] = Jadwal::find($id);
    //     if(!$data['find']){
    //         Alert::error('Error','Data Not Found!');
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
        $data['dataGuru'] = Guru::all();
        $find = Guru::where('id',$request->guru_id)->value('id');
        $findAmpu = Ampu::where('guru_id',$find)->pluck('id');
        // dd($findAmpu);
        if(!$find){
            Alert::error('Error','Data not Found!');
            return redirect()->route('jadwal.guru');
        } 

        if ($find == 'all') {
            $data['dataManual'] = $this->manual->get();
            // dd($data);
            return view('frontend.jadwal.guru.index',$data);
        } else {
            // Alert::success('Success','Data Added successfully');
            // $data['Jadwal'] = DB::select('select * from manuals where guru_id = ?', [$find])->get();
            $data['dataManual'] = $this->manual
            ->whereIn('ampu_id', $findAmpu)
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
        $data['dataManual'] = $this->manual->oldest()->get();
        return view('frontend.jadwal.kelas.index',$data);
    }

    public function findKelas(Request $request)
    {
        //
        $find = $request->kelas_id;
        $data['dataKelas'] = Kelas::all();
        // dd($find);
        if(!$find){
            Alert::error('Error','Data not Found!');
            return redirect()->route('jadwal.kelas');
        } 
        
        if ($find == 'all') {
            $data['dataManual'] = $this->manual->get();
            // dd($data);
            return view('frontend.jadwal.kelas.index',$data);
        } else {
            // Alert::success('Success','Data Added successfully');
            // $data['Jadwal'] = DB::select('select * from manuals where guru_id = ?', [$find])->get();
            $data['dataManual'] = $this->manual
            ->where('kelas_id', $find)
            ->orderBy('slot_id', 'asc')
            ->get();
            // dd($data);
            return view('frontend.jadwal.kelas.index',$data);
        }
    }
}
