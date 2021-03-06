<?php
/**
 * @author @jayS-de <jens.schulze@commercetools.de>
 */

namespace Commercetools\Core\Model\CustomerGroup;

use Commercetools\Core\Model\Common\Collection;

/**
 * @package Commercetools\Core\Model\CustomerGroup
 * @link https://dev.commercetools.com/http-api-projects-customerGroups.html#customergroup
 * @method CustomerGroup current()
 * @method CustomerGroupCollection add(CustomerGroup $element)
 * @method CustomerGroup getAt($offset)
 */
class CustomerGroupCollection extends Collection
{
    protected $type = '\Commercetools\Core\Model\CustomerGroup\CustomerGroup';
}
