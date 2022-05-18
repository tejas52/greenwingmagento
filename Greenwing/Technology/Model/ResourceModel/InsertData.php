<?php

/**
 * Class tof insert data to customer sso
 *
 * @package    GreenwingTechnology
 * @subpackage GreenwingTechnology
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  1997-2005 The Greenwing Technology
 */

namespace Greenwing\Technology\Model\ResourceModel;

class InsertData extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Function for constructur
     */
    public function _construct()
    {
        $this->_init("greenwing_customer", "id");
    }
}
