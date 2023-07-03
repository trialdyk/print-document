<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Rekap;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class RekapController extends Controller
{
    public function index(Request $request){

        if(request()->ajax()){
            $data = Student::with('rekap')->where('classroom_id',$request->classroom)->orderBy('name')->paginate(15);
            $links = $data->links('layouts.paginate');
            return response()->json([
                'data' => $data,
                'links' => $links->render(),
                'pagination' => [
                    'total' => $data->total(),
                    'per_page' => $data->perPage(),
                    'current_page' => $data->currentPage(),
                    'last_page' => $data->lastPage(),
                    'from' => $data->firstItem(),
                    'to' => $data->lastItem()
                ]
            ]);
        }

        $data['years'] = Year::orderBy('created_at','desc')->get();
        $lastYear = $data['years']->first();
        $data['classrooms'] = Classroom::where('year_id',$lastYear->id)->get();
        return view('pages.rekap',$data);
    }


    public function update(Request $request,$id)
    {
        Rekap::where('student_id',$id)->update([
            $request->bulan => $request->tanggal
        ]);

        return response()->json('Berhasil Merubah Status');
    }
}
