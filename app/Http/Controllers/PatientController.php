<?php

namespace App\Http\Controllers;

use App\Http\Services\ClientService;
use App\Http\Services\ClientServiceInterface;

use App\User;
use App\Role;
use App\UserRole;
use Auth;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{
    /** @var ClientServiceInterface */
    private $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userinfos = User::find($user->id);
        // return view('userprofile', compact('userinfos'));
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

        $checkid = Auth::user();

        $userProfile = $this->fetchInfoOrFail($id);
        if($userProfile != $checkid)
        {
            return redirect('/permission-denied');
        }
        return view('userprofile', compact('userProfile'));
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
            'city' => 'required|string|max:255|min:3',
            'addinfo' => 'required|string|max:10000||min:10',
            'birthdate' => 'required|date',
        ]);

        $this->clientService->updateInfo($id, $request->all());
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

    private function fetchInfoOrFail(int $id)
    {
        try {
            return $this->clientService->getInfoById($id);
        } catch (\Exception $e) {
            abort(Response::HTTP_NOT_FOUND, $e->getMessage());
        }
    }

}
