<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Job;

class MyJobController extends Controller
{
    public function index()
    {
        //Gate::authorize('viewAnyEmployer', Job::class);

        return view('my_job.index');
    }

    public function create()
    {
        Gate::authorize('create', Job::class);


    }

    public function store(JobRequest $request)
    {
        Gate::authorize('create', Job::class);
        // ...
    }

    public function edit(Job $myJob)
    {
        Gate::authorize('update', $myJob);
        // ...
    }

    public function update(JobRequest $request, Job $myJob)
    {
        Gate::authorize('update', $myJob);
        // ...
    }

    public function destroy(Job $myJob)
    {
        Gate::authorize('delete', $myJob);
        $myJob->delete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted.');
    }
}
