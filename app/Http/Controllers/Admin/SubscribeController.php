<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $subscribers = Subscribe::orderBy('id', 'desc')->get();

        return view('admin.subscribe.create', compact('subscribers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'email' => 'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Subscribe::firstOrCreate([
            'email' => $input['email']
        ]);

        return redirect()->route('subscribe.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $subscriber = Subscribe::find($id);

        // Delete record
        $subscriber->delete();

        return redirect()->route('subscribe.create')
            ->with('success', 'content.deleted_successfully');
    }

}
