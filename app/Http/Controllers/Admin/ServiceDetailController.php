<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ServiceDetail;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving models
        $service_details = ServiceDetail::where('service_id', $id)->orderBy('id', 'desc')->get();

        return view('admin.service.detail.create', compact( 'service_details', 'id'));
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
            'service_id' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ServiceDetail::create([
            'service_id' =>  $input['service_id'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('service-detail.create', $input['service_id'])
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($service_id, $id)
    {
        // Retrieving models
        $service_detail = ServiceDetail::find($id);

        return view('admin.service.detail.edit', compact('service_detail', 'service_id'));
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
            'title' => 'required',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Update user
        ServiceDetail::find($id)->update($input);

        return redirect()->route('service-detail.create', $input['service_id'])
            ->with('success','content.updated_successfully');
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
        $service_detail = ServiceDetail::find($id);

        // Delete record
        $service_detail->delete();

        return redirect()->route('service-detail.create', $service_detail->service_id)
            ->with('success', 'content.deleted_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_checked(Request $request, $id)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('event-detail.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $arr_checked_list) {

            // Retrieve a model
            $service_detail = ServiceDetail::findOrFail($arr_checked_list);

            // Delete record
            $service_detail->delete();

        }

        return redirect()->route('service-detail.create', $id)
            ->with('success', 'content.deleted_successfully');
    }
}
