<?php

/**
 * Greenwing Technology Punchout Integration
 *
 * @package    GreenwingTechnology
 * @subpackage GreenwingTechnology
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  1997-2005 The Greenwing Technology
 */

namespace Greenwing\Technology\Model;

use Greenwing\Technology\Model\ResourceModel\InsertCartData as ResourceInsertCartData;

class InsertCartData extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Function for constructure
     */
    public function _construct()
    {
        $this->_init(ResourceInsertCartData::class);
    }
}
