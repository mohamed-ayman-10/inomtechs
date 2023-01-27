<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillInfoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkillController extends Controller
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
        $skill = Skill::where('language_id', $language->id)->first();
        $info_lists = SkillInfoList::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.skill.create', compact('skill', 'info_lists'));
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
            'section_title' => 'required',
            'title' => 'required',
            'skill_image' => 'required|image|mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('skill_image')){

            // Get image file
            $skill_image_file = $request->file('skill_image');

            // Folder path
            $folder = 'uploads/img/skill/';

            // Make image name
            $skill_image_name = time().'-'.$skill_image_file->getClientOriginalName();

            // Original size upload file
            $skill_image_file->move($folder, $skill_image_name);

            // Set input
            $input['skill_image']= $skill_image_name;

        }

        // Record to database
        Skill::firstOrCreate([
            'language_id' => getLanguage()->id,
            'section_title' => $input['section_title'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'skill_image' => $input['skill_image']
        ]);

        return redirect()->route('skill.create')
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
            'skill_image' => 'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $skill = Skill::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('skill_image')){

            // Get image file
            $skill_image_file = $request->file('skill_image');

            // Folder path
            $folder = 'uploads/img/skill/';

            // Make image name
            $skill_image_name =  time().'-'.$skill_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$skill->skill_image));

            // Original size upload file
            $skill_image_file->move($folder, $skill_image_name);

            // Set input
            $input['skill_image']= $skill_image_name;

        }

        // Update model
        Skill::find($id)->update($input);

        return redirect()->route('skill.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_info_list(Request $request)
    {
        // Form validation
        $request->validate([
            'title' => 'required',
            'percent_rate' => 'required|integer',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        SkillInfoList::create([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'percent_rate' => $input['percent_rate'],
            'order' => $input['order']
        ]);

        return redirect()->route('skill.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_info_list($id)
    {
        // Retrieving models
        $info_list = SkillInfoList::find($id);

        return view('admin.skill.edit', compact('info_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info_list(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'title' => 'required',
            'percent_rate' => 'required|integer',
            'order' => 'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        SkillInfoList::find($id)->update($input);

        return redirect()->route('skill.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_info_list($id)
    {
        // Retrieve a model
        $info_list = SkillInfoList::find($id);

        // Delete record
        $info_list->delete();

        return redirect()->route('skill.create')
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
            return redirect()->route('skill.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $info_list = SkillInfoList::findOrFail($id);

            // Delete record
            $info_list->delete();

        }

        return redirect()->route('skill.create')
            ->with('success', 'content.deleted_successfully');
    }

}
