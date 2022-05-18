<?php

/**
 * Collection to insert cart items using punchout.
 *
 * @package    GreenwingTechnology
 * @subpackage GreenwingTechnology
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  1997-2005 The Greenwing Technology
 */

namespace Greenwing\Technology\Model\ResourceModel\InsertCartData;

use Greenwing\Technology\Model\InsertCartData as ModelInsertCartData;
use Greenwing\Technology\Model\ResourceModel\InsertCartData as ResourceInsertCartData;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Function Constructure
     */
    public function _construct()
    {
        $this->_init(ModelInsertCartData::class, ResourceInsertCartData::class);
    }
}
