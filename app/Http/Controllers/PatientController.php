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

    private function fetchInfoOrFail(int $id)
    {
        try {
            return $this->clientService->getInfoById($id);
        } catch (\Exception $e) {
            abort(Response::HTTP_NOT_FOUND, $e->getMessage());
        }
    }

}
