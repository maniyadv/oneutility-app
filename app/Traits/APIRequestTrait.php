<?php
/**
 * Created by PhpStorm.
 * User: maniyadav
 * Date: 2/4/19
 * Time: 3:10 PM
 */

namespace App\Traits;


use Illuminate\Http\Request;

trait APIRequestTrait
{
    protected function isApiCall(Request $request)
    {
        return strpos($request->getUri(), '/api/v') !== false;
    }
}
