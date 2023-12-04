<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\ClassParticipant;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function getTeacherClassroom()
    {
        $classrooms = Classroom::where('teacher','=',session('user_id'))->get();
        return view('teacher.home', compact('classrooms'));
    }

    public function getStudentClassroom()
    {
        $classrooms = ClassParticipant::where('student','=', session('user_id'))->get();
        return view('student.home', compact('classrooms'));
    }

    public function joinClassroom()
    {
        return view('student.classroom.classroom-join');
    }

    public function joinClassroomProcess(Request $request)
    {
        $classroom = Classroom::where('code','=',$request->input('code'))->first();
        if($classroom){
            $new_class_participant = new ClassParticipant();
            $new_class_participant->student = session('user_id');
            $new_class_participant->classroom_id = $classroom->id;
            $new_class_participant->save();
            return redirect()->route('student.home');
        } else {
            return redirect()->back();
        }
    }

    public function getDetailClassroom($code)
    {
        $classroom = Classroom::where('code','=',$code)->first();
        session(['classroom' => $classroom]);
        if(session('user_role') == 'student'){
            return view('student.classroom.classroom');
        }
        if(session('user_role')  == 'teacher'){
            return view('teacher.classroom.classroom');
        }
    }

    public function create()
    {
        return view('teacher.classroom.classroom-add');
    }

    public function store(Request $request)
    {
        $newClassroom = new Classroom();
        $newClassroom->code = $this->generateClassroomCode();
        $newClassroom->teacher = session('user_id');
        $newClassroom->name = $request->input('name');
        $newClassroom->save();
        return redirect()->route('teacher.home');
    }

    public function destroyClassroom($id)
    {
        $classroom = Classroom::where('id','=',$id);
        $classroom->delete();
        return redirect()->back();
    }

    private function generateClassroomCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
