<?php

/**
 *
 * @package    GreenwingTechnology
 * @subpackage GreenwingTechnology
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  1997-2005 The Greenwing Technology
 */

namespace Greenwing\Technology\Model;

use Greenwing\Technology\Model\ResourceModel\InsertData as ResourceInsertData;

class InsertData extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Function for constructure
     */
    public function _construct()
    {
        $this->_init(ResourceInsertData::class);
    }
}
