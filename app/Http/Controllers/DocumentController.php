<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use WordTemplate;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\PhpWord;
use PDF;
use Dompdf\Dompdf;

class DocumentController extends Controller
{
    public function index(Request $request){
        if(request()->ajax()){
            $data = Classroom::withCount('student')
            ->when($request->has('search'), function($query) use ($request) {
                $query->where('name','LIKE','%'.$request->search.'%');
            })
            ->when($request->year,function($query) use ($request){
                $query->where('year_id',$request->year);
            })
            ->paginate(10);
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
        $data['lastYear'] = $data['years']->first();
        return view('pages.print',$data);
    }

    public function back($id){
        $classroom = Classroom::findorfail($id);
        $students = Student::where('classroom_id',$id)->orderBy('name')->get();
        if(count($students) == 0){
            toastr()->error('Tidak Ada Siswa Dikelas '.$classroom->name.' !');
            return redirect()->back();
        }else if(count($students) > 40){
            toastr()->error('Tidak Bisa Mencetak Lebih Dari 40 Siswa !');
            return redirect()->back();
        }
        $template_title = public_path('Template/template-belakang-'.count($students).'.docx');

        $template = new TemplateProcessor($template_title);

        foreach($students as $i => $student){
            $var_nama = 'nama_'.($i+1);
            $var_kelas = 'kelas_'.($i+1);
            $var_nis = 'nis_'.($i+1);
            $template->setValue($var_nama,$student->name);
            $template->setValue($var_kelas,$classroom->name);
            $template->setValue($var_nis,$student->nis);
        }

        $filename = $classroom->name.'_belakang.docx';
        
        $template->saveAs($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function front($id){
        $classroom = Classroom::findorfail($id);
        $students = Student::where('classroom_id',$id)->orderBy('name')->get();
        if(count($students) < 1){
            toastr()->error('Tidak Ada Siswa Dikelas '.$classroom->name.' !');
            return redirect()->back();
        }else if(count($students) > 40){
            toastr()->error('Tidak Bisa Mencetak Lebih Dari 40 Siswa !');
            return redirect()->back();
        }
        $template_title = public_path('Template/template-depan-'.count($students).'.docx');

        $template = new TemplateProcessor($template_title);

        foreach($students as $i => $student){
            $var_nama = 'nama_'.($i+1);
            $var_kelas = 'kelas_'.($i+1);
            $var_thn = 'thn_'.($i+1);
            $var_ajaran = 'ajaran_'.($i+1);
            $template->setValue($var_nama,$student->name);
            $template->setValue($var_kelas,$classroom->name);
            $template->setValue($var_ajaran,$classroom->year->year);
            $template->setValue($var_thn,substr($classroom->year->year,0,4));
        }

        $filename = $classroom->name.'_depan.docx';
        
        $template->saveAs($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}


