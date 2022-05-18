<?php

namespace Greenwing\Technology\Api\Data;

/**
 * @api
 */
interface CategoryProductLinkInterface
{
    /**
     * Functuion to set category description.
     *
     * @param               string $description
     *
     * @return              $this
     * @short_description   setCategoryDescription
     */
    public function setCategoryDescription($description);
}
