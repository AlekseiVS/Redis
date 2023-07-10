<?php

namespace App\DependencyInjection;

use App\Infrastructure\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ActionCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $actionFactory = $container->findDefinition('App\Common\Services\ActionFactory');
        $services = $container->findTaggedServiceIds('action_factory');

        foreach ($services as $service => $tags) {
            foreach ($tags as $tag) {
                if (isset($tag['controller']) && isset($tag['action'])) {
                    $actionFactory->addMethodCall(
                'addAction',
                        [
                            $tag['controller'],
                            $tag['action'],
                            new Reference($service),
                        ]
            );
                } else {
                    throw new InvalidArgumentException(sprintf('Invalid configuration for service %s', $service));
                }
            }
        }
    }
}
