<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home(){
        $data = [
            'student' => Student::count(),
            'classroom' => Classroom::count(),
            'year' => Year::count(),
        ];

        return view('pages.dashboard',$data);
    }
}
