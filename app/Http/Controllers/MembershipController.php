<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function display(){
        return view('membership')->with('memberships', Membership::all());
    }

    public function create(Request $request){
        $membership = new Membership();
        $membership->membership_type = $request->membership_type;
        $membership->membership_price = $request->membership_price;
        $membership->save();

        return redirect()->route('membership')->with('success', 'New membership was added.');
    }

    public function edit ($id){
        $membership = Membership::find($id);

        return view('membership_edit')->with('membership', $membership); 
    }

    public function update(Request $request){
        $membership = Membership::find($request->id);
        $membership->membership_type = $request->membership_type;
        $membership->membership_price = $request->membership_price;
        $membership->save();

        return redirect()->route('membership')->with('success', 'New membership was updated.');
    }

    public function delete($id){
        $membership = Membership::find($id);
        $membership->delete();

        return redirect()->route('membership')->with('success', 'Membership was deleted.');
    }
}
