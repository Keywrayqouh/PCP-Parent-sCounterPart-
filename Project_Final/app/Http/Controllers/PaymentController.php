<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblscholars;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
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
            'batch' => 'required',
            'contact_number'=> 'required|digits:11',
            'email' => 'required','unique',
            
            

        ]);
        $student = new tblscholars([
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'batch' => $request->get('batch'),
            'contact_number' => $request->get('contact_number'),
            'email' => $request->get('email'),
            
           
            
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


        $student = tblscholars::find($id);
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
            'batch' => 'required',
            'contact_number'=> 'required|numeric|min:11|max:12',
            'email' => 'required','unique',
            

        ]); 
        // dd($request->all());
        $student = tblscholars::find($id);
        $student->first_name = $request->get('first_name');
        $student->middle_name= $request->get('middle_name');
        $student->last_name = $request->get('last_name');
        $student->age =$request->get('batch');
        $student->gender = $request->get('contact_number');
    
        $student->email = $request->get('email');
        
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
        $students = tblscholars::all();
        // $humans =Human::where('id',$request->id)->get();
        return view('student.welcome',compact('students'));
    }

    public function searchcontent(Request $request){
        // dd(Human::get());
        // $student = Student::find($id);
        $student =tblscholars::where('last_name','like','%' .$request.'%')->orderBy('id')->paginate(5); 
        return view('student.searchcontent',['student'=>$student]);
        // $humans =Human::where('id',$request->id)->get();
        // return view('student.searchcontent',compact('students'));
    }




    
    public function delete($id){
        DB::table('students')->where('id',$id)->delete();
        return redirect('/welcome');

    }

    public function pay($id){

        $student = tblscholars::find($id);
        return view('student.pay',compact('student'));
    }




    
}
