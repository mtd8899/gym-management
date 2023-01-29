<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;

class TrainerController extends Controller
{ 
    public function display(){
        return view('trainer')->with('trainers', Trainer::all());
    }

    public function create(Request $request){
        $trainer = new Trainer;
        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->specialization = $request->specialization;
        $trainer->phone = $request->phone;
        $trainer->save();

        return redirect()->route('trainer')->with('success', 'New trainer was added.');
    }

    public function edit ($id){
        $trainer = Trainer::find($id);

        return view('trainer_edit')->with('trainer', $trainer); 
    }

    public function update(Request $request){
        $trainer = Trainer::find($request->id);
        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->specialization = $request->specialization;
        $trainer->phone = $request->phone;
        $trainer->save();

        return redirect()->route('trainer')->with('success', 'Trainer inforamtion was updated.');
    }

    public function delete($id){
        $trainer = Trainer::find($id);
        $trainer->delete();

        return redirect()->route('trainer')->with('success', 'Trainer was deleted.');
    }
}
