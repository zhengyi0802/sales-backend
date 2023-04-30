<?php

namespace App\Http\Controllers;

use App\Uploads\FileUpload;
use App\Models\User;
use App\Models\Member;
use App\Models\Questionnaire;
use App\Models\Order;
use App\Enums\UserRole;
use Illuminate\Http\Request;

class DistrobuterController extends Controller
{
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
    public function create(Request $request)
    {
        $data = $request->all();
        $introducer = $data['introducer'];
        return view('distrobuters.create', compact('introducer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $introducer = User::where('line_id', $data['introducer'])->get()->first();
        $user = [
            'name'       => $data['name'],
            'phone'      => $data['phone'],
            'line_id'    => $data['line_id'],
            'password'   => bcrypt($data['password']),
            'role'       => UserRole::Reseller,
            'created_by' => 9999,
            'status'     => true,
        ];
        $user = User::create($user);

        $member = [
            'user_id'        => $user->id,
            'introducer_id'  => $introducer->id,
            'address'        => $data['address'],
            'pid'            => $data['pid'],
            'created_by'     => 9999,
        ];
        $distrobuter = Member::create($member);

        return redirect()->route('distrobuters.show', compact('distrobuter'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $distrobuter)
    {
        return view('distrobuters.show', compact('distrobuter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $distrobuter)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $distrobuter)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $distrobuter)
    {
    }

}

