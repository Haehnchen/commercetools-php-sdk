<?php
/**
 * @author @jayS-de <jens.schulze@commercetools.de>
 */

namespace Commercetools\Core\Model\Product;

use Commercetools\Core\Model\Common\JsonObject;

/**
 * @package Commercetools\Core\Model\Product
 * @link https://dev.commercetools.com/http-api-projects-products.html#productcatalogdata
 * @method bool getPublished()
 * @method ProductCatalogData setPublished(bool $published = null)
 * @method ProductData getCurrent()
 * @method ProductCatalogData setCurrent(ProductData $current = null)
 * @method ProductData getStaged()
 * @method ProductCatalogData setStaged(ProductData $staged = null)
 * @method bool getHasStagedChanges()
 * @method ProductCatalogData setHasStagedChanges(bool $hasStagedChanges = null)
 */
class ProductCatalogData extends JsonObject
{
    public function fieldDefinitions()
    {
        return [
            'published' => [static::TYPE => 'bool'],
            'current' => [static::TYPE => '\Commercetools\Core\Model\Product\ProductData'],
            'staged' => [static::TYPE => '\Commercetools\Core\Model\Product\ProductData'],
            'hasStagedChanges' => [static::TYPE => 'bool'],
        ];
    }
}
