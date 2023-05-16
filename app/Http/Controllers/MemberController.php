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

class MemberController extends Controller
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
        if (!array_key_exists('introducer', $data) || $data['introducer'] == '' ) {
            $introducer = '';
            return view('members.create', compact('introducer'));
        }
        $introducerData = User::where('line_id', $data['introducer'])->first();
        if (is_null($introducerData)
            || ($introducerData->role != UserRole::Manager
            && $introducerData->role != UserRole::Reseller
            && $introducerData->role != UserRole::Distrobuter)) {
            return view('errorpage');
        }
        $introducer = $introducerData->line_id;

        return view('members.create', compact('introducer'));
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
                          ->orWhere('email', $data['email'])
                          ->get();

        $q4 = $request->q4;
        $is_manager = false;
        if (count($check_user) == 0) {
            $introducer = User::where('line_id', $data['introducer'])->first();
            $user = [
                'name'       => $data['name'],
                'phone'      => $data['phone'],
                'line_id'    => $data['line_id'],
                'email'      => $data['email'],
                'password'   => bcrypt('12345678'),
                'role'       => UserRole::Member,
                'created_by' => 1,
                'status'     => true,
            ];
            $user = User::create($user);

            $member = [
                'user_id'        => $user->id,
                'introducer_id'  => $introducer->id,
                'address'        => $data['address'],
                'created_by'     => 1,
            ];
            $member = Member::create($member);
        } else {
            $check = $check_user->first();
            if ($check->role == UserRole::Manager) {
                $member = Manager::where('user_id', $check->id)->first();
                $is_manager = true;
            } else {
                $member = Member::where('user_id', $check->id)->first();
                $is_manager = false;
            }
        }

        $order_latest = Order::orderBy('id', 'desc')->first();
        if ($order_latest == null) {
            $orderlatest = 0;
        } else {
            $orderlatest = $order_latest->id;
        }

        $idinit = ((now()->year-2000)*100+(now()->month))*10000+1;

        if ($idinit <= $orderlatest) {
            $id = $orderlatest+1;
        } else {
            $id = $idinit;
        }
        $order = [
            'id'             => $id,
            'member_id'      => $member->id,
            'is_manager'     => $is_manager,
            'phone'          => $data['phone'],
            'address'        => $data['address'],
            'model'          => $data['model'],
        ];
        Order::create($order);

        $q4json = json_encode($q4);
        $qdata = [
            'member_id'      => $member->id,
            'q1'             => $data['q1'],
            'q2'             => $data['q2'],
            'q3'             => $data['q3'],
            'q4'             => $q4json,
            'q5'             => $data['q5'],
        ];
        Questionnaire::create($qdata);

        return redirect()->route('members.show', compact('member'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
    }

}

