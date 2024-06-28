<?php

declare(strict_types=1);

namespace Ydg\PangolinSdk;

use Ydg\FoudationSdk\ServiceContainer;

/**
 * @property Common\Common $common
 * @property Product\Product $product
 * @property Live\Live $live
 * @property Order\Order $order
 * @property Life\Life $life
 */
class Pangolin extends ServiceContainer
{
    protected $providers = [
        Common\ServiceProvider::class,
        Product\ServiceProvider::class,
        Live\ServiceProvider::class,
        Order\ServiceProvider::class,
        Life\ServiceProvider::class,
    ];
}
