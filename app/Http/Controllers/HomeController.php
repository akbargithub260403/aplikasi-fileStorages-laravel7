<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Post;

use Illuminate\Http\Request;

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
    public function index()
    {
        // MENGHITUNG JUMLAH ADMIN
        // $count = Admin::where('id','<=',$id->id)->get();
        
        $count = Admin::where('role','=','admin')->get();
        $jumlahAdmin = count($count);
        
        $count1 = Admin::where('role','=','super_admin')->get();
        $jumlahSuperAdmin = count($count1);
        
        $count2 = Admin::where('role','=','students')->get();
        $jumlahSiswa = count($count2);
        
        $count3     = Post::all();
        $jumlahPost = count($count3);

        $super_admin = Admin::where('role','=','super_admin')->get();
        $admin = Admin::where('role','=','admin')->get();
        $students = Admin::where('role','=','students')->get();

        return view('home',['jumlahAdmin' => $jumlahAdmin , 'jumlahSuperAdmin' => $jumlahSuperAdmin , 'jumlahSiswa' => $jumlahSiswa , 'jumlahPost' => $jumlahPost , 'super_admin' => $super_admin , 'admin' => $admin , 'students' => $students]);
    }
}
