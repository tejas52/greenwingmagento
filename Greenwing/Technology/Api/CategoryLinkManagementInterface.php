<?php

namespace Greenwing\Technology\Api;
 
/**
 * @api
 */
interface CategoryLinkManagementInterface
{
    /**
     * Get products assigned to a category
     *
     * @param  int $categoryId
     *
     * @return \Greenwing\Technology\Api\Data\CategoryProductLinkInterface
     */
    public function getAssignedProducts();
}
