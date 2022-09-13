<?php

namespace App\Exceptions;

use App\Consts\StatusCodeConst;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $e, Request $request) {
            if ($request->ajax()) {
                //Log出力用のメソッドを記入
                if ($this->isHttpException($e)) {
                    $message = $e->getMessage();
                    return response()->json([
                        'message' => $message
                    ], $e->getStatusCode());
                } elseif ($e instanceof ValidationException) {
                    return response()->json([
                        'message' => '指定されたデータは無効でした。',
                        'errors' => $e->errors(),
                    ], $e->status);
                } else {
                    return response()->json([
                        'message' => 'アプリケーション内部で問題が発生しました。'
                    ], 500);
                }
            }
        });
    }
}
