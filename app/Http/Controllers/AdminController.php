<?php

namespace App\Http\Controllers;

use App\Admin;
use File;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        return view('super_admin/addStudents');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'jabatan'       => 'required',
            'avatar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('avatar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img';

        $file->move($tujuan_upload,$nama_file);

        Admin::create([
            'role'              => $request->role,
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'jabatan'           => $request->jabatan,
            'avatar'            => $nama_file,
            'remember_token'    => Str::random(60)
        ]);

        return redirect('/daftar_admin')->with('status','Admin berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $data = DB::table('users')
            ->where('id','=',$admin->id)
            ->get();

        $post = DB::table('postingan')
            ->where('id_admin','=',$admin->id)
            ->get();

        return view('super_admin/profileAdmin',['admin' => $admin ,'data' => $data , 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('super_admin/update',['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
       $this->validate($request, [
            'avatar'    => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        $gambar = Admin::where('id',$admin->id)->first();        
        
        File::delete('img/'.$gambar->avatar);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('avatar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img';

        $file->move($tujuan_upload,$nama_file);

        Admin::where('id', $admin->id)
        ->update([
            'role'    => $request->role,
            'name'      => $request->name,
            'email'     => $request->email,
            'jabatan'   => $request->jabatan,
            'avatar'    => $nama_file
            ]);

         return redirect('/daftar_admin')->with('status', 'Data Admin Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $gambar = Admin::where('id',$admin->id)->first();

        File::delete('img/'.$gambar->avatar);

        Admin::destroy($admin->id);

        return redirect('/daftar_admin')->with('status', 'Data Admin Berhasil dihapus!');
    }

    // FUNCTION UNTUK MENAMPILKAN HALAMAN LIST ADMIN
    public function daftar_admin()
    {
        $admin = Admin::all();
        return view('super_admin/list_admin',['admin' => $admin]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        
        $admin = DB::table('users')
                    ->where('name','LIKE',"%".$keyword."%")
                    ->get();
        
        return view('super_admin/list_admin',['admin' => $admin]);
    }

    public function count()
    {
        $id = '1';

        $query = Admin::where('id','<=',$id)->get();

        return view('/home',['query' => $query]);
    }

    public function export($admin)
    {
        if ($admin == "admin") {

            $judul = "Admin";
            $data = Admin::where('role','=',$admin)->get();
            return view('export/export',['data' => $data , 'judul' => $judul]);

        }elseif ($admin == "super_admin") {
            
            $judul = "Super Admin";
            $data = Admin::where('role','=',$admin)->get();
            return view('export/export',['data' => $data , 'judul' => $judul]);

        }elseif ($admin == "students") {
            
            $judul = "Students";
            $data = Admin::where('role','=',$admin)->get();
            return view('export/export',['data' => $data , 'judul' => $judul]);

        }


    }

    public function addStudents(Request $request)
    {
        $this->validate($request, [
            'prodi'         => 'required',
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'avatar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('avatar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img';

        $file->move($tujuan_upload,$nama_file);

        Admin::create([
            'role'              => 'students',
            'name'              => $request->name,
            'email'             => $request->email,
            'prodi'             => $request->prodi,
            'password'          => bcrypt($request->password),
            'jabatan'           => 'students',
            'avatar'            => $nama_file,
            'remember_token'    => Str::random(60)
        ]);

        return redirect('/daftar_admin')->with('status','Admin berhasil ditambahkan');
    }

}
