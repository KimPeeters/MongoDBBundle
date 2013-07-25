<?php

namespace Qwad\Bundle\MongoDBBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('qwad_mongo_db');


	    $rootNode
		    ->children()
			    ->scalarNode('server')->isRequired()->cannotBeEmpty()->end()
			    ->scalarNode('database')->defaultValue('default')->end()
		    ->end()
		;

        return $treeBuilder;
    }

}
