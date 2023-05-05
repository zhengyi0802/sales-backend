<?php

namespace App\Http\Controllers;

use App\Uploads\FileUpload;
use App\Models\User;
use App\Models\Member;
use App\Models\Manager;
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
        $check_user = User::where('line_id', $data['line_id'])
                          ->orWhere('phone', $data['phone'])
                          ->first();

        if ($data['introducer'] == null) {
            $data['introducer'] = 'manager';
        }

        $introducer = User::where('line_id', $data['introducer'])->first();
        if ($introducer->role == UserRole::Manager) {
            $share_status = $introducer->manager->share_status;
        } else {
            $share_status = $introducer->member->share_status;
        }
        $user = [
            'name'       => $data['name'],
            'phone'      => $data['phone'],
            'line_id'    => $data['line_id'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'role'       => UserRole::Distrobuter,
            'created_by' => 1,
            'status'     => true,
        ];

        if (is_null($check_user)) {
            $user = User::create($user);
        } else {
            $check_user->update($user);
            $user = $check_user;
        }

        $member = [
            'user_id'        => $user->id,
            'introducer_id'  => $introducer->id,
            'address'        => $data['address'],
            'pid'            => $data['pid'],
            'bonus'          => ($share_status ? 2500 : 0),
            'share'          => 0,
            'share_status'   => $share_status,
            'created_by'     => 1,
        ];
        if (is_null($check_user)) {
            $distrobuter = Member::create($member);
        } else {
            $distrobuter = Member::where('user_id', $check_id)->first();
            if (is_null($distrobuter)) {
               $distrobuter = Member::create($member);
            } else {
               $distrobuter->update($member);
            }
        }

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

