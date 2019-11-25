<?php

namespace App\Http\Controllers\class1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Note;
use App\Model\Course;
class NoteController extends Controller
{
    public function create()
    {
        return view('class.create');
    }
    public function store(Request $request)
    {
        $user = $request->session()->get('user');
        $u_id = $user['id'];
        $class_id = $request->input('class_id');
        $note_desc = $request->input('note_desc');
        $create_time = time();
        $data = Note::insert([
            'u_id' => $u_id,
            'class_id' => $class_id,
            'note_desc' => $note_desc,
            'create_time' => $create_time
        ]);
        return redirect()->action('class1\NoteController@index');
    }
    public function index()
    {
        $u_id = $_GET['u_id'];

        $data = Note::join('class','note.class_id','=','class.class_id')
            ->where('note.is_del',1)
            ->where('u_id',$u_id)
            ->get();
        return view('class.index',['data'=>$data]);
    }

    public function del(Request $request)
    {
        $note_id = $request->input('id');
        $res = Note::where('note_id',$note_id)->update(['is_del'=>2]);
        if($res){
            return redirect()->action('class1\NoteController@index');
        }
    }
}