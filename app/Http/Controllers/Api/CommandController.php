<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function call(Request $request)
    {
        $command = $request->command;
        Artisan::call($command);

        return response()->json(Artisan::output());
    }
}
