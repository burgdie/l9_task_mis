<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        return view('management.departments.index');
    }

    /**
     * Create
     */
    public function create(){
        return view('management.departments.create');
    }
    /**
     * Store
     */
    public function store(Request $request){
        Department::create([
            'user_id'        =>  1,
            'director_id'   =>  $request->director_id,
            'name'          =>  $request->name,
           
        ]);

        return redirect()->route('departmentsIndex');
    }
}
