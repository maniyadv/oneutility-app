<?php
/**
 * Created by PhpStorm.
 * User: maniyadav
 * Date: 2/3/19
 * Time: 5:21 PM
 */

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

trait APIResponseTrait
{
    /**
     * Response status code
     *
     * @var int
     */
    private $_statusCode = HTTP_STATUS_CODE_OK;

    /**
     * Response errors
     *
     * @var array
     */
    private $_errors = [];


    /**
     * Get the current status code of the response
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->_statusCode;
    }


    /**
     * Set the response status code
     *
     * @param int $statusCode
     * @return APIResponseTrait $this
     */
    public function setStatusCode($statusCode)
    {
        $this->_statusCode = $statusCode;

        return $this;
    }


    /**
     * @param string $message
     * @param string $code
     * @param string $parameter
     */
    public function addError($message, $code, $parameter = '')
    {
        $this->_errors[] = ['message' => $message, 'code' => $code, 'parameter' => $parameter];
    }


    /**
     * Send the HTTP response
     *
     * @param array $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse(array $data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }


    /**
     * Send an error response
     *
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendErrorResponse($statusCode = HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR)
    {
        return $this->setStatusCode($statusCode)->sendResponse([
            'errors' => $this->_errors,
        ]);
    }


    /**
     * Send an empty response
     *
     * @param int $statusCode
     * @return Response
     */
    public function sendEmptyResponse($statusCode = HTTP_STATUS_CODE_NO_CONTENT)
    {
        return response('', $statusCode);
    }


    /**
     * Handle general exceptions
     *
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleException(Exception $e)
    {
        Log::error($e);
        return $this->sendErrorResponse();
    }


}
