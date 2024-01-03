<?php

namespace ContainerA3Q5oq7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRideBikeCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.App\Command\RideBikeCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.App\\Command\\RideBikeCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('rideBike', [], 'Take your bike for a ride!', false, #[\Closure(name: 'App\\Command\\RideBikeCommand')] fn (): \App\Command\RideBikeCommand => ($container->privates['App\\Command\\RideBikeCommand'] ?? $container->load('getRideBikeCommandService')));
    }
}
