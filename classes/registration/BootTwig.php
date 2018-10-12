<?php

namespace OFFLINE\Mall\Classes\Registration;


use OFFLINE\Mall\Classes\Utils\Money;
use System\Twig\Extension as TwigExtension;
use System\Twig\Loader as TwigLoader;
use Twig_Environment;

trait BootTwig
{
    public function registerTwigEnvironment()
    {
        $this->app->singleton('mall.twig.environment', function ($app) {
            $twig = new Twig_Environment(new TwigLoader, ['auto_reload' => true]);
            $twig->addExtension(new TwigExtension);

            return $twig;
        });
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'money' => function (...$args) {
                    return app(Money::class)->format(...$args);
                },
            ],
        ];
    }
}