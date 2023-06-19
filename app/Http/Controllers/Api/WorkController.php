<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(){
        $works = Work::with('type', 'languages')->paginate(4);
        return response()->json([
            'success' => true,
            'results' => $works
        ]);
    }

    public function show($slug){
        $work = Work::with('type', 'languages')->where('slug', '=', $slug)->first();
        if($work){
            return response()->json([
                'success' => true,
                'results' => $work
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Errore'
            ]);
        }
    }
}
