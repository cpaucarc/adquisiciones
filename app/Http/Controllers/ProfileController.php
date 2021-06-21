<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $officeID = Auth::user()->office_id;

            switch ($officeID) {

                case 1:
                {
                    return view('profiles.dasa');
                    break;
                }
                case 2:
                {
                    return view('profiles.und-adq');
                    break;
                }
                case 3:
                {
                    return view('profiles.dir-gen-adm');
                    break;
                }
                case 4:
                {
                    return view('profiles.und-proc-sel');
                    break;
                }
                case 5:
                {
                    return view('profiles.und-serv-aux');
                    break;
                }
                case 6:
                {
                    return view('profiles.ofc-asc-jrd');
                    break;
                }
                case 7:
                {
                    return view('profiles.und-alm-cnt');
                    break;
                }
                case 8:
                {
                    return view('profiles.dir-gst-fnc');
                    break;
                }
                case 9:
                {
                    return view('profiles.tit-plg');
                    break;
                }
                default:
                {
                    return redirect()->to('login');
                    break;
                }
            }

        } else {
            return redirect()->to('login');
        }
    }

}
