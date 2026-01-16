<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        $permissions = [
            'dashboard' => 'Dashboard',
            'users' => 'Users',
            'banners' => 'Home Banners',
            'chairman-messages' => 'Chairman Messages',
            'about-page' => 'About Page',
            'neet-domiciles' => 'Neet Domiciles',
            'video-gallery' => 'Video Gallery',
            'mission-vision' => 'Mission & Vision',
            'results-master' => 'Results',
            'subpage_banners' => 'Sub Page Banner',
            'galleries' => 'Gallery',
            'news' => 'News',
            'schools-master' => 'Schools',
            'category' => 'Admission Categories',
            'conferences' => 'Conferences',
            'conferences_detail' => 'Conferences Details',
            'events' => 'Events',
            'contactUs-master' => 'Contact Us',
            'course-categories' => 'Course Categories',
            'courses-master' => 'Courses',
            'homeabout' => 'Home About Page',
            'school-members' => 'School Details',
            'roles' => 'Roles & Access Control',
        ];

        return view('users.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'nullable|array',
            'status' => 'required|in:0,1',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['permissions'] = json_encode($validated['permissions'] ?? []);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        $permissions = [
            'dashboard' => 'Dashboard',
            'users' => 'Users',
            'banners' => 'Home Banners',
            'chairman-messages' => 'Chairman Messages',
            'about-page' => 'About Page',
            'neet-domiciles' => 'Neet Domiciles',
            'video-gallery' => 'Video Gallery',
            'mission-vision' => 'Mission & Vision',
            'results-master' => 'Results',
            'subpage_banners' => 'Sub Page Banner',
            'galleries' => 'Gallery',
            'news' => 'News',
            'schools-master' => 'Schools',
            'category' => 'Admission Categories',
            'conferences' => 'Conferences',
            'conferences_detail' => 'Conferences Details',
            'events' => 'Events',
            'contactUs-master' => 'Contact Us',
            'course-categories' => 'Course Categories',
            'courses-master' => 'Courses',
            'homeabout' => 'Home About Page',
            'school-members' => 'School Details',
            'roles' => 'Roles & Access Control',
        ];

        $user_permissions = json_decode($user->permissions, true) ?? [];

        return view('users.edit', compact('user', 'roles', 'permissions', 'user_permissions'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'nullable|array',
            'status' => 'required|in:0,1',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $validated['permissions'] = json_encode($validated['permissions'] ?? []);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ])) {

            $user = auth()->user();

            if (!$user->role_id) {
                Auth::logout();
                return redirect()
                    ->route('auth.login')
                    ->with('error', 'No role assigned. Contact admin.');
            }

            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'Welcome ' . $user->name . '!');
        }

        return redirect()
            ->route('auth.login')
            ->with('error', 'Invalid credentials or inactive account.');
    }



    // public function edit($id)
    // {
    //     $role = Role::with('modules')->findOrFail($id);
    //     $modules = Module::all();

    //     return view('roles.edit', compact('role', 'modules'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $role = Role::findOrFail($id);

    //     $role->modules()->sync($request->modules ?? []);

    //     return back()->with('success', 'Permissions updated');
    // }

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
