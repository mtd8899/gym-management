<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Trainer;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function display(){
        $trainers = Trainer::all();
        $members = Member::all();
        $memberships = Membership::all();
        return view('index')->with('members', $members)
                            ->with('trainers', $trainers)
                            ->with('memberships', $memberships);
    }

    public function create(Request $request){
        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        // $member->membership_type = $request->membership_type;
        $member->membership_expiration = $request->membership_expiration;
        $member->membership_id = $request->membership_id;
        $member->trainer_id = $request->trainer_id;
        $member->save();

        return redirect()->route('index')->with('success', 'Member is created.');
    }

    public function edit ($id){
        $member = Member::findOrFail($id);
        $trainers = Trainer::all();
        $memberships = Membership::all();
        return view('edit')->with('member', $member)
            ->with('trainers', $trainers)
            ->with('memberships', $memberships);;

    }

    public function update(Request $request) {
        $member = Member::find($request->id);
        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_expiration = $request->membership_expiration;
        $member->trainer_id = $request->trainer_id;
        $member->membership_id = $request->membership_id;
        $member->save();

        return redirect()->route('index')->with('success', 'Member ' . $request->name . ' has been updated');
    }

    public function delete($id){
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('index')->with('success', 'Member was deleted.');
    }
}
