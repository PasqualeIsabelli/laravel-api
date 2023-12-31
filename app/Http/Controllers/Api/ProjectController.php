<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['type', 'technologies'])->paginate(12);
        return response()->json($projects);
    }

    public function show($slug) {
        $projects = Project::where('slug', $slug)
            ->with(['type', 'technologies'])
            ->first();

        if (!$projects) {
            abort(404);
        }

        return response()->json($projects);
    }
}
