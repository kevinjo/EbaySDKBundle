<?php

/*
 * This file is part of the winzouEbaySDKBundle package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace winzou\Bundle\EbaySDKBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use DTS\eBaySDK\Constants\GlobalIds;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder
            ->root('winzou_ebay_sdk')
            ->children()
                ->scalarNode('app_id')->isRequired()->end()
                ->scalarNode('global_id')->defaultValue(GlobalIds::US)->end()
                ->booleanNode('sandbox')->defaultFalse()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
