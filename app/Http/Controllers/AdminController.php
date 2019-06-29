<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Blog;
use App\Notes;
use App\NotesTitle;
use App\Admin;
use App\Test;
use App\Test_ques;
use App\Feed;

class AdminController extends Controller
{
    //login and all
    public function logn(Request $requ)
    {
        $validate = Validator::make($requ->all(),[
            'user'=>'required|string|max:199',
            'pass'=>'required|string|max:199'
        ],
        [
            'user'=>'Enter valid user',
            'pass'=>'Enter Correct Pass'
        ]);
        if($validate->fails())
            return redirect()->back()->with('errors',$validate->errors());
        else
        {
            $admin=Admin::where('name',$requ->user)->first();
            if(is_null($admin))
                return redirect()->back()->with('inva','Invalid user or passwors');
            if($admin->pass == $requ->pass){
                $requ->session()->put('admin',$admin->name);
                return redirect('admin');
            }
            else
                return redirect()->back()->with('inva','Invalid user or passwors');    
        }
    }
    public function login(Request $requ)
    {
        return view('admin.login');
    }
    public function logo(Request $requ)
    {
        $requ->session()->forget('admin');
        return redirect('admin/login');
    }


    //index and all
    public function index(Request $requ)
    {
        if($requ->session()->has('admin')){
            $blo=new Blog;
            $not=new Notes;
            $tes=new Test;
            $admin=session()->get('admin');
            return view('admin.index')->with('total_blog_publish',$blo->where('publish_by',$admin)->get()->count())->with('total_notes',$not->get()->count())->with('total_test',$tes->get()->count())->with('total_blog',$blo->get()->count());
    }
    else
        return redirect('admin/login');
    }

    //Blog ka kam hai ye 
    public function blog(Request $requ)
    {
        if($requ->session()->has('admin')){
            $admin =session()->get('admin');
            $blo=new Blog;
    	   return view('admin.blog')->with('blogs',$blo->where('publish_by',$admin)->get());
    }
    else
        return redirect('admin/login');
    }

    public function blog_add(Request $requ)
    {
        if($requ->session()->has('admin')){
            return view('admin.blog_add');
        }
        else{
            return redirect('admin/login');
        }
    }



    public function blog_ed(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            return view('admin.blog_edit')->with('blog',Blog::find($id));
        }
        else{
            return redirect('admin/loin');
        }
    }
    public function blog_del(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $blo=Blog::find($id);
            $blo->delete();
            return redirect()->back();
        }
        else{
            return redirect('admin/loin');
        }
    }
    public function blog_view(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $blo = Blog::find($id);
            $per = session()->get('admin');
            return view('admin.blog_view')->with('blog',$blo)->with('per',$per);
        }
        else{
            return redirect('admin/loin');
        }
    }


    public function blog_update(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
           $validate = Validator::make($requ->all(),[
                'title'=>'required|string|max:199',
                'content'=>'required|string|max:4000'
            ],
            [
                'title'=>'Enter the title',
                'content'=>'Enter the content'
            ]);
            if($validate->fails())
            {
                 return redirect()->back()->with('errors',$validate->errors());
            }
            else
            {

                if($requ->hasFile('blog_img'))
                {
                    // Get filename with the extension
                    $filenameWithExt = $requ->file('blog_img')->getClientOriginalName();
                    // Get just filename 
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $requ->file('blog_img')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $requ->file('blog_img')->storeAs('public/blog_images', $fileNameToStore);                    
                    $blo=Blog::find($id);
                    $blo->im_path=$fileNameToStore;
                }
                    $ti=$requ->title;
                    $co=$requ->content;
                    $blo=Blog::find($id);
                    $blo->title=$ti;
                    $blo->content=$co;
                    $blo->publish_by=session()->get('admin');
                    $blo->save();
                    return redirect('admin/blog');
            }
        }
        else{
            return redirect('admin/login');
        }
    }



    public function blog_submit(Request $requ)
    {
        if($requ->session()->has('admin'))
        {

                $validate = Validator::make($requ->all(),[
                'title'=>'required|string|max:199',
                'content'=>'required|string|max:4000'
            ],
            [
                'title'=>'Enter the title',
                'content'=>'Enter the content'
            ]);
            if($validate->fails())
            {
                 return redirect()->back()->with('errors',$validate->errors());
            }
            else
            {

                if($requ->hasFile('blog_img'))
                {
                    // Get filename with the extension
                   
                    $filenameWithExt = $requ->file('blog_img')->getClientOriginalName();
                    // Get just filename 
                    $mime_type = $requ->file('blog_img')->getMimeType();
                    $ft= explode('/', $mime_type);
                    if($ft[0]!='image'){
                        return  redirect()->back()->with('blog_img','blog_img');
                    }
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $requ->file('blog_img')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    
                }
                else
                {

                    $fileNameToStore= 'noimg'.'_'.time().'.jpg';
                }
                    $path = $requ->file('blog_img')->storeAs('public/blog_images', $fileNameToStore);
                    $ti=$requ->title;
                    $co=$requ->content;
                    $blo=new Blog;
                    $blo->title=$ti;
                    $blo->content=$co;
                    $blo->publish_by=session()->get('admin');
                    $blo->im_path=$fileNameToStore;
                    $blo->save();
                    return redirect('admin/blog');
            }
        }
        else
        {
            return redirect('admin/login');
        }
    }



    //Notes ka kam hai ye
    public function notes(Request $requ)
    {
        if($requ->session()->has('admin')){
            $note=NotesTitle::get()->all();
    	   return view('admin.notes')->with('notes_title',$note);
        }
        else{
            return redirect('admin/login');
        }
    }
    public function notes_title_add(Request $requ)
    {
        if($requ->session()->has('admin')){
           return view('admin.notes_title_add');
        }
        else{
            return redirect('admin/login');
        }
    }
    public function notes_add_title(Request $requ)
    {
        if($requ->session()->has('admin'))
        {
           $nt=new NotesTitle;
           $validate = Validator::make($requ->all(),[
                'title'=>'required|string|max:199'
            ],
            [
                'title'=>'Enter the title'
            ]);
            if($validate->fails())
            {
                 return redirect()->back()->with('errors',$validate->errors());
            }
            else{
                $nt->name=$requ->title;
                $nt->save();
                return redirect('admin/notes');
            }
        }
        else{
            return redirect('admin/login');
        }
    }
    public function notes_add(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
           return view('admin.notes_add')->with('id',$id);
        }
        else{
            return redirect('admin/login');
        }
    }
    public function notes_view(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $no = new Notes;

           return view('admin.notes_view')->with('notes',$no->where('title_id',$requ->id)->get());
        }
        else{
            return redirect('admin/login');
        }
    }
    public function notes_submit(Request $requ)
    {
        $no=new Notes;
        if($requ->session()->has('admin')){
           $validate = Validator::make($requ->all(),[
                'topic'=>'required|string|max:199',
                'content'=>'required|string|max:4000'
            ],
            [
                'topic'=>'Enter the text',
                'content'=>'Enter the content'
            ]);
           if($validate->fails())
            {
                 return redirect()->back()->with('errors',$validate->errors());
            }
            else 
            {
                if($requ->hasFile('note_video'))
                {
                    // Get filename with the extension
                   
                    $filenameWithExt = $requ->file('note_video')->getClientOriginalName();
                    // Get just filename 
                    $mime_type = $requ->file('note_video')->getMimeType();
                    $ft= explode('/', $mime_type);
                    if($ft[0]!='video'){
                        return  redirect()->back()->with('note_video','note_video');
                    }
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $requ->file('note_video')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload video
                    $path = $requ->file('note_video')->storeAs('public/note_video', $fileNameToStore);
                    $no->vid=$fileNameToStore;
                }
                if($requ->hasFile('note_doc'))
                {
                    // Get filename with the extension
                   
                    $filenameWithExt = $requ->file('note_doc')->getClientOriginalName();
                    // Get just filename 
                    $mime_type = $requ->file('note_doc')->getMimeType();
                    $ft= explode('/', $mime_type);
                    if($ft[0]!='application'){
                        return  redirect()->back()->with('note_doc','note_doc');
                    }
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $requ->file('note_doc')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $requ->file('note_doc')->storeAs('public/note_doc', $fileNameToStore);
                    $no->doc=$fileNameToStore;   
                }
                    $no->title_id=$requ->title;
                    $no->topic=$requ->topic;
                    $no->content=$requ->content;
                    $no->save();
                    return redirect('admin/notes');
            }
        }
        else{
            return redirect('admin/login');
        }
    }
    public function note_delete(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $no = Notes::find($id);
            $no->delete();
             return redirect()->back();
        }
        else{
            return redirect('admin/login');
        }
    }
    public function note_edit(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $no = Notes::find($id);
            return view('admin.note_edit')->with('note',$no);
        }
        else{
            return redirect('admin/login');
        }
    }
    public function note_update(Request $requ,$id)
    {
        $no= Notes::find($id);
        if($requ->session()->has('admin')){
           $validate = Validator::make($requ->all(),[
                'topic'=>'required|string|max:199',
                'content'=>'required|string|max:4000'
            ],
            [
                'topic'=>'Enter the text',
                'content'=>'Enter the content'
            ]);
           if($validate->fails())
            {
                 return redirect()->back()->with('errors',$validate->errors());
            }

            else 
            {
                if($requ->hasFile('note_video'))
                {
                    
                    // Get filename with the extension
                   
                    $filenameWithExt = $requ->file('note_video')->getClientOriginalName();
                    // Get just filename 
                    $mime_type = $requ->file('note_video')->getMimeType();
                    $ft= explode('/', $mime_type);
                    if($ft[0]!='video'){
                        return  redirect()->back()->with('note_video','note_video');
                    }
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $requ->file('note_video')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload video
                    $path = $requ->file('note_video')->storeAs('public/note_video', $fileNameToStore);
                    $no->vid=$fileNameToStore;
                }
                if($requ->hasFile('note_doc'))
                {
                    // Get filename with the extension
                   
                    $filenameWithExt = $requ->file('note_doc')->getClientOriginalName();
                    // Get just filename 
                    $mime_type = $requ->file('note_doc')->getMimeType();
                    $ft= explode('/', $mime_type);
                    if($ft[0]!='application'){
                        return  redirect()->back()->with('note_doc','note_doc');
                    }
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $requ->file('note_doc')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $requ->file('note_doc')->storeAs('public/note_doc', $fileNameToStore);
                    $no->doc=$fileNameToStore;   
                }
                    $no->topic=$requ->topic;
                    $no->content=$requ->content;
                    $no->save();
                    return redirect('admin/notes');
            }
        }
        else{
            return redirect('admin/login');
        }
    }
    public function note_view(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $no = Notes::find($id);
           return view('admin.note_view')->with('note',$no);
        }
        else{
            return redirect('admin/login');
        }
    }



    //Test Ka kam hai ye 
    public function test(Request $requ)
    {
        if($requ->session()->has('admin')){
             $test=Test::get()->all();
            return view('admin.test')->with('test_title',$test);
        }
        else{
            return redirect('admin/login');
        }
    }
    public function test_add_title(Request $requ)
    {
        if($requ->session()->has('admin')){
            return view('admin.test_add_title');
        }
        else{
            return redirect('admin/login');
        }
    }
    public function test_title_added(Request $requ)
    {
        if($requ->session()->has('admin'))
        {
           $tt=new Test;
           $validate = Validator::make($requ->all(),[
                'title'=>'required|string|max:199'
            ],
            [
                'title'=>'Enter the title'
            ]);
            if($validate->fails())
            {
                 return redirect()->back()->with('errors',$validate->errors());
            }
            else{
                $tt->name=$requ->title;
                $tt->save();
                return redirect('admin/test');
            }
        }
        else{
            return redirect('admin/login');
        }
    }
    public function ques_view(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $tq= new Test_ques;
            return view('admin.ques_view')->with('quests',$tq->where('test_title',$id)->get());
        }
        else{
            return redirect('admin/login');
        }
    }
    public function ques_add(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $tt= new Test;

            return view('admin.ques_add')->with('id',$id);
        }
        else{
            return redirect('admin/login');
        }
    }
    public function ques_submit(Request $requ)
    {
        if($requ->session()->has('admin')){
            $tt = new Test;
            $validate = Validator::make($requ->all(),[
                'ques'=>'required|string|max:199',
                'op1' =>'required|string|max:199',
                'op2' =>'required|string|max:199',
                'op3' =>'required|string|max:199',
                'op4' =>'required|string|max:199',
                'co_op' =>'required|string|max:199'
            ],
            [
                'ques'=>'Enter',
                'op1' =>'Enter',
                'op2' =>'Enter',
                'op3' =>'Enter',
                'op4' =>'Enter',
                'co_op' =>'Enter'
            ]);
            if($validate->fails())
            {
                 return redirect()->back()->with('errors',$validate->errors());
            }
            $tq=new Test_ques;
            $tq->test_title=$requ->title;
            $tq->ques=$requ->ques;
            $tq->op1=$requ->op1;
            $tq->op2=$requ->op2;
            $tq->op3=$requ->op3;
            $tq->op4=$requ->op4;
            $tq->co_op=$requ->co_op;
            $tq->save();
            return redirect('admin/test');
        }
        else{
            return redirect('admin/login');
        }
    }
    public function ques_del(Request $requ,$id)
    {
        if($requ->session()->has('admin')){
            $tt= Test_ques::find($id);
            $tt->delete();
            return redirect()->back();
        }
        else{
            return redirect('admin/login');
        }
    }
    public function feed(Request $requ)
    {
        if($requ->session()->has('admin')){
        $fe=Feed::orderBy('id', 'DESC')->get();
        return view('admin.feed')->with('feeds',$fe);

    }
    else
        return redirect('admin/login');
    }
}