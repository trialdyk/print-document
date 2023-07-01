<?php

namespace App\Http\Controllers;

use App\Http\Requests\YearRequest;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            $data = Year::orderBy('created_at','desc')
            ->when($request->search, function($query) use ($request) {
                $query->where('name','LIKE','%'.$request->search.'%');
             })
            ->paginate(6);
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
        return view('pages.year');
    }

    public function data(){
        $data = Year::orderBy('created_at','desc')->get();
        return response()->json($data);
    }

    public function store(YearRequest $request)
    {
        $data = $request->validated();
        Year::create($data);
        return response()->json('Berhasil Menambah Tahun Ajaran');
    }

    public function update(YearRequest $request,$id)
    {
        $data = $request->validated();
        Year::findorfail($id)->update($data);
        return response()->json('Berhasil Memperbarui Tahun Ajaran');
    }

    public function destroy($id)
    {
        Year::findorfail($id)->delete();
        return response()->json('Data Berhasil Dihapus!');
    }
}
