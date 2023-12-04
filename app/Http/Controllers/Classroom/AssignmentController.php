<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\SubmittedAssignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function getAssignment($classroom_id)
    {
        $assignments = Assignment::where('classroom_id','=',$classroom_id)->get();
        if(session('user_role') == 'student'){
            return view('student.assignment.assignment', compact('assignments'));
        }

        if(session('user_role') == 'teacher'){
            return view('teacher.assignment.assignment', compact('assignments'));
        }
    }

    public function createAssignment()
    {
        return view('teacher.assignment.assignment-add');
    }

    public function storeAssignment(Request $request)
    {
        $newAssignment = new Assignment();
        $newAssignment->classroom_id = session('classroom')->id;
        $newAssignment->title = $request->input('title');
        $newAssignment->description = $request->input('description');
        $newAssignment->attachment = $this->addAttachment($request);
        $newAssignment->save();
        return redirect()->route('classroom.assignment', ['classroom_id' => session('classroom')->id]);
    }

    public function getAssignmentDetail($id)
    {
        $assignment = Assignment::where('id','=', $id)->first();
        switch(session('user_role')){
            case 'student':
                $studentSubmittedAssignment = $this->checkStudentSubmittedAssignment($id);
                return view('student.assignment.assignment-detail', compact('assignment','studentSubmittedAssignment','id'));
                break;
            case 'teacher':
                $studentAssignments = $this->getStudentSubmittedAssignment($id);
                return view('teacher.assignment.assignment-detail', compact('assignment','studentAssignments'));
                break;
            default :
                break;
        }
    }

    private function addAttachment(Request $request)
    {
        if($request->file('attachment') != null){
            $request->file('attachment')->move('upload/attachment/',$request->file('attachment')->getClientOriginalName());
            return $request->file('attachment')->getClientOriginalName();
        } else {
            return '-';
        }
    }

    public function submitAssignment(Request $request){
        $submittedAssignment = new SubmittedAssignment();
        $submittedAssignment->assignment_id = $request->input('assignment_id');
        $submittedAssignment->notes = $request->input('notes');
        $submittedAssignment->attachment = $this->addAttachment($request);
        $submittedAssignment->student = session('user_id');
        $submittedAssignment->save();
        return redirect()->route('classroom.assignment.detail', ['id' => $request->input('assignment_id')]);
    }

    public function checkStudentSubmittedAssignment($assignment_id){
        $studentAssignment = SubmittedAssignment::where('student','=',session('user_id'))->where('assignment_id','=',$assignment_id)->count();
        if($studentAssignment < 1){
            return false;
        }
        return true;
    }

    public function getStudentSubmittedAssignment($assignment_id){
        return SubmittedAssignment::where('assignment_id','=',$assignment_id)->get();
    }

    public function destroyAssignment($id)
    {
        $assignment = Assignment::where('id','=',$id);
        $assignment->delete();
        return redirect()->back();
    }
}
