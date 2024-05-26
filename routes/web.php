<!-- routes\web.php -->
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find( $id );

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {

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
});

Route::get('/contact', function () {
    return view('contact');
});
