<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

        /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

        if($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ||
            $exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException ||
            $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){
            $error = [
                'message'=> $exception->getMessage(),
                'type'   => \get_class($exception),
                'url'    => $request->url(),
                'method' => $request->method(),
                'data'   => $request->all(),
            ];

            $message = $exception->getStatusCode().' : ' . $error['url'] . "\n" . \json_encode($error, JSON_PRETTY_PRINT);

            Log::debug($message);
        }
        return parent::render($request, $exception);
    }
}
