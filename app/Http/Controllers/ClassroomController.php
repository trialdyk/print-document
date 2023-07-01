<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax()){
            $data = Classroom::with('year')
                ->when($request->has('search'), function($query) use ($request) {
                    $query->where('name','LIKE','%'.$request->search.'%');
                })
                ->orderBy('created_at','desc')->paginate(6);
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
        return view('pages.classroom');
    }

    public function data(){
        $data = Classroom::with('year')->orderBy('created_at','desc')->get();
        return response()->json($data);
    }

    public function store(ClassroomRequest $request)
    {
        $data = $request->validated();
        Classroom::create($data);
        return response()->json('Berhasil Menambahkan Kelas !');
    }

    public function update(ClassroomRequest $request,$id)
    {
        $data = $request->validated();
        Classroom::findorfail($id)->update($data);
        return response()->json('Berhasil Memperbarui Data !');
    }

    public function destroy($id)
    {
        Classroom::findorfail($id)->delete();
        return response()->json('Berhasil Menghapus Data !');
    }
}
