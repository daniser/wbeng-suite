<?php

declare(strict_types=1);

namespace TTBooking\WBEngine;

use TTBooking\UniQuery\Query as BaseQuery;

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
