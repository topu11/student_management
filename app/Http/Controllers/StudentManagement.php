<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentManagement extends Controller
{
    

     public function index()
    {
    	$students = Student::all();
        return view('index')->with('students',$students);
    }
    public function create()
    {

        return view('create');
    }
    public function store(Request $request)
    {
        // dd('submitted');
        // $this->validate($request, [
        //     'student_id'          =>  'required|Numeric|max:10',
        //     'student_name'        =>  'required|string|max:15',
        //     'department'          =>  'required|string',
        //     'cell_phone'          =>  'required|Numeric|max:15',
        //     'mail_address'        =>'required|E-mail',
        //     'student_info'        => 'nullable',
        // ]);


        $request->validate([
                 'student_id'          =>  'required|Numeric|min:6',
                 'student_name'        =>  'required|string',
                 'department'          =>  'required|string',
                 'cell_phone'          =>  'required|Numeric|min:11',
                 'mail_address'        =>'required|E-mail',
                 'student_info'        => 'nullable',
        ]);
        $student=new Student;
        $student->student_id=$request->student_id;
        $student->student_name=$request->student_name;
        $student->department=$request->department;
        $student->cell_phone=$request->cell_phone;
        $student->mail_address=$request->mail_address;
        $student->student_info=$request->student_info;
        $student->save();
        return redirect()->route('index');
    }
    public function edit($id)
    {
        // $student = Student::find($id);
         $student = Student::where('student_id',$id)->first();
       return view('ex')->with('student',$student);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'student_name'        =>  'required|string',
            'department'          =>  'required|string',
            'cell_phone'          =>  'required|Numeric|min:11',
            'mail_address'        =>'required|E-mail',
            'student_info'        => 'nullable',
   ]);
        $student = Student::where('student_id',$id)->first();
        $student->student_name=$request->student_name;
        $student->department=$request->department;
        $student->cell_phone=$request->cell_phone;
        $student->mail_address=$request->mail_address;
        $student->student_info=$request->student_info;
        $student->save();
        return redirect()->route('index');

    }
    public function delete($id)
    {
        // $student = Student::where('student_id',$id)->first();
        $deletedRows = Student::where('student_id', $id)->delete();
        return redirect()->route('index');

    }
    public function logout()
    {
        return view('auth\login');

    }
}
