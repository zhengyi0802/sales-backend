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

class ResellerController extends Controller
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
        if (!array_key_exists('introducer', $data)) {
            return view('errorpage');
        }
        $introducerData = User::where('line_id', $data['introducer'])->first();
        if (is_null($introducerData)
           || ($introducerData->role != UserRole::Manager)) {
            return view('errorpage');
        }
        $introducer = $introducerData->line_id;

        return view('resellers.create', compact('introducer'));
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
        if (!is_null($check_user)) {
            if ($check_user->phone == $data['phone']) {
                $error_code = 1;
            }
            if ($check_user->line_id == $data['line_id']) {
                $error_code = 2;
            }
            return view('resellers.failure', compact('error_code'));
        }

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
                'role'       => UserRole::Reseller,
                'created_by' => 1,
                'status'     => true,
        ];

        if (is_null($check_user)) {
            $user = User::create($user);
        } else {
            $check_user->update($user);
            $user = $check_user;
        }
        if (is_null($user)) {
            $error_code = 4;
            return view('resellers.failure', compact('error_code'));
        }

        $member = Member::where('pid', $data['pid'])->first();
        if (!is_null($member)) {
            $error_code = 3;
            return view('resellers.failure', compact('error_code'));
        }

        $member = [
            'user_id'        => $user->id,
            'introducer_id'  => $introducer->id,
            'address'        => $data['address'],
            'pid'            => $data['pid'],
            'bonus'          => ($share_status ? 2500 : 0),
            'share'          => ($share_status ? 1000 : 0),
            'share_status'   => $share_status,
            'created_by'     => 1,
        ];

        if (is_null($check_user)) {
            $reseller = Member::create($member);
        } else {
            $reseller = Member::where('user_id', $check->id)->first();
            if (is_null($reseller)) {
               $reseller = Member::create($member);
            } else {
               $reseller->update($member);
            }
        }

        return redirect()->route('resellers.show', compact('reseller'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $reseller)
    {
        return view('resellers.show', compact('reseller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $reseller)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $reseller)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $reseller)
    {
    }

}

