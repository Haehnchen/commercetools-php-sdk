<?php
/**
 * @author @jayS-de <jens.schulze@commercetools.de>
 */

namespace Commercetools\Core\Model\ProductDiscount;

use Commercetools\Core\Model\Common\Collection;

/**
 * @package Commercetools\Core\Model\ProductDiscount
 * @link https://dev.commercetools.com/http-api-projects-productDiscounts.html#product-discount
 * @method ProductDiscount current()
 * @method ProductDiscountCollection add(ProductDiscount $element)
 * @method ProductDiscount getAt($offset)
 */
class ProductDiscountCollection extends Collection
{
    protected $type = '\Commercetools\Core\Model\ProductDiscount\ProductDiscount';
}