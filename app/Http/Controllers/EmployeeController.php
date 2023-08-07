<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(Request $request): View
    {
        $userId = Auth::id();

        if($request->filled('search')){
            $employees = Employee::search($request->search)->get();
        }else{
            $employees = Employee::where('created_by', $userId)->latest()->get();
        }

        return view('employee.index',compact('employees'));
    }
    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        $jobs = Job::all();

        $user_id = Auth::user()->id;

        if ($employee->created_by !== $user_id){
            return redirect()->route('employee.index')->with('danger', 'You can not show this employee');
        }

        return view('employee.show',compact('employee','jobs'));
    }
    public function create()
    {
        $employee = auth()->user();

        $jobs = Job::where('created_by', auth()->user()->id)->get();

        $selectedJobId = request()->input('job');

        $supervisors = Employer::all();


        return view('employee.create', compact('supervisors', 'jobs', 'selectedJobId', 'employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'number'     => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'job_id'     => 'required',
            'age'        => 'required|integer|min:18',
            'supervisor' => 'nullable|exists:employers,id',
        ]);

        $employee = new Employee([
            'created_by' => \auth()->id(),
            'name'       => $request->name,
            'number'     => $request->number,
            'email'      => $request->email,
            'job_id'     => $request->job_id,
            'age'        => $request->age,
            'supervisor' => $request->supervisor,
        ]);

        $employee->save();

        Session::flash('success', 'Employee created successfully!');

        return redirect()->route('employee.index');
    }
    public function edit(Employee $employee)
    {
        $jobs          = Job::all();
        $selectedJobId = request()->input('job');
        $supervisors   = Employer::all();

        $user_id = Auth::user()->id;

        if ($employee->created_by !== $user_id){
            return redirect()->route('employee.index')->with('danger', 'You can not edit this employee');
        }

        return view('employee.edit', compact('employee','supervisors','jobs','selectedJobId'));
    }
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'number'     => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'job'        => 'nullable|exists:jobs,id',
            'age'        => 'required|integer|min:18',
            'supervisor' => 'nullable|exists:employers,id',

        ]);

        $employee->update([
            'name'       => $request->name,
            'number'     => $request->number,
            'email'      => $request->email,
            'job'        => $request->job,
            'age'        => $request->age,
            'supervisor' => $request->supervisor,

        ]);

        Session::flash('success', 'Employee updated successfully!');

        return redirect()->route('employee.index');
    }
    public function destroy(Employee $employee)
    {
        $employee->delete();

        Session::flash('danger', 'Employee deleted successfully!');

        return redirect()->route('employee.index');
    }
}
