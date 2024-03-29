<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

use Session;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::all();
     
        return view('management.departments.index', compact('departments'));
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

        $request->validate([
            'name'          =>['required'],
            'director_id'   =>['required'],
        ]);


        Department::create([
            'user_id'        =>  1,
            'director_id'   =>  $request->director_id,
            'name'          =>  $request->name,
           
        ]);
        Session::flash('success-message', 'Department created successfully' );
        return redirect()->route('departmentsIndex');
    }

    /**
     * Edit
     */
    public function edit( $id) {
        // Get department with Id
        $department = Department::find($id);
        return view('management.departments.edit', compact('department'));

    }

    /**
     * Update
     */
    public function update(Request $request, $id) 
    {
        
        $request->validate([
            'name'          =>['required'],
            'director_id'   =>['required'],
        ]);

        Department::where('id', $id)->update([
            'director_id'   =>  $request->director_id,
            'name'          =>  $request->name,
           
        ]);

        Session::flash('success-message', 'Department updated successfully' );
        return redirect()->route('departmentsIndex');
    }

    /**
     * Delete
     */
    public function delete($id) {
        Department::where('id', $id)->delete();
       
        Session::flash('success-message', 'Department deleted successfully' );
        return redirect()->route('departmentsIndex');

    }
}
