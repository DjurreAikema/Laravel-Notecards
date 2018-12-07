<?php

namespace App\Http\Controllers;

use App\Card;
use App\Status;
use App\User;
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
        $data = array(
            'cards' => $cards = Card::all()
        );
        return view('user.dashboard')->with($data);
    }

    public function create()
    {
        $data = array(
            'statuses' => $statuses = Status::all()
        );
        return view('cards.create')->with($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'cardcontent' => 'required',
            'status' => 'required'
        ]);

        $card = Card::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status_id' => $request->status,
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

    public function softdelete($id)
    {
        $card = Card::where('id', $id);
        $card->delete();
        return back();
    }

    public function trash()
    {
        $data = array(
            'cards' => $cards = Card::onlyTrashed()->get()
        );
        return view('cards.trash')->with($data);
    }

    public function destroy($id)
    {
        $card = Card::where('id', $id);
        $card->forceDelete();
        return back();
    }
}
