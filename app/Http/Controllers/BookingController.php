<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    // Show form
    public function create()
    {
        $application = Booking::where('user_id', auth()->id())->first();
        return view('booking.create', compact('application'));
    }

    // Store form
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'dob'       => 'required|date',
            'education' => 'required',
            'nid_no'    => 'required',
            'permanent_address' => 'required',
            'profession' => 'required',
            'package'   => 'required',
            'package_amount' => 'required',
            'photo'     => 'nullable|image|max:2048',
            'trx_id'    => 'nullable',
            'send_money_number' => 'nullable',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('booking_photos', 'public');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'education' => $request->education,
            'nid_no' => $request->nid_no,
            'permanent_address' => $request->permanent_address,
            'profession' => $request->profession,
            'photo' => $path,
            'package' => $request->package,
            'package_amount' => $request->package_amount,
            'trx_id' => $request->trx_id,
            'send_money_number' => $request->send_money_number,
            'payment_status' => 'pending'
        ]);

        return back()->with('success', 'ফর্ম সফলভাবে সাবমিট হয়েছে!');
    }
}
