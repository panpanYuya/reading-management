<?php

namespace App\Http\Controllers\User;

use App\Consts\StatusCodeConst;
use App\Http\Controllers\Controller;
use App\Models\UserAuth;
use Illuminate\Support\Facades\Auth;
use Exception;

class DeleteUserController extends Controller
{
    /**
     * 解約画面を表示する機能
     *
     * @return view
     */
    public function cancell(){
        $userId = Auth::id();
        return view('user.delete.confirm', compact('userId'));
    }


    public function delete(){
        try{
            $userAuth = UserAuth::find(Auth::id());
            $userAuth->delete();
        } catch (Exception $e) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM);
        }
        return view('user.delete.complete');
    }
}
