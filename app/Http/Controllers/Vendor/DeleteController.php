<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function delte_message($id)
    {
        $chat=Chat::find($id);
        if ($chat) {
            $chat->delete();
            return redirect()->back()->with('success', 'Message Supprimeé avce Success');
        } else {
            return redirect()->route('user.index');
        }
    }
}
