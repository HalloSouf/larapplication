<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('jobs.index', [
            'jobs' => Jobs::all()->where('enabled', 1)->where('end_date', '>=', now())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function show(int $id)
    {
        $job = Jobs::find($id);
        if ($job == null || $job->enabled == 0) abort(404);

        return \view('jobs.show', [
            'job' => $job
        ]);
    }
}
