<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return \view('admin.jobs.reactions', [
           'reactions' => DB::table('job_reactions')->get()
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
        $existed_row = DB::table('job_reactions')->where([
            'user' => Auth::id(),
            'job' => $request->jobid
        ])->get();
        if (count($existed_row) >= 1) return Redirect::to('/jobs')->with('error', 'Je hebt al op deze vacature gereageerd!');

        DB::table('job_reactions')->insert([
            'user' => Auth::id(),
            'job' => $request->jobid,
            'extra' => $request->jobaddon,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return Redirect::to('/jobs')->with('success', 'Je antwoord op deze vacature is succesvol verstuurd!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show(int $id)
    {
        return view('jobs.react', [
           'job' => JobModel::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        return \view('admin.jobs.reaction', [
            'reaction' => DB::table('job_reactions')->where('id', $id)->get()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        DB::table('job_reactions')->delete($id);
        return Redirect::to('/admin/jobs/reaction')->with('success', 'Reactie op vacature is verwijderd!');
    }
}
