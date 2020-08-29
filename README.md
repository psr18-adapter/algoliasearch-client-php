# psr18-adapter/algoliasearch-client-php

## Install

Via [Composer](https://getcomposer.org/doc/00-intro.md)

```bash
composer require psr18-adapter/algoliasearch-client-php 
```

## Usage

Here's service definition that I used in combination with `algolia/search-bundle`.

If you don't use this bundle, you should manage to turn this config to PHP code on your own. Contribution for such snippet welcome. 
```xml
<service id="search.client" class="Algolia\AlgoliaSearch\SearchClient" public="true" lazy="true">
    <argument type="service">
        <service class="Algolia\AlgoliaSearch\RetryStrategy\ApiWrapper">
            <argument type="service">
                <service class="Psr18Adapter\Algolia\AlgoliaPsr18Client">
                    <argument id="httplug.client.default" type="service" />
                </service>
            </argument>
            <argument id="search.config" type="service" />
            <argument type="service">
                <service class="Algolia\AlgoliaSearch\RetryStrategy\ClusterHosts">
                    <factory class="Algolia\AlgoliaSearch\RetryStrategy\ClusterHosts" method="createFromAppId" />
                    <argument>%env(ALGOLIA_APP_ID)%</argument>
                </service>
            </argument>
        </service>
    </argument>
    <argument id="search.config" type="service" />
</service>
```

Yes, it's complicated and [attempt to make it a bit less so was rejected](https://github.com/algolia/algoliasearch-client-php/pull/596).

## Licensing

MIT license. Please see [License File](LICENSE) for more information.
