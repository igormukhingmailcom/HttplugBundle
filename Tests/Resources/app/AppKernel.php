<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        $bundles =  [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Http\HttplugBundle\HttplugBundle(),
        ];
        
        return $bundles;
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $runtime = 'php';
        if (defined('HHVM_VERSION')) {
            $runtime = 'hhvm';
        }
        $loader->load(__DIR__.'/config/config_'.$runtime.'.yml');
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir()
    {
        return sys_get_temp_dir().'/httplug-bundle/cache';
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir()
    {
        return sys_get_temp_dir().'/httplug-bundle/logs';
    }

    /**
     * {@inheritdoc}
     */
    protected function getContainerBaseClass()
    {
        return '\PSS\SymfonyMockerContainer\DependencyInjection\MockerContainer';
    }
}
