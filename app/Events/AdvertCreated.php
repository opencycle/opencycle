<?php

namespace Opencycle\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Opencycle\Advert;

class AdvertCreated
{
    use Dispatchable, SerializesModels;

    /**
     * The advert that was created.
     *
     * @var Advert
     */
    private $advert;

    /**
     * Create a new event instance.
     *
     * @param Advert $advert
     */
    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
    }
}
