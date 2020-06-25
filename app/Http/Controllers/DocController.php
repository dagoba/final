<?php

namespace App\Http\Controllers;

use App\Http\Services\DocService;
use App\Http\Services\DocServiceInterface;

use App\User;
use App\Role;
use App\UserRole;
use Auth;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Session;

class DocController extends Controller
{
    /** @var DocServiceInterface */
    private $docService;

    public function __construct(DocServiceInterface $docService)
    {
        $this->docService = $docService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $this->validate($request, [
            'name' => 'required|string|max:255|min:3',
            'surname' => 'required|string|max:255|min:3',
            'speciality' => 'required|string|max:255|min:3',
            'addinfo' => 'required|string|max:10000||min:10',
            'workingdate' => 'required|date',
        ]);

        $this->docService->updateInfo($id, $request->all());
        Session::flash('success', "Information updated successfully!");
        return redirect(url('userprofile', [Auth::user()]));
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
