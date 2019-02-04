<?php

namespace App\Exceptions;

use App\Traits\APIRequestTrait;
use App\Traits\APIResponseTrait;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{

    use APIResponseTrait, APIRequestTrait;

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
        Log::error($exception);

        if($this->isApiCall($request)) {
            $this->addError($exception->getMessage(), HTTP_STATUS_CODE_UNPROCESSABLE_ENTITY);
            return $this->sendErrorResponse(HTTP_STATUS_CODE_UNPROCESSABLE_ENTITY);
        } else {
            return parent::render($request, $exception);
        }

    }
}
