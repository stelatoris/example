<?php

namespace App\Http\Controllers;

use App\Models\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'employer_id' => 1,
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs');
    }


    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        // authorize
        // update

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
        return redirect('/jobs/' . $job->id);
        //and persist
        // redirect
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
