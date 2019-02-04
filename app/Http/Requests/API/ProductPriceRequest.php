<?php
/**
 * Created by PhpStorm.
 * User: maniyadav
 * Date: 2/4/19
 * Time: 12:48 PM
 */

namespace App\Http\Requests\API;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Validator;

class ProductPriceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Validate input params
     * @return array
     */
    public function rules()
    {
        return [
            'provider_name'     => 'required',
            'product_name'      => 'required',
        ];
    }


    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'provider_name.required' => 'Provider name is required!',
            'product_name.required'  => 'Product name is required!'
        ];
    }

}
