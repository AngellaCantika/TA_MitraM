<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class UserPageController extends Controller
{
    public function index() {

        $mobil = Mobil::all();
        return view('user.index', compact('mobil'));
    }


}
