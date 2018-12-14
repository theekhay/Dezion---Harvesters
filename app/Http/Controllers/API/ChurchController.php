<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;

//requets
use Illuminate\Http\Request;
use App\http\Requests\CreateChurchRequest;

//controllers
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;

//models
use App\Models\Church;

//resources
use App\Http\Resources\ChurchResource;

class ChurchController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(  ChurchResource::collection( Church::all() ), 'all chrurch resources' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateChurchRequest $request)
    {
        $church = Church::create( $request->all() + [ 'created_by' => 1 ] );

        if( $church ) {
            return $this->sendResponse( new ChurchResource( Church::find($church->id) ), 'church created successfully' );
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
       return $this->sendResponse( new ChurchResource( Church::findOrFail($id) ), 'church Details retrieved successfully' );
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
