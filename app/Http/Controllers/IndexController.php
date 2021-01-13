<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $jobs = JobModel::orderBy('created_at')->take(3)->get();
        return view('index', ['jobs' => $jobs]);
    }
}
