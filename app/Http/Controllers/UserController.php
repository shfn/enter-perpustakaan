<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $renlog = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['renlog' => $renlog]);
    }

    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }

    public function registeredUser()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUsers' => $registeredUsers]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        $renlog = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('user-detail', ['user' => $user, 'renlog' => $renlog]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user-detail/' . $slug)->with('status', 'User telah diaktifkan!');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'User telah diblokir!');
    }

    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->get();
        return view('users-banned', ['bannedUsers' => $bannedUsers]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'User telah di pulihkan!');
    }
}
