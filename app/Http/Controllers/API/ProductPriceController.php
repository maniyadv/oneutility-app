<?php

namespace App\Http\Controllers\API;

use App\Http\Transformers\API\ProductPriceTransformer;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\APIResponseTrait;

class ProductPriceController extends Controller
{
    use APIResponseTrait;

    public function index(Request $request) {

        $providerName = $request->get('provider_name');
        $productName  = $request->get('product_name');
        $variation    = $request->get('product_variation', DEFAULT_PRICE_VARIATION);

        $provider = Provider::where('name', 'like', "%$providerName%")->first();

        if ($provider) {
            $product = $provider->getProduct($productName);

            if ($product) {
                $productPrice = $product->getPrice($variation);

                if ($productPrice) {
                    $transformer = new ProductPriceTransformer();
                    $response    = $transformer->transform($productPrice);

                    return $this->sendResponse(['price' => $response]);
                }
            }
        }

        $this->addError(trans('api.no-valid-record-found'), HTTP_STATUS_CODE_BAD_REQUEST);
        return $this->sendErrorResponse();
    }
}
