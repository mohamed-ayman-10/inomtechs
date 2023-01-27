<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PortfolioDetail;
use Illuminate\Http\Request;

class PortfolioDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving models
        $portfolio_details = PortfolioDetail::where('portfolio_id', $id)->orderBy('id', 'desc')->get();

        return view('admin.portfolio.detail.create', compact( 'portfolio_details', 'id'));
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
            'title' => 'required',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        PortfolioDetail::create([
            'portfolio_id' =>  $input['portfolio_id'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('portfolio-detail.create', $input['portfolio_id'])
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
        $portfolio_detail = PortfolioDetail::find($id);

        return view('admin.portfolio.detail.edit', compact('portfolio_detail', 'portfolio_id'));
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
        PortfolioDetail::find($id)->update($input);

        return redirect()->route('portfolio-detail.create', $input['portfolio_id'])
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
        $portfolio_detail = PortfolioDetail::find($id);

        // Delete record
        $portfolio_detail->delete();

        return redirect()->route('portfolio-detail.create', $portfolio_detail->portfolio_id)
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
            return redirect()->route('portfolio-detail.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $arr_checked_list) {

            // Retrieve a model
            $portfolio_detail = PortfolioDetail::findOrFail($arr_checked_list);

            // Delete record
            $portfolio_detail->delete();

        }

        return redirect()->route('portfolio-detail.create', $id)
            ->with('success', 'content.deleted_successfully');
    }
}
