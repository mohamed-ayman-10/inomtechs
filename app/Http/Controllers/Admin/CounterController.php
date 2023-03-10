<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Counter;
use App\Models\Admin\CounterSection;
use Illuminate\Http\Request;

class CounterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $counters = Counter::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $counter_section = CounterSection::where('language_id', $language->id)->first();

        return view('admin.counter.create', compact('counters', 'counter_section'));
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
            'timer' => 'required|integer',
            'title' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Counter::create([
            'language_id' => getLanguage()->id,
            'timer' => $input['timer'],
            'title' => $input['title'],
            'order' => $input['order']
        ]);

        return redirect()->route('counter.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $counter = Counter::findOrFail($id);

        return view('admin.counter.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'timer' => 'required|integer',
            'title' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Counter::find($id)->update($input);

        return redirect()->route('counter.create')
            ->with('success', 'content.updated_successfully');
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
        $counter = Counter::find($id);

        // Delete record
        $counter->delete();

        return redirect()->route('counter.create')
            ->with('success', 'content.deleted_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_checked(Request $request)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('counter.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $counter = Counter::find($id);

            // Delete record
            $counter->delete();

        }

        return redirect()->route('counter.create')
            ->with('success', 'content.deleted_successfully');
    }
}
