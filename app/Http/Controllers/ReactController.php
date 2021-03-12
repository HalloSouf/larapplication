<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Reactions;
use App\Models\User;
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
        return \view('admin.reactions.index', [
            'reactions' => DB::table('job_reactions')->where(['passed' => null])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function store(Request $request, $id): RedirectResponse
    {
        $existed_row = DB::table('job_reactions')->where(['user' => Auth::id(), 'job' => $id])->get();
        if (count($existed_row) >= 1) return Redirect::to('/jobs')->with('error', 'Je hebt al gereageerd op deze vacature!');

        $questionresponds = array_slice($request->all(), 1);

        $reactionid = DB::table('job_reactions')->insertGetId([
            'user' => Auth::id(),
            'job' => $id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        foreach ($questionresponds as $key => $qrespond) {
            $reaction = new Reactions();
            $reaction->reaction = $reactionid;
            $reaction->question = explode('joba', $key)[1];
            $reaction->answer = $qrespond;
            $reaction->save();
        }

        return Redirect::to('/jobs')->with('success', 'Je antwoord is succesvol opgestuurd');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show(int $id)
    {
        $job = Jobs::find($id);
        if ($job == null || $job->enabled == 0) abort(404);

        return view('jobs.react', [
            'job' => $job,
            'questions' => DB::table('questions')->where('job', $id)->get()
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
        $reaction = DB::table('job_reactions')->where(['id' => $id])->get()->first();
        if ($reaction == null) abort(404);

        $answers = DB::table('reactions')->where(['reaction' => $id])->get();
        $questionrespond = array();
        foreach ($answers as $answer) {
            array_push($questionrespond, array (
                'question' => DB::table('questions')->where('id', $answer->question)->get()->first()->question,
                'answer' => $answer
            ));
        }

        return \view('admin.reactions.show', [
            'reaction' => $reaction,
            'answers' => $questionrespond,
            'user' => User::find($reaction->user),
            'job' => Jobs::find($reaction->job)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        DB::table('job_reactions')->where(['id' => $id])->delete();
        DB::table('reactions')->where(['reaction' => $id])->delete();
        return Redirect::to('/admin')->with('success', 'Reactie is verwijderd!');
    }

    /**
     * Approve reaction
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function approve(int $id): RedirectResponse
    {
        DB::table('job_reactions')->where(['id' => $id])->update(['passed' => true]);
        return Redirect::back()->with('success', 'Reactie is geaccepteerd!');
    }

    /**
     * Decline reaction
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function decline(int $id): RedirectResponse
    {
        DB::table('job_reactions')->where(['id' => $id])->update(['passed' => false]);
        return Redirect::back()->with('error', 'Reactie is geweigerd!');
    }

    /**
     * Archive
     *
     * @return Application|Factory|View
     */
    public function archive()
    {
        return \view('admin.reactions.archive', [
            'reactions' => DB::table('job_reactions')->where(['passed' => 1])->orWhere(['passed' => 0])->get()
        ]);
    }
}
