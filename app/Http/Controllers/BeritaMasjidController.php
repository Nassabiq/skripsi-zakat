<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaMasjidController extends Controller
{
    public function index()
    {
        return view('news');
    }
    public function admin()
    {
        return view('admin.news');
    }
}
