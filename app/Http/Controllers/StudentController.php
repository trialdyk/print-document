<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Classroom;
use App\Models\Rekap;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            $data = Student::with('classroom')
                    ->when($request->has('search'), function($query) use ($request) {
                        $query->where('name','LIKE','%'.$request->search.'%');
                    })
                    ->when($request->classroom,function($query) use ($request){
                        $query->where('classroom_id',$request->classroom);
                    })
                    ->orderBy('created_at','desc')->paginate(15);
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
        return view('pages.student',$data);
    }

    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        $student = Student::create($data);
        Rekap::create([
            'student_id' => $student->id
        ]);
        return response()->json('Berhasil Menambah Siswa');
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name' => 'required',
            'classroom_id' => 'required',
            'nis' => ['required', Rule::unique('students')->ignore($id)],
        ]);
        Student::findorfail($id)->update($data);
        return response()->json('Berhasil Memperbarui Data');
    }

    public function destroy($id)
    {
        Student::findorfail($id)->delete();
        return response()->json('Data Berhasil Dihapus !');
    }
}
