<?php

/**
 * Collection class for insert sso data
 *
 * @package    GreenwingTechnology
 * @subpackage GreenwingTechnology
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  1997-2005 The Greenwing Technology
 */

namespace Greenwing\Technology\Model\ResourceModel\InsertData;

use Greenwing\Technology\Model\InsertData as ModelInsertData;
use Greenwing\Technology\Model\ResourceModel\InsertData as ResourceInsertData;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Function constructor
     */
    public function _construct()
    {
        $this->_init(ModelInsertData::class, ResourceInsertData::class);
    }
}
