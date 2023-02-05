<?php

use App\Models\Manual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getManual',function () {
    $query = Manual::with(['ampu.guru','ampu.mapel','kelas','ruang','slot.hari','slot.waktu']);
    if (request()->ajax()) {
        return datatables($query)
        ->addColumn('aksi',function ($query){
            $btn = "<a class='nav-link' href='#' role='button' data-toggle='dropdown'
                        id='Dropdown".$query->id."'>
                        <i class='icon-ellipsis text-black'></i>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right navbar-dropdown'
                        aria-labelledby='Dropdown".$query->id."'>
                        <button class='ubah dropdown-item'
                            id='".$query->id."'>
                            <i class='ti-pencil text-black'></i>
                            Edit
                        </button>
                        <button class='hapus dropdown-item'
                            id='".$query->id."'>
                            <i class='ti-eraser text-black'></i>
                            Delete
                        </button>
                    </div>";
                return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
})->name('api.manual.index');


