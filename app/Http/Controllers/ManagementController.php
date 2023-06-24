<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Pagination\Paginator;

//use Spatie\Activitylog\Contracts\Activity;


class ManagementController extends Controller
{
    public function index()
    {
        $applications = Application::get();
        $pendingApplications = $applications->where('status', 'Pending');
        $activities = Activity::paginate(5);

        return view('management.index', [
            'applications' => $applications,
            'pendingApplications' => $pendingApplications,
            'activities' => $activities,
        ]);
    }
}
