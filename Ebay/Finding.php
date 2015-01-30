<?php

/*
 * This file is part of the winzouEbaySDKBundle package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace winzou\Bundle\EbaySDKBundle\Ebay;

use DTS\eBaySDK\Finding\Services\FindingService;
use DTS\eBaySDK\Finding\Types\FindItemsByKeywordsRequest;

class Finding
{
    /**
     * @var FindingService
     */
    protected $service;

    /**
     * @param FindingService $service
     */
    public function __construct(FindingService $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $keywords
     * @return array|\DTS\eBaySDK\Finding\Types\SearchItem[]
     */
    public function findItemsByKeywords($keywords)
    {
        $request = new FindItemsByKeywordsRequest();
        $request->keywords = $keywords;

        $response = $this->service->findItemsByKeywords($request);

        if (!isset($response->searchResult->item)) {
            return array();
        }

        return $response->searchResult->item;
    }
}
