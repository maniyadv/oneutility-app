<?php
/**
 * Created by PhpStorm.
 * User: maniyadav
 * Date: 2/3/19
 * Time: 11:26 PM
 */

namespace App\Http\Transformers\API;


use App\Http\Transformers\Transformer;

class ProductPriceTransformer extends Transformer
{

    /**
     * Transform object data
     * @param $item
     * @return array|mixed
     */
    public function transform($item)
    {
        if (empty($item)) return [];

        return [
          'price_value' => $item->price,
          'currency'    => $item->currency,
          'variation'   => $item->variation
        ];
    }

}
