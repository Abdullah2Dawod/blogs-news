<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $message = Message::latest()->paginate(15);
        // return view('homeng.contact', [
        //     'message' => $message,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('homeng.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'message' => 'required',
        ]);

        Message::create($request->all());

        return back()->with('update', 'تم إرسال رسالتك بنجاح , نشكرك لتواصلك معنا .')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
