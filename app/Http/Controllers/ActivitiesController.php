<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\User;

use Illuminate\Support\Facades\Log;

class ActivitiesController extends Controller
{
    public function getActivities(Request $request)
    {
    	$activities = Activity::all();
    	return view('welcome')->with('activities',$activities);
    }

    public function add(Request $request)
    {
    	$user = User::find($request->user_id);

    	$user->activities()->attach($request->activity_id,['errors' => $request->errors, 'madeItems' => 13]);

        return response()->json([
            'ok' => 'Tu progreso ha sido guardado con éxito.'
        ]);
    }
}
