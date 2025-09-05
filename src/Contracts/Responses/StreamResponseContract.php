<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts\Responses;

use IteratorAggregate;

/**
 * @template T
 *
 * @extends IteratorAggregate<int, T>
 *
 * @internal
 */
interface StreamResponseContract extends IteratorAggregate {}
