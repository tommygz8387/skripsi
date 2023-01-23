<?php

namespace App\Http\Controllers;

use App\Imports\GuruImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ImportController extends Controller
{
    
    public function guruImport(Request $request)
    {
        //
        try {
            // dd($request->hasFile('iguru'));
            Excel::import(new GuruImport, request()->file('iguru'));
            
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('guru.index');
        } catch (\Throwable $th) {
            Alert::error('Error',$th->getMessage());
            return redirect()->route('guru.index');
        }
    }

    public function download()
    {
        //
        $filePath = public_path("Template.xlsx");
    	$headers = ['Content-Type: application/xlxs'];
    	$fileName = 'Template.xlsx';
        return response()->download($filePath, $fileName, $headers);
    }
}
