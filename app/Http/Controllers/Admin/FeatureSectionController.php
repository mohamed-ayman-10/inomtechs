<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FeatureSection;
use Illuminate\Http\Request;

class FeatureSectionController extends Controller
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
            'section_title' => 'required',
            'title' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        FeatureSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'section_title' => $input['section_title'],
            'title' => $input['title']
        ]);

        return redirect()->route('feature.create')
            ->with('success', 'content.created_successfully');
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
            'section_title' => 'required',
            'title' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update model
        FeatureSection::find($id)->update($input);

        return redirect()->route('feature.create')
            ->with('success', 'content.updated_successfully');
    }
}
