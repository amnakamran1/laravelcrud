<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{    
    public function index(){
        $students =Student::All();
        return view('index', compact('students'));
    }


    public function store(Request $request)
{
    
        
$imageName=time().' .'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $student = new Student;
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->city = $request['city'];
        $student->image = $imageName;

       // $customer->date_of_birth = ['date_of_birth']; // Change date format
        $student->gender = $request['gender'];
        $student->password = md5($request['password']);
        $student->points = $request['points'];
        $student->status = $request['status'];
        $student->save();

        return redirect('student-view')->with('status', 'Data saved successfully!');;
    }
    public function view()  {
        $students = Student::all();
        
        $data = compact('students');
        return view('student-view')->with($data);
    }
    // public function delete($id) {
    //     Student::find($id)->delete();
    //     return redirect()->back();
    // }

    public function edit($id) {
        $student= Student::find($id);
        
            
            return view('edit',compact('student'));
        }
    
    public function update($id, Request $request)
    {
        
        $student= Student::find($id);
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->city = $request['city'];
      
        $student->gender = $request['gender'];
        // $student->points = $request['points'];
        // $student->status = $request['status'];
        $student->save();
        return redirect('student-view')->with('success', 'Student updated successfully.');
    }
      
    
    public function delete($id) {
        $student = Student::find($id);
        
        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }
    
    }
