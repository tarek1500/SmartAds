<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserActivationController extends Controller
{
    public function userActivation($token)
    {
        $sql = DB::table('user_activations')->where('token', $token);
        if ($sql->count() > 0) {
            $user = User::findOrFail($sql->first()->userId);
            $user->confirmed = true;
            $user->save();
            $sql->delete();
            return response()->json([
          'success' => true
        ]);
        }
        abort(404);
    }
}
