<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Application\ApplicationFactory getFactory()
 */
class HomeController extends AbstractController
{

    const FEATURED_PRODUCT_LIMIT = 6;

    /**
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $searchResult = $this->getFactory()
            ->getCatalogClient()
            ->getFeaturedProducts(self::FEATURED_PRODUCT_LIMIT);

        return $this->viewResponse([
            'isAjax' => (bool) $request->get('fetch'),
            'data' => $searchResult
        ]);
    }

}