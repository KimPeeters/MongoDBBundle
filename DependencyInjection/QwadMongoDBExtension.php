<?php

namespace Qwad\Bundle\MongoDBBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class QwadMongoDBExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

	    if (!isset($config['server'])) {
		    throw new \InvalidArgumentException(
			    'The "server" option must be set'
		    );
	    }
	    $container->setParameter(
		    'qwad_mongo_db.server',
		    $config['server']
	    );


	    if (!isset($config['database'])) {
		    throw new \InvalidArgumentException(
			    'The "database" option must be set'
		    );
	    }
	    $container->setParameter(
		    'qwad_mongo_db.database',
		    $config['database']
	    );

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
