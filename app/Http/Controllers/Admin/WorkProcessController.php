<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\WorkProcess;
use App\Models\Admin\WorkProcessSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WorkProcessController extends Controller
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
        $work_processes = WorkProcess::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $work_process_section = WorkProcessSection::where('language_id', $language->id)->first();

        return view('admin.work_process.create', compact('work_processes', 'work_process_section'));
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
            'image_status' => 'in:enable,disable',
            'title' => 'required',
            'order' => 'required|integer',
            'work_process_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('work_process_image')){

            // Get image file
            $work_process_image = $request->file('work_process_image');

            // Folder path
            $folder ='uploads/img/work_process/';

            // Make image name
            $work_process_image_name =  time().'-'.$work_process_image->getClientOriginalName();

            // Upload image
            $work_process_image->move($folder, $work_process_image_name);

            // Set input
            $input['work_process_image']= $work_process_image_name;

        } else {
            // Set input
            $input['work_process_image']= null;
        }

        // Record to database
        WorkProcess::create([
            'language_id' => getLanguage()->id,
            'image_status' => $input['image_status'],
            'work_process_image' => $input['work_process_image'],
            'title' => $input['title'],
            'order' => $input['order']
        ]);

        return redirect()->route('work-process.create')
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
        $work_process = WorkProcess::findOrFail($id);

        return view('admin.work_process.edit', compact('work_process'));
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
            'image_status' => 'in:enable,disable',
            'title' => 'required',
            'order' => 'required|integer',
            'work_process_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $work_process = WorkProcess::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('work_process_image')){

            // Get image file
            $work_process_image = $request->file('work_process_image');

            // Folder path
            $folder ='uploads/img/work_process/';

            // Make image name
            $work_process_image_name =  time().'-'.$work_process_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$work_process->work_process_image));

            // Upload image
            $work_process_image->move($folder, $work_process_image_name);

            // Set input
            $input['work_process_image'] = $work_process_image_name;

        }

        // Record to database
        WorkProcess::find($id)->update($input);

        return redirect()->route('work-process.create')
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
        $work_process = WorkProcess::find($id);

        // Folder path
        $folder = 'uploads/img/work_process/';

        // Delete Image
        File::delete(public_path($folder.$work_process->work_process_image));

        // Delete record
        $work_process->delete();

        return redirect()->route('work-process.create')
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
            return redirect()->route('work-process.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $work_process = WorkProcess::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/work_process/';

            // Delete Image
            File::delete(public_path($folder.$work_process->work_process_image));

            // Delete record
            $work_process->delete();

        }

        return redirect()->route('work-process.create')
            ->with('success', 'content.deleted_successfully');
    }
}
