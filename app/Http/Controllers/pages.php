<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Blog;
use App\Notes;
use App\NotesTitle;
use App\Admin;
use App\Test;
use App\Test_ques;
use App\Feed;

class pages extends Controller
{
    //
    public function index(Request $requ)
    {
    	$not=NotesTitle::take(5)->orderBy('id','desc')->get();
    	$blog=Blog::take(5)->orderBy('id','desc')->get();
    	$test=Test::take(5)->orderBy('id','desc')->get();
        return view('index')->with('notes',$not)->with('blogs',$blog)->with('tests',$test);
    }
    public function feed(Request $requ)
    {
        $validate = Validator::make($requ->all(),[
            'email'=>'required|email|max:199',
            'content'=>'required|string|max:199'
        ],
        [
            'email'=>'Enter valid user',
            'content'=>'Enter Correct Pass'
        ]);
        if($validate->fails())
            return redirect()->back()->with('errors',$validate->errors());
        $fe=new Feed;
        $fe->email=$requ->email;
        $fe->conten=$requ->content;
        $fe->save();
        return 'Done';
        return redirect("http://localhost:5000/");
    }
    public function test_view(Request $requ,$id)
    {
        $tt=Test::find($id);
    	$tq=Test_ques::where('test_title',$id)->paginate(1);
    	return view('tview')->with('test_title',$tt)->with('ques',$tq);
    }
    public function blog_view(Request $requ,$id)
    {
        $blo=Blog::find($id);
        return view('bview')->with('blog',$blo);
    }
    public function notes_view(Request $requ,$id)
    {
        $not= Notes::where('title_id',$id)->get();;
        return view('nview')->with('notes',$not);
    }
    public function note_view(Request $requ,$id)
    {
        $not= Notes::find($id);
        return view('noview')->with('note',$not);
    }
    public function notes(Request $requ)
    {
        $not = new NotesTitle;
        return view('notes')->with('notestitle',$not->get());
    }
    public function blog(Request $requ)
    {
        $blog= new Blog;
        return view('blogs')->with('blogs',$blog->get());
    }
    public function prac(Request $requ)
    {
        $prac= new Test;
        return view('prac')->with('prac',$prac->get());
    }
}
