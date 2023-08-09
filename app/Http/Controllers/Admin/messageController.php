<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function index()
    {
        $message = Message::latest()->paginate(15);
        return view('admin.messages.home',[
            'messages' => $message,
        ]);
    }

    public function destroy(String $id)
    {
        $message = message::findOrFail($id);
        $message->delete();

        return back()->with('update', 'تم حذف الرسالة بنجاح ')->with('type', 'danger');
    }
}
