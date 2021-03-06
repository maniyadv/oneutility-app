<?php
/**
 * Created by PhpStorm.
 * User: maniyadav
 * Date: 2/3/19
 * Time: 11:26 PM
 *
 * Controller class for Product Prices
 *
 */

namespace App\Http\Controllers\API;

use App\Http\Requests\API\ProductPriceRequest;
use App\Http\Requests\API\ProductPriceUpdateRequest;
use App\Http\Transformers\API\ProductPriceTransformer;
use App\Provider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\APIResponseTrait;
use Illuminate\Support\Facades\Log;


class ProductPriceController extends Controller
{
    use APIResponseTrait;


    /**
     * Return price for a product
     * Returns price for both type of provider (Broadband, Energy)
     * Energy Provider requires product_variation field in input
     *
     * If product_variation is not set code will find price based on
     * DEFAULT_PRICE_VARIATION (none) which is set for Broadband Providers
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ProductPriceRequest $request) {

        try {
            $providerName = $request->get('provider_name');
            $productName  = $request->get('product_name');
            $variation    = $request->get('product_variation', DEFAULT_PRICE_VARIATION);

            $productPrice = $this->getProductPrice($providerName, $productName, $variation);

            if ($productPrice) {
                $transformer = new ProductPriceTransformer();
                $response    = $transformer->transform($productPrice);

                return $this->sendResponse(['price' => $response]);
            }

            $this->addError(trans('api.no-valid-record-found'), HTTP_STATUS_CODE_BAD_REQUEST);
            return $this->sendErrorResponse(HTTP_STATUS_CODE_BAD_REQUEST);

        } catch (ModelNotFoundException $exception) {
            Log::error($exception);
            return $this->handleException($exception);
        } catch (\Exception $exception) {
            Log::error($exception);
            return $this->handleException($exception);
        }
    }


    /**
     * Update price for Both Brodband and Energy providers
     * In case of Broadband Provider skip product_variation in input
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Support\Facades\Response
     */
    public function update(ProductPriceUpdateRequest $request) {
        try {
            $providerName = $request->get('provider_name');
            $productName  = $request->get('product_name');
            $variation    = $request->get('product_variation', DEFAULT_PRICE_VARIATION);
            $newPrice     = $request->get('new_price');

            $productPrice = $this->getProductPrice($providerName, $productName, $variation);

            if ($productPrice) {
                $productPrice->price = $newPrice;
                $productPrice->save();
                return $this->sendSuccessResponse(trans('api.price-update-successful'));
            }

            $this->addError(trans('api.no-valid-record-found'), HTTP_STATUS_CODE_BAD_REQUEST);
            return $this->sendErrorResponse(HTTP_STATUS_CODE_BAD_REQUEST);

        } catch (ModelNotFoundException $exception) {
            Log::error($exception);
            return $this->handleException($exception);
        } catch (\Exception $exception) {
            Log::error($exception);
            return $this->handleException($exception);
        }
    }


    /**
     * Get ProductPrice model
     * @param $providerName
     * @param $productName
     * @param string $variation
     * @return null
     */
    public function getProductPrice($providerName, $productName, $variation) {
        $provider = Provider::where('name', 'like', "%$providerName%")->first();

        if ($provider) {
            $product = $provider->getProduct($productName);

            if ($product) {

                if (empty($variation)) $variation = DEFAULT_PRICE_VARIATION;

                return $product->getPrice($variation);
            }
        }
        return null;
    }
 }
