<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EvaluationController extends Controller
{
    public function index() : View
    {
        return view('pages.evaluation.index');
    }
}
