<?php

namespace App\Http\Controllers;

use App\Post;
use App\Admin;
use File;

use App\Mail\SendEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

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
        return view('admin/createPost');
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
            'judul'         => 'required',
            'pembuat'       => 'required',
            'keterangan'    => 'required',
            'file'          => 'required',
            'prodi'         => 'required'
        ]);

         // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'files';

        $file->move($tujuan_upload,$nama_file);

        Post::create([
            'id_admin'      => $request->id_admin,
            'judul'         => $request->judul,
            'pembuat'       => $request->pembuat,
            'keterangan'    => $request->keterangan,
            'prodi'         => $request->prodi,
            'file'          => $nama_file
        ]);

        $data = Admin::where('role','=','students')->get();
        
        foreach($data as $dt){

            Mail::to($dt)->send(new SendEmail());

        }


        return back()->with('status','Postingan berhasil di Upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin/updatePost',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        Post::where('id', $post->id)
        ->update([
            'judul'             => $request->judul,
            'pembuat'           => $request->pembuat,
            'keterangan'        => $request->keterangan,
            'prodi'             => $request->prodi
            ]);
            
    return redirect('admin/createPost')->with('status', 'Data Postingan Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $file = Post::where('id',$post->id)->first();

        File::delete('files/'.$file->file);

        Post::destroy($post->id);

        return back()->with('status', 'Postingan Berhasil dihapus!');
    }

    public function students($admin)
    {
        $data = Post::where('prodi','=',$admin)->get();

        return view('students/postingan',['data' => $data]);
    }

    public function showPost($post)
    {
        $data = Post::where('id','=',$post)->get();

        foreach ($data as $dt){
            $post = Admin::where('id','=',$dt->id_admin)->get();
        }

        return view('students/showPost',['data' => $data , 'post' => $post]);
    }
}
