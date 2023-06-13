<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::paginate(5);
        return response()->json([
            'succes' => true,
            'results' => $projects,
        ]);
    }
    public function show($slug){
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first()->paginate(5);
        if($project){
            return response()->json([
                'succes' => true,
                'results' => $project,
            ]);
        }else{
            return response()->json([
                'succes' => false,
                'results' => 'prodotto non trovato',
            ]);
        }
    }
}
