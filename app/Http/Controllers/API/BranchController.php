<?php

namespace App\Http\Controllers\API;


//controllers
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;

//models
use App\Models\Branch;

//resources
use App\Http\Resources\BranchResource;

//requests
use Illuminate\Http\Request;
use App\Http\Requests\CreateBranchRequest;

class BranchController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(  BranchResource::collection( Branch::all() ), 'All branch resource' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBranchRequest $request)
    {
        $branch = Branch::create( $request->all() + [ 'created_by' => 1 ] );

        if( $branch ) {
            return $this->sendResponse( new BranchResource( Branch::find( $branch->id ) ), 'Branch created successfully' );
        }

        return $this->sendError('Error creating new church', 302);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->sendResponse( new BranchResource( Branch::findOrFail($id) ), 'Branch Detail retrieved successfully' );
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
