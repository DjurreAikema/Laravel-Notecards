<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array('cards' => $cards = Card::all());
        return view('user.dashboard')->with($data);
    }

    public function create()
    {
        return view('cards.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'cardcontent' => 'required'
        ]);

        $card = Card::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'content' => $request->cardcontent
            ]
        );


        return redirect(route('dashboard'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}