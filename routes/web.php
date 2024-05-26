<!-- routes\web.php -->
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return view('home');
});

// show
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


// Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find( $id );

    return view('jobs.show', ['job' => $job]);
});

// Store
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

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find( $id );

    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
   

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    // authorize
    // update

    $job = Job::findOrFail( $id );
    
    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);
    return redirect('/jobs/'. $job->id);
    //and persist
    // redirect
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {

    Job::findOrFail( $id )->delete();


    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
