<?php

namespace Spiechu\LazyPimple\Factory;

use ProxyManager\Configuration;
use ProxyManager\Factory\LazyLoadingValueHolderFactory;

class LazyLoadingValueHolderFactoryFactory
{
    /**
     * @param string|null $proxyManagerCacheDir
     *
     * @return LazyLoadingValueHolderFactory
     */
    public function getFactory($proxyManagerCacheDir = null)
    {
        $proxyConfiguration = is_null($proxyManagerCacheDir) ? null : $this->getProxyManagerConfiguration($proxyManagerCacheDir);

        $lazyLoadingFactory = new LazyLoadingValueHolderFactory($proxyConfiguration);

        if ($proxyConfiguration instanceof Configuration) {
            spl_autoload_register($proxyConfiguration->getProxyAutoloader(), true, true);
        }

        return $lazyLoadingFactory;
    }

    /**
     * @param string $proxyManagerCacheDir
     *
     * @return Configuration
     *
     * @throws \InvalidArgumentException When $proxyManagerCacheDir is not a dir
     */
    protected function getProxyManagerConfiguration($proxyManagerCacheDir)
    {
        if (!is_dir($proxyManagerCacheDir)) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a dir', $proxyManagerCacheDir));
        }

        $proxyConfiguration = new Configuration();
        $proxyConfiguration->setProxiesTargetDir($proxyManagerCacheDir);

        return $proxyConfiguration;
    }
}
