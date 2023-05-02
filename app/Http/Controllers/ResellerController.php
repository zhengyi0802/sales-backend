<?php

namespace App\Http\Controllers;

use App\Uploads\FileUpload;
use App\Models\User;
use App\Models\Member;
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
        $introducer = $data['introducer'];
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
                          ->get();

        $introducer = User::where('line_id', $data['introducer'])->get()->first();
        $user = [
                'name'       => $data['name'],
                'phone'      => $data['phone'],
                'line_id'    => $data['line_id'],
                'password'   => bcrypt($data['password']),
                'role'       => UserRole::Reseller,
                'created_by' => 1,
                'status'     => true,
        ];

        if (count($check_user) == 0) {
            $user = User::create($user);
        } else {
            $check = $check_user->first();
            $check->update($user);
        }

        $member = [
            'user_id'        => $user->id,
            'introducer_id'  => $introducer->id,
            'address'        => $data['address'],
            'pid'            => $data['pid'],
            'bonus'          => 2500,
            'share'          => 1000,
            'created_by'     => 1,
        ];
        if (count($check_user) == 0) {
            $reseller = Member::create($member);
        } else {
            $reseller = Member::where('user_id', $check->id)->get()->first();
            $reseller->update($member);
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

