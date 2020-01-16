<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * Show the form for creating a new message.
     *
     * @return View
     */
    public function create()
    {
        $user = auth()->user();
        return view('messages.create', compact('user'));
    }

    /**
     * Store a newly created message in storage.
     *
     * @param StoreMessage $request
     * @return Response
     */
    public function store(StoreMessage $request)
    {
        try {
            $message = new Message();
            $user = auth()->user();
            $message->user()->associate($user);
            $message->fill($request->all())->save();
            return response()->json([
                'message' => 'Successful message transmission',
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Error! Message was not send!',
            ]);
        }
    }
}
