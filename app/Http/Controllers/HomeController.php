<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use DB;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	 
	 /*
	 
		
	 $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get(); 
			$students = DB::select('select * from students
		 inner join programs on(students.program_id=programs.program_id)
		  inner join departments on(departments.department_id=programs.department_id)
		   inner join colleges on(departments.college_id=colleges.college_id)
		  where  id= ?'  ,[7]
		);
	 
	 */
    public function index()
    {

		 $id=auth()->user()->AdmissionNo;
 
		$students = DB::table('students')		
		->join('programs', 'programs.program_id', '=', 'students.program_id')
		->join('departments', 'departments.department_id', '=', 'programs.department_id')
		->join('colleges', 'colleges.college_id', '=', 'departments.college_id')
		->where('AdmissionNo', '=', $id)->get();
		
		$menus = DB::table('grades')->where('AdmissionNo', '=', $id)->get();
		
		//dd($students);
		  /*
		  
		    $students = DB::table('students')

        ->join('programs', 'programs.program_id', '=', 'students.program_id')

        ->select('students.*', 'programs.Program_Code')
		->where('AdmissionNo', '=', $student_id)

        ->get(); 
*/
		
 
//echo $students->AdmissionNo;
       // foreach($students as $student){
			//  dd( $student->AdmissionNo);
		// }        ->where('grade_id', '=', '$id')
		 // $semes= DB::select("select * from grades where AdmissionNo='$id'");
		 
		
		  return view('students.student')->with(compact(['students',$students],['menus',$menus]));
        //return view('students.student');
    }
	
	public function getview($id){
		  $sid=auth()->user()->AdmissionNo; 
		  //$semes = DB::table('grades')->where('grade_id', '=', $id)->get();
  $semes = DB::select("select * from grades
		 	where AdmissionNo='$sid' 
		 	and grade_id='$id' 
		 	");
		  foreach($semes as  $row) {
		    $session=$row->Sessions;
		     $semester=$row->Semester;
		  }
		   
		 
		 $results = DB::select("select * from results
		 	where AdmissionNo='$sid' 
		 	and Semester='$semester'
		 	and Sessions='$session'
		 	");
			
			 
			$menus = DB::table('grades')->where('AdmissionNo', '=', $sid)->get();
		 return view('students.results')->with(compact(['results',$results],['menus',$menus],['semes',$semes]));

    
	}
	
	public function imgup(Request $request)
	{
		//print_r($req->file());
		 //$req->file('upload_pic')->store('upload');
		 
		 $path = $request->file('picup')->store('./public/images');
//return $contents = Storage::get($path);
          return $path;
	}
}
