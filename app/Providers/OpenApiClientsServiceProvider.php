<?php

namespace App\Providers;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\ServiceProvider;
use Satubaldeeva\DesksClient\DesksClientProvider;

class OpenApiClientsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $baseUri = config('openapi-clients.desks-service-url');
        $configurationClass = DesksClientProvider::$configuration;
        $this->app->bind($this->trimFQCN($configurationClass), fn () =>
        (new $configurationClass())->setHost($baseUri));
        foreach (DesksClientProvider::$apis as $api) {
            $this->app->when($this->trimFQCN($api))
                ->needs(ClientInterface::class)
                ->give(fn () => new Client([
                    'base_uri' => $baseUri,
                ]));
        }
    }
    private function trimFQCN(string $name): string
    {
        return ltrim($name, '\\');
    }
}
