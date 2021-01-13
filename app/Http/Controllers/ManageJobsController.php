<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ManageJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('admin.jobs.overview', [
           'jobs' => JobModel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
           'jobtitle' => ['required', 'string'],
           'jobdesc' => ['required', 'string'],
           'jobreq' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $job = new JobModel();
            $job->title = $request->jobtitle;
            $job->description = strval($request->jobdesc);
            $job->requirements = strval($request->jobreq);
            $job->enabled = 1;
            $job->save();

            return Redirect::back()->with('success', 'Vacature is succesvol aangemaakt!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        return view('admin.jobs.edit', [
           'job' => JobModel::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'jobtitle' => ['required', 'string'],
            'jobdesc' => ['required', 'string'],
            'jobreq' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $job = JobModel::find($id);
            $job->title = $request->jobtitle;
            $job->description = $request->jobdesc;
            $job->requirements = $request->jobreq;
            $job->enabled = $request->jobstatus;
            $job->save();

            return Redirect::back()->with('success', 'Vacature is bijgewerkt!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        JobModel::destroy($id);
        return Redirect::back()->with('success', 'Vacature is succesvol verwijderd!');
    }
}
