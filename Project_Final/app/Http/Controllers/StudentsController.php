<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required','unique',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',

        ]);
        $student = new Student([
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            
        ]);
        $student->save();
        // return redirect()->route('welcome');
        return redirect('/welcome');

        // return redirect()->routes('student.create')->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $student = Payment::find($id);
        if(!$student){
            return abort(404);
        }
        // DB::table('students')->where('id',$id)->update();
        return view('student.edit',compact('student'));
        // return view('student.edit');

            
            
    
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required','unique',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',

        ]); 
        // dd($request->all());
        $student = Student::find($id);
        $student->first_name = $request->get('first_name');
        $student->middle_name= $request->get('middle_name');
        $student->last_name = $request->get('last_name');
        $student->email = $request->get('email');
        $student->age =$request->get('age');
        $student->gender = $request->get('gender');
        $student->address = $request->get('address');
        $student->save();
        return redirect('/welcome')->with('success','Student Updated');
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function welcome(Request $request){
        // dd(Human::get());
        $students = Student::all();
        // $humans =Human::where('id',$request->id)->get();
        return view('student.welcome',compact('students'));
    }

    public function searchcontent(Request $request){
        // dd(Human::get());
        // $student = Student::find($id);
        $student =Student::where('last_name','like','%' .$request.'%')->orderBy('id')->paginate(5); 
        return view('student.searchcontent',['student'=>$student]);
        // $humans =Human::where('id',$request->id)->get();
        // return view('student.searchcontent',compact('students'));
    }




    
    public function delete($id){
        DB::table('students')->where('id',$id)->delete();
        return redirect('/welcome');

    }
}
