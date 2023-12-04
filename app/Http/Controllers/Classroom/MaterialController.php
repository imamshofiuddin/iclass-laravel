<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function getMaterial($classroom_id)
    {
        $materials = Material::where('classroom_id','=',$classroom_id)->get();
        if(session('user_role') == 'student'){
            return view('student.material.material', compact('materials'));
        }

        if(session('user_role') == 'teacher'){
            return view('teacher.material.material', compact('materials'));
        }
    }

    public function create()
    {
        return view('teacher.material.material-add');
    }

    public function store(Request $request)
    {
        $newMaterial = new Material();
        $newMaterial->title = $request->input('title');
        $newMaterial->content = $request->input('content');
        $newMaterial->classroom_id = session('classroom')->id;

        $newMaterial->save();
        return redirect()->route('classroom.material', ['classroom_id' => session('classroom')->id]);
    }

    public function destroyMaterial($id)
    {
        $material = Material::where('id','=',$id);
        $material->delete();
        return redirect()->back();
    }
}
