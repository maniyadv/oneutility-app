<?php
/**
 * Created by PhpStorm.
 * User: maniyadav
 * Date: 2/3/19
 * Time: 11:25 PM
 */

namespace App\Http\Transformers;


abstract class Transformer
{

    /**
     * Apply the transformer to a single item
     *
     * @param $item
     * @return mixed
     */
    abstract public function transform($item);

}
