<?php

namespace Spiechu\LazyPimple\Factory;

use ProxyManager\Configuration;
use ProxyManager\Factory\LazyLoadingValueHolderFactory;

class LazyLoadingValueHolderFactoryFactory
{
    /**
     * @param null|string $proxyManagerCacheDir
     *
     * @return LazyLoadingValueHolderFactory
     */
    public function getFactory($proxyManagerCacheDir = null): LazyLoadingValueHolderFactory
    {
        $proxyConfiguration = null === $proxyManagerCacheDir ? null : $this->getProxyManagerConfiguration($proxyManagerCacheDir);

        $lazyLoadingFactory = new LazyLoadingValueHolderFactory($proxyConfiguration);

        if ($proxyConfiguration instanceof Configuration) {
            spl_autoload_register($proxyConfiguration->getProxyAutoloader(), true, true);
        }

        return $lazyLoadingFactory;
    }

    /**
     * @param string $proxyManagerCacheDir
     *
     * @throws \InvalidArgumentException When $proxyManagerCacheDir is not a dir
     *
     * @return Configuration
     */
    protected function getProxyManagerConfiguration(string $proxyManagerCacheDir): Configuration
    {
        if (!is_dir($proxyManagerCacheDir)) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a dir', $proxyManagerCacheDir));
        }

        $proxyConfiguration = new Configuration();
        $proxyConfiguration->setProxiesTargetDir($proxyManagerCacheDir);

        return $proxyConfiguration;
    }
}
