<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Job;

class MyJobController extends Controller
{
    public function index()
    {
        //Gate::authorize('viewAnyEmployer', Job::class);

        return view(
            'my_job.index',
            [
                'jobs' => auth()->user()->employer
                    ->jobs()
                    ->with(['employer', 'jobApplications', 'jobApplications.user'])
                    ->get()
            ]
        );
    }

    public function create()
    {
        //Gate::authorize('create', Job::class);

        return view('my_job.create');
    }

    public function store(JobRequest $request)
    {
        //Gate::authorize('create', Job::class);

        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')->with('success', 'Job was created!');
    }

    public function edit(Job $myJob)
    {
        // Gate::authorize('update', $myJob);
        return view('my_job.edit', ['job' => $myJob]);
    }

    public function update(JobRequest $request, Job $myJob)
    {
        //Gate::authorize('update', $myJob);

        $myJob->update($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job was edited succesfully!');
    }

    public function destroy(Job $myJob)
    {
        //Gate::authorize('delete', $myJob);
        $myJob->delete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted.');
    }
}
