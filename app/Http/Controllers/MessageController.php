<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {

    public function messages() {
        $messages = Message::all();
      //  dd($messages);
        return view('admin.pages.message.message', get_defined_vars());
    }

    public function addmessages() {
        $categories = Category::where([
                    'type' => 'Message',
                ])->get();
        return view('admin.pages.message.addmessage', get_defined_vars());
    }
    public function storeMessage(Request $request) {
        
         $this->validate($request, [
            'type' => 'required',
            'message' => 'required',
        ]);
        
        $msg = new Message();
        $msg->type = $request->type;
        $msg->message = $request->message;
        $msg->save();

        session()->flash('success', 'New Message Added Successfully.');
        return redirect('/messages');
    }
}
