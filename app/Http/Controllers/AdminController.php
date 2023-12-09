<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User logout successfully',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.adminProfile', compact('adminData'));
    }
    public function editProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.adminProfileEdit', compact('adminData'));
    }
    public function storeProfile(Request $request)
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        $adminData->name = $request->name;
        $adminData->username = $request->username;
        $adminData->email = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $adminData['profile_image'] = $filename;
        }
        $adminData->save();
        $notification = array(
            'message' => 'Admin data updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
}
