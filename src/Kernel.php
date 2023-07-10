<?php

namespace App;

use App\DependencyInjection\ActionCompilerPass;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new ActionCompilerPass());
    }

//    protected function configureContainer(ContainerConfigurator $container): void
//    {
//        $container->import('../config/{redis}*.yaml');
//    }
}
