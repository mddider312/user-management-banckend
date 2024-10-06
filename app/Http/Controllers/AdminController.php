<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Get all unapproved users
    public function getUnapprovedUsers()
    {
        $users = User::where('is_approved', false)->get();
        return response()->json($users);
    }

    // Approve a user
    public function approveUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->is_approved = true;
            $user->save();
            return response()->json(['message' => 'User approved successfully']);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    // Get all users (including approved and unapproved)
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
}

