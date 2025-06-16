<?php

declare(strict_types=1);

namespace TTBooking\WBEngine;

use TTBooking\Stateful\Contracts\QueryPayload;
use TTBooking\Stateful\Query as BaseQuery;

/**
 * @template TQueryPayload of QueryPayload
 *
 * @extends BaseQuery<TQueryPayload>
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

    /**
     * @return array{context: array<string, mixed>, parameters: QueryPayload}
     */
    public function getBody(): array
    {
        return [
            'context' => $this->getContext(),
            'parameters' => $this->getPayload(),
        ];
    }
}
