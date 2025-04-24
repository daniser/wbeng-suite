<?php

declare(strict_types=1);

namespace TTBooking\WBEngine;

use TTBooking\Stateful\Contracts;
use TTBooking\Stateful\Query as BaseQuery;

/**
 * @template TPayload of object
 * @template TResult of Contracts\Result
 *
 * @extends BaseQuery<TPayload, TResult>
 */
class Query extends BaseQuery
{
    public function getEndpoint(): string
    {
        if ($this->getContext()['legacy'] ?? false) {
            return parent::getEndpoint().'?legacy=on';
        }

        return parent::getEndpoint();
    }

    public function getHeaders(): array
    {
        return parent::getHeaders() + ['Content-Type' => 'application/json'];
    }
}
