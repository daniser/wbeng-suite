<?php

declare(strict_types=1);

namespace TTBooking\WBEngine;

use Illuminate\Http\Request;
use TTBooking\Stateful\Service as BaseService;
use TTBooking\WBEngine\DTO\CreateBooking;
use TTBooking\WBEngine\DTO\SearchFlights;
use TTBooking\WBEngine\DTO\SelectFlight;
use TTBooking\WBEngine\Http\Requests\SearchRequest;
use TTBooking\WBEngine\Http\Requests\SelectRequest;

use function TTBooking\WBEngine\Builders\book;
use function TTBooking\WBEngine\Builders\choose;
use function TTBooking\WBEngine\Builders\fly;

class Service extends BaseService
{
    /**
     * @return Query<SearchFlights>
     */
    public function newSearchQuery(SearchRequest $request): Query
    {
        /** @var Query<SearchFlights> */
        return fly()->from($request->from)->to($request->to)->on($request->date);
    }

    /**
     * @return Query<SelectFlight>
     */
    public function newSelectQuery(SelectRequest $request): Query
    {
        /** @var Query<SelectFlight> */
        return choose();
    }

    /**
     * @return Query<CreateBooking>
     */
    public function newBookQuery(Request $request): Query
    {
        /** @var Query<SelectFlight> */
        return book();
    }
}
