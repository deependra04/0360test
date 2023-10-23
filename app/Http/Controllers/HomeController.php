<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catogery;
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
        return view('home');
    }

    public function store(Request $request)
    {


        
        $inputvalue = $request->input('categories');
        $enteredValure= session('entered_value', []);
        $enteredValure[]=$inputvalue;
        session(['entered_value' => $enteredValure]);
        return view('home', compact('enteredValure'));

    }

    public function saveall()
    {
        $enteredValure = session('entered_value', []);

        foreach ($enteredValure as $categories)
        {
            catogery::create(['categories' => $categories]);
        }




        session(['entered_value' => []]);
        return redirect('home');

    }
}
