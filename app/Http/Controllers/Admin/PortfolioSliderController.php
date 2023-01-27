<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PortfolioSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioSliderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving models
        $portfolio_sliders = PortfolioSlider::where('portfolio_id', $id)->orderBy('id', 'desc')->get();

        return view('admin.portfolio.slider.create', compact( 'portfolio_sliders', 'id'));
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
            'portfolio_id' => 'required',
            'order' => 'required|integer',
            'portfolio_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('portfolio_image')){

            // Get image file
            $portfolio_image_file = $request->file('portfolio_image');

            // Folder path
            $folder = 'uploads/img/portfolio/slider/';

            // Make image name
            $portfolio_image_name = time().'-'.$portfolio_image_file->getClientOriginalName();

            // Original size upload file
            $portfolio_image_file->move($folder, $portfolio_image_name);

            // Set input
            $input['portfolio_image'] = $portfolio_image_name;

        }

        // Record to database
        PortfolioSlider::create([
            'portfolio_id' =>  $input['portfolio_id'],
            'portfolio_image' => $input['portfolio_image'],
            'order' => $input['order']
        ]);

        return redirect()->route('portfolio-slider.create', $input['portfolio_id'])
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($portfolio_id, $id)
    {
        // Retrieving models
        $portfolio_slider = PortfolioSlider::find($id);

        return view('admin.portfolio.slider.edit', compact('portfolio_slider', 'portfolio_id'));
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
            'order' => 'required|integer',
            'portfolio_image' => 'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $portfolio_slider = PortfolioSlider::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('portfolio_image')){

            // Get image file
            $portfolio_image_file = $request->file('portfolio_image');

            // Folder path
            $folder = 'uploads/img/portfolio/slider/';

            // Make image name
            $portfolio_image_name =  time().'-'.$portfolio_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$portfolio_slider->portfolio_image));

            // Original size upload file
            $portfolio_image_file->move($folder, $portfolio_image_name);

            // Set input
            $input['portfolio_image']= $portfolio_image_name;

        }

        // Update user
        PortfolioSlider::find($id)->update($input);

        return redirect()->route('portfolio-slider.create', $input['portfolio_id'])
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
        $portfolio_slider = PortfolioSlider::find($id);

        // Folder path
        $folder = 'uploads/img/portfolio/slider/';

        // Delete Image
        File::delete(public_path($folder.$portfolio_slider->portfolio_image));

        // Delete record
        $portfolio_slider->delete();

        return redirect()->route('portfolio-slider.create', $portfolio_slider->portfolio_id)
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
            return redirect()->route('portfolio-slider.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $arr_checked_list) {

            // Retrieve a model
            $portfolio_slider = PortfolioSlider::findOrFail($arr_checked_list);

            // Folder path
            $folder = 'uploads/img/portfolio/slider/';

            // Delete Image
            File::delete(public_path($folder.$portfolio_slider->portfolio_image));

            // Delete record
            $portfolio_slider->delete();

        }

        return redirect()->route('portfolio-slider.create', $id)
            ->with('success', 'content.deleted_successfully');
    }
}
