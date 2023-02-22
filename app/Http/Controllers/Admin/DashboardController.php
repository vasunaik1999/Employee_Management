<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DailyUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $myUpdates = DailyUpdate::where('user_id','=',Auth::user()->id)->get()->count();
        $users = User::all();
        $totalUsers = 0; 
        $totalAdmins = 0;
        $totalSuperadmins = 0;
        foreach($users as $user)
        {
            if($user->hasRole('user'))
            {
                $totalUsers++;
            }
            elseif($user->hasRole('admin'))
            {
                $totalAdmins++;
            }
            elseif($user->hasRole('superadmin'))
            {
                $totalSuperadmins++;
            }
        }

        $totalRoles=Role::all()->count();
        $totalPermissions = Permission::all()->count();

        $myCategories = Category::where('user_id','=',Auth::user()->id)->get()->count();
        // dd($totalRoles, $totalPermissions);

        // dd($totalUsers, $totalAdmins, $totalSuperadmins);

        return view('admin.dashboard', compact('myUpdates', 'totalUsers', 'totalAdmins', 'totalSuperadmins', 'totalRoles', 'totalPermissions', 'myCategories'));
    }
}
