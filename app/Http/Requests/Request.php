<?php
/**
 * Created by PhpStorm.
 * User: maniyadav
 * Date: 2/4/19
 * Time: 12:51 PM
 */

namespace App\Http\Requests;


namespace App\Http\Requests;

use App\Traits\APIResponseTrait;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    use APIResponseTrait;

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Handle error response
     *
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function response(array $errors)
    {
        foreach ($errors as $code => $message) {
            $this->addError($message[0], ERROR_INVALID_PARAMETER, $code);
        }

        return $this->sendErrorResponse(HTTP_STATUS_CODE_UNPROCESSABLE_ENTITY);
    }


}
