<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['action', 'user_id', 'date_from', 'date_to']);

        $logs = ActivityLog::with('user')
            ->filter($filters)
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        $users = \App\Models\User::all();
        $actions = ActivityLog::select('action')->distinct()->pluck('action');

        return view('activity_logs.index', compact('logs', 'users', 'actions', 'filters'));
    }

    public function show($id)
    {
        $log = ActivityLog::with('user')->findOrFail($id);
        return view('activity_logs.show', compact('log'));
    }

    public function destroy($id)
    {
        $log = ActivityLog::findOrFail($id);
        $log->delete();

        return redirect()->route('activity_logs.index')->with('success', 'Activity log deleted successfully!');
    }

    public function clearLogs()
    {
        ActivityLog::truncate();

        return redirect()->route('activity_logs.index')->with('success', 'All activity logs cleared successfully!');
    }
}
