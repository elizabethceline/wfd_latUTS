<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $validator = [
            'movie_id' => 'required|exists:movies,id',
            'customer_name' => 'required|string|max:100',
            'seat_number' => 'required|string|max:5',
        ];
        $valid = Validator::make($request->only(['movie_id', 'customer_name', 'seat_number']), $validator, [
           'movie_id.exists' => 'Movie ID tidak ditemukan',
            'movie_id.required' => 'Movie ID harus diisi',
            'customer_name.required' => 'Customer name harus diisi',
            'customer_name.max' => 'Customer name maksimal 100 karakter',
            'seat_number.required' => 'Seat number harus diisi',
            'seat_number.max' => 'Seat number maksimal 5 karakter',
        ]);
        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        }

        if (Ticket::where('seat_number', $request->seat_number)->where('movie_id', $request->movie_id)->exists()) {
            return redirect()->back()->with('error', 'Seat number sudah terisi');
        }

        $ticket = new Ticket();
        $ticket->movie_id = $request->movie_id;
        $ticket->customer_name = $request->customer_name;
        $ticket->seat_number = $request->seat_number;

        $ticket->save();

        return redirect()->route('movies')->with('success', 'Tiket berhasil diinput');
    }

    public function checkIn(Ticket $ticket)
    {
        $ticket->is_checked_in = 1;
        $ticket->check_in_time = now();
        $ticket->save();

        return redirect()->back()->with('success', 'Check in berhasil');
    }

    public function delete(Ticket $ticket)
    {
        if($ticket->is_checked_in) {
            return redirect()->back()->with('error', 'Tiket sudah check in, tidak bisa dihapus');
        }
        
        $ticket->delete();

        return redirect()->back()->with('success', 'Tiket berhasil dihapus');
    }
}
