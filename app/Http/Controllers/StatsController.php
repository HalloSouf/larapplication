<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $waiting = DB::table('job_reactions')->where(['passed' => null])->get();
        $passed = DB::table('job_reactions')->where(['passed' => true])->get();
        $failed = DB::table('job_reactions')->where(['passed' => false])->get();
        $total = DB::table('job_reactions')->get();

        $perjobstats = array();
        $jobs = Jobs::all();
        foreach ($jobs as $job) {
            array_push($perjobstats, array(
                'id' => $job->id,
                'declined' => DB::table('job_reactions')->where(['passed' => false])->where(['job' => $job->id])->get(),
                'accepted' => DB::table('job_reactions')->where(['passed' => true])->where(['job' => $job->id])->get(),
                'waiting' => DB::table('job_reactions')->where(['passed' => null])->where(['job' => $job->id])->get()
            ));
        }

        return view('admin.statistics', [
            'waiting' => $waiting,
            'passed' => $passed,
            'failed' => $failed,
            'total' => $total,
            'perjobstats' => $perjobstats
        ]);
    }
}
