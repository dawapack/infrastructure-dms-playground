<?php

declare(strict_types=1);

namespace InfrastructureDMS\Providers;

use Chassis\Framework\Providers\RoutingServiceProvider;
use InfrastructureDMS\OutboundAdapters\DemoOperationDelete;
use InfrastructureDMS\OutboundAdapters\DemoOperationDeletedEvents;
use InfrastructureDMS\OutboundAdapters\DemoOperationGetAsync;
use InfrastructureDMS\OutboundAdapters\DemoOperationGetSync;
use InfrastructureDMS\Services\DemoDeleteEventService;
use InfrastructureDMS\Services\DemoMoreService;
use InfrastructureDMS\Services\DemoService;

class MessageRoutingServiceProvider extends RoutingServiceProvider
{
    /**
     * @var array|string[]
     */
    protected array $inboundRoutes = [
        'createSomething' => [DemoService::class, 'create'],
        'getSomething' => [DemoService::class, 'get'],
        'getSomethingResponse' => [DemoMoreService::class, 'complete'],
        'deleteSomething' => [DemoService::class, 'delete'],
        'somethingDeleted' => DemoDeleteEventService::class,
    ];

    /**
     * @var array|string[]
     */
    protected array $outboundRoutes = [
        'getSomethingSync' => DemoOperationGetSync::class,
        'getSomethingAsync' => DemoOperationGetAsync::class,
        'deleteSomething' => DemoOperationDelete::class,
        'deleteSomethingEvent' => DemoOperationDeletedEvents::class,
    ];
}
