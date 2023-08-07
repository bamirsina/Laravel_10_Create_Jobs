<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class EmployerController extends Controller
{

    public function index(Request $request): View
    {
        $userId = Auth::id();

        if($request->filled('search')){
            $employers = Employer::search($request->search)->get();
        }else{
            $employers = Employer::where('created_by', $userId)->latest()->get();
        }

        return view('employer.index',compact('employers'));
    }

    public function show($id)
    {
        $employer = Employer::findOrFail($id);

        $user_id = Auth::user()->id;

        if ($employer->created_by !== $user_id){
            return redirect()->route('employer.index')->with('danger', 'You can not show this employer');
        }

        return view('employer.show',compact('employer'));
    }
    public function create()
    {
        $employer = auth()->user();

        $jobs = Job::where('created_by', auth()->user()->id)->get();

        $selectedJobId = request()->input('job');

        $createdJobs = $employer->createdJobs;

        return view('employer.create',compact('jobs','createdJobs', 'selectedJobId'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'job_id' => 'required',
            'age'    => 'required|integer|min:18',
        ]);

        $employer = new Employer([
            'created_by' => \auth()->id(),
            'name'      => $request->name,
            'number'    => $request->number,
            'email'     => $request->email,
            'job_id'    => $request->job_id,
            'age'       => $request->age,
        ]);

        $employer->save();

        Session::flash('success', 'Employer created successfully!');

        return redirect()->route('employer.index');
    }
    public function edit(Employer $employer)
    {
//        $jobs = Job::all();
        $user_id = Auth::user()->id;

        if ($employer->created_by !== $user_id){
            return redirect()->route('employer.index')->with('danger', 'You can not edit this employer');
        }

        $jobs = Job::where('created_by', auth()->user()->id)->get();

        return view('employer.edit')->with([
            'employer' => $employer,
            'jobs'     => $jobs,
        ]);
    }
    public function update(Request $request, Employer $employer)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'job_id' => 'nullable|exists:jobs,id',
            'age'    => 'required|integer|min:18',
        ]);

        $employer->update([
            'created_by' => \auth()->id(),
            'name'       => $request->name,
            'number'     => $request->number,
            'email'      => $request->email,
            'job_id'     => $request->job_id,
            'age'        => $request->age,
        ]);

        Session::flash('success', 'Employer updated successfully!');

        return redirect()->route('employer.index');
    }

    public function destroy(Employer $employer)
    {
        $employer->delete();

        Session::flash('danger', 'Employer deleted successfully!');

        return redirect()->route('employer.index');
    }
}
