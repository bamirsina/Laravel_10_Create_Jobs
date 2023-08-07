<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    public function index()
    {
//        $jobs = Job::all();
        $userId = Auth::id();

        $jobs = Job::where('created_by', $userId)->latest()->get();

        return view('job.index', compact('jobs'));
    }
    public function create()
    {
        return view('job.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Job::create([
            'created_by' => \auth()->id(),
            'name'       => $request->name,
        ]);
        Session::flash('success', 'Job created successfully!');

        return redirect()->route('job.index');
    }
    public function edit(Job $job)
    {
        $user_id = Auth::user()->id;

        if ($job->created_by !== $user_id){
            return redirect()->route('job.index')->with('danger', 'You can not edit this job');
        }

        return view('job.edit', compact('job'));
    }
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
        ]);

        $job->update([
            'created_by' => \auth()->id(),
            'name'   => $request->name,
        ]);

        Session::flash('success', 'Job updated successfully!');

        return redirect()->route('job.index');
    }
    public function destroy(Job $job)
    {
        $job->delete();

        Session::flash('danger', 'Job deleted successfully!');

        return redirect()->route('job.index');
    }
}
