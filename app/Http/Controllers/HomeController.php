<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Middleware makes it so that a user must be logged in to use
    // any of the functions in this controller
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Send the user to the user.dashboard page
    public function index()
    {
        $data = array(
            'cards' => $cards = Card::where('user_id', Auth::id())->get()
        );
        return view('index')->with($data);
    }
}
