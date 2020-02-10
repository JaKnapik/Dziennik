<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class PresenceController extends Controller {

    /**
     * Display a listing of the resource.
     * @param User $id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }
    public function index($nameSurname)
    {
        $nameSurname2 = User::select('name', 'surname', 'id')->where('id', $nameSurname)->get();
        $nameSurname2 = $nameSurname2[0];
        return view('presence.presenceList', compact('nameSurname2'));
    }
}