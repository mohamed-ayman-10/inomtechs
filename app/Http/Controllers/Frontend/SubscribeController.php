<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
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
            'email' => $input['email'],
        ]);

        return redirect()->back()
            ->with('success', 'content.created_successfully');


    }
}
