<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // FUNCTION HALAMAN UTAMA
    public function index()
    {
        return view('pages/welcome');
    }

    // FUNCTION HALAMAN FILE
    public function pages()
    {
        return view('pages/pagesFile');
    }

    // FUNCTION UNTUK MENAMPILKAN HALAMAN UPLOAD FILES
    public function upload()
    {
        return view('pages/uploadFiles');
    }

    // FUNCTION UNTUK MENAMPILKAN HALAMAN ADD ADMIN
    public function addAdmin()
    {
        return view('super_admin/addAdmin');
    }

   
}
