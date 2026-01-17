<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
         $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id'  => 'required|exists:roles,id',
            'status'   => 'required|in:0,1',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
            'status'   => $request->status,
        ]);

        return redirect()->route('users.index')->with('success','User created');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('sucess', 'Data Deleted SuccessFully!');
    }


    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle login form submission.
     */
    public function loginPost(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->status != 1) {
                Auth::logout();
                return redirect()->route('auth.login')->with('error', 'Your account is inactive.');
            }

            // ✅ All users (superadmin, group1, group2, etc.) go to the same dashboard
            return redirect()->route('admin.dashboard')
                ->with('success', 'Welcome ' . $user->name . '!');
        }

        return redirect()->route('auth.login')->with('error', 'Invalid credentials.');
    }



    public function edit($id)
    {
        $role = Role::with('modules')->findOrFail($id);
        $modules = Module::all();

        return view('roles.edit', compact('role','modules'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->modules()->sync($request->modules ?? []);

        return back()->with('success','Permissions updated');
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with('success', 'Logged out successfully.');
    }

    public function profile()
    {
        $user = Auth::user(); // get logged-in user
        return view('auth.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Only update password if filled
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Handle avatar upload
        // if ($request->hasFile('avatar')) {
        //     $path = $request->file('avatar')->store('avatars', 'public');
        //     $user->avatar = $path;
        // }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


}
