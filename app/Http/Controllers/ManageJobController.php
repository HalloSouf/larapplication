<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ManageJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return \view('admin.jobs.overview', [
            'jobs' => Jobs::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.jobs.create');
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
            'jobreq' => ['required', 'string'],
            'jobid' => ['required', 'string'],
            'jobsalary' => ['required', 'string'],
            'jobhours' => ['required', 'string'],
            'jobdate' => ['required', 'string']
        ]);

        $cquestions = array_slice($request->all(), 8);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $job = new Jobs();
            $job->title = $request->jobtitle;
            $job->description = strval($request->jobdesc);
            $job->requirements = strval($request->jobreq);
            $job->jobnumber = $request->jobid;
            $job->hours = $request->jobhours;
            $job->salary = $request->jobsalary;
            $job->end_date = $request->jobdate;
            $job->enabled = 1;
            $job->save();

            foreach ($cquestions as $cquestion) {
                DB::table('questions')->insert([
                    'job' => $job->id,
                    'question' => $cquestion
                ]);
            }

            return Redirect::back()->with('success', 'Vacature is succesvol aangemaakt!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        $job = Jobs::find($id);
        if ($job == null) abort(404);

        return \view('admin.jobs.edit', [
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'jobtitle' => ['required', 'string'],
            'jobdesc' => ['required', 'string'],
            'jobreq' => ['required', 'string'],
            'jobid' => ['required', 'string'],
            'jobsalary' => ['required', 'string'],
            'jobhours' => ['required', 'string'],
            'jobdate' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $job = Jobs::find($id);
            $job->title = $request->jobtitle;
            $job->description = strval($request->jobdesc);
            $job->requirements = strval($request->jobreq);
            $job->jobnumber = $request->jobid;
            $job->hours = $request->jobhours;
            $job->salary = $request->jobsalary;
            $job->end_date = $request->jobdate;
            $job->enabled = $request->jobstatus;
            $job->save();

            return Redirect::to('/admin/jobs/overview')->with('success', 'Vacature is succesvol bijgewerkt!');
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
        Jobs::destroy($id);
        Db::table('questions')->where(['job' => $id])->delete();
        $reactions = DB::table('job_reactions')->where(['job' => $id])->get();
        foreach ($reactions as $reaction) {
            DB::table('reactions')->where(['reaction' => $reaction->id])->delete();
        }
        DB::table('job_reactions')->where(['job' => $id])->delete();
        return Redirect::back()->with('success', 'Vacature is succesvol verwijderd!');
    }
}
