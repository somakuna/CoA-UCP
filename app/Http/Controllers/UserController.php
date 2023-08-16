<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Pagination\Paginator;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
    public function __construct()
    {
        // Automatically call policy methods for resource controller actions:
        //  - PostPolicy::viewAny is called for index action
        //  - PostPolicy::create is called for create and store actions
        //  - PostPolicy::view is called for show action
        //  - PostPolicy::update is called for edit and update actions
        //  - PostPolicy::delete is called for destroy action
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        $moderators = User::with('applications')->role('moderator')->orderBy('id', 'DESC')->paginate(10, ['*'], 'moderators');
        $administrators = User::with('applications')->role('administrator')->orderBy('id', 'DESC')->paginate(10, ['*'], 'administrators');
        $users = User::with('applications')->doesntHave('roles')->orderBy('id', 'DESC')->paginate(10, ['*'], 'users');
        return view('user.index', [
            'moderators' => $moderators,
            'administrators' => $administrators,
            'users' => $users,
        ]);
    }

    public function show(User $user)
    {
        $applications = $user->applications;
        return view('user.show', [
            'user' => $user,
            'applications' => $applications,
        ]);
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $input = $request->validate([
            'name' => 'required',
            'forum_name' => 'required',
            'forum_id' => 'required',
            'email' => 'required|string|email:rfc,dns|max:255|unique:users',
        ]);
        $input2 = $request->validate([
            'role' => 'required',
        ]);

        if($input2['role'] == "administrator")
            $user->syncRoles(['administrator']);
        elseif($input2['role'] == "moderator")
            $user->syncRoles(['moderator']);
        else
            $user->syncRoles([]);

        $user->update($input);
        activity()->log('ažuriranje profila ID: ' . $user->id . ' / Name: ' . $user->name . ' / Role: ' . $user->getRoleNames()->first());
        return redirect()->route('user.show', $user)->with('success', 'User profile successfully edited.');
    }
}
