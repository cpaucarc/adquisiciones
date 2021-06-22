<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $offices = array(
        1 => "profiles.dasa",
        2 => "profiles.und-adq",
        3 => "profiles.dir-gen-adm",
        4 => "profiles.und-proc-sel",
        5 => "profiles.und-serv-aux",
        6 => "profiles.ofc-asc-jrd",
        7 => "profiles.und-alm-cnt",
        8 => "profiles.dir-gst-fnc",
        9 => "profiles.tit-plg",
    );

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $officeID = intval(Auth::user()->office_id);
            return view($this->offices[$officeID]);
        } else {
            return redirect()->to('login');
        }
    }
}
