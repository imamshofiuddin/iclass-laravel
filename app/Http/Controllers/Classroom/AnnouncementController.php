<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function getAnnouncement($classroom_id){
        $announcements = Announcement::where('classroom_id','=', $classroom_id)->get();
        if(session('user_role') == 'student'){
            return view('student.announcement.announcement', compact('announcements'));
        }

        if(session('user_role') == 'teacher'){
            return view('teacher.announcement.announcement', compact('announcements'));
        }
    }

    public function createAnnouncement(){
        return view('teacher.announcement.announcement-add');
    }

    public function storeAnnouncement(Request $request){
        $newAnnouncement = new Announcement();
        $newAnnouncement->classroom_id = session('classroom')->id;
        $newAnnouncement->announcement = $request->input('announcement');
        $newAnnouncement->save();
        return redirect()->route('classroom.announcement', ['classroom_id' => session('classroom')->id]);
    }

    public function destroyAnnouncement($id){
        $announcement = Announcement::where('id','=',$id);
        $announcement->delete();
        return redirect()->back();
    }
}
