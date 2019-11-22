<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Session;
// use Validate;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.settings')->with('settings', Setting::first());
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'siteName' => 'required',
            'address' => 'required',
            'contactNumber' => 'required',
            'contactEmail' => 'required|email'
        ]);
        $settings = Setting::first();
        $settings->siteName = $request->siteName;
        $settings->address = $request->address;
        $settings->contactEmail = $request->contactEmail;
        $settings->contactNumber = $request->contactNumber;
        $settings->save();
        
        Session::flash('success', "Settings updated successfully!");
        return redirect()->route('post.index');

    }
}
