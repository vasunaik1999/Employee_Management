<?php

namespace App\Http\Controllers;

use App\Models\DailyUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyUpdateController extends Controller
{

    public function index()
    {
        $dailyUpdates = DailyUpdate::where('user_id','=',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.dailyUpdates.index',compact('dailyUpdates'));
    }

    public function create()
    {
        return view('admin.dailyUpdates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_brief' => ['required', 'min:4'],
            'description' => ['required'],
            'date' => 'required',
        ]);

        $dailyUpdate = new DailyUpdate(); 
        $dailyUpdate->task_brief = $request->task_brief;
        $dailyUpdate->description = $request->description;
        $dailyUpdate->keypoints = $request->keypoints;
        $dailyUpdate->date = $request->date;
        $dailyUpdate->user_id = auth()->user()->id;
        
        $dailyUpdate->save();
        return to_route('dashboard.daily-updates.index')->with('message', 'Daily Task Submitted Sucessfully!');
    }

    public function show(DailyUpdate $dailyUpdate)
    {
        $user = User::where('id','=',$dailyUpdate->user_id)->first();
        return view('admin.dailyUpdates.show', compact('dailyUpdate','user'));
    }

    public function edit(DailyUpdate $dailyUpdate)
    {
        return view('admin.dailyUpdates.edit',compact('dailyUpdate'));
    }

    public function update(Request $request, DailyUpdate $dailyUpdate)
    {
        $validated = $request->validate([
            'task_brief' => ['required', 'min:4'],
            'description' => ['required'],
            'date' => 'required',
        ]);

        $dailyUpdate->task_brief = $request->task_brief;
        $dailyUpdate->description = $request->description;
        $dailyUpdate->keypoints = $request->keypoints;
        $dailyUpdate->date = $request->date;
        
        $dailyUpdate->update();
        return to_route('dashboard.daily-updates.index')->with('message', 'Daily Task Updated Sucessfully!');
 
    }

    public function destroy(Request $request, DailyUpdate $dailyUpdate)
    {
        $dailyUpdate->delete();
        return back()->with('message', 'Daily Task Deleted Sucessfully!');
    }

    //Check
    public function check_index()
    {
        $users = User::all();
        return view('admin.dailyUpdates.check-index',compact('users'));
    }

    public function check_show(User $user)
    {
        $dailyUpdates = DailyUpdate::where('user_id','=',$user->id)->orderBy('id', 'DESC')->get();
        return view('admin.dailyUpdates.check-show',compact('dailyUpdates','user'));
    }

    public function check_verify(DailyUpdate $dailyUpdate)
    {
        $user = User::where('id','=',$dailyUpdate->user_id)->first();
        return view('admin.dailyUpdates.check-verify',compact('dailyUpdate','user'));
    }

    public function check_update(Request $request, DailyUpdate $dailyUpdate)
    {
        $validated = $request->validate([
            'task_brief' => ['required', 'min:4'],
            'description' => ['required'],
            'date' => 'required',
        ]);

        $dailyUpdate->task_brief = $request->task_brief;
        $dailyUpdate->description = $request->description;
        $dailyUpdate->keypoints = $request->keypoints;
        $dailyUpdate->date = $request->date;
        $dailyUpdate->remark = $request->remark;
        $dailyUpdate->status = $request->status;
        
        $dailyUpdate->update();
        return to_route('dashboard.daily-updates.check-show',$dailyUpdate->user_id)->with('message', 'Daily Task Updated Sucessfully!');

    }

}
