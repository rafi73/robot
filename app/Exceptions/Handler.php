<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof ValidationException && $request->wantsJson() )
        {
            return response()->json([ 'error' => $exception->errors()],  422);
        }

        if($exception instanceof AuthenticationException && $request->wantsJson() )
        {
            return response()->json([ 'error' => $exception->getMessage()],  401);
        }

        if($exception instanceof UnauthorizedHttpException && $request->wantsJson() )
        {
            return response()->json([ 'error' => $exception->getMessage()],  401);
        }
        
        if ($request->wantsJson()) 
        {
            //return response()->json([ 'error' => $exception], 422);
            return response()->json([ 'error' => $exception->getMessage()], $exception->getCode());
        }
        return parent::render($request, $exception);
    }
}
