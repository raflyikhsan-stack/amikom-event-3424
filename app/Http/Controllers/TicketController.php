<?php

namespace App\Http\Controllers;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show(){
        return view('ticket');
        }
}
