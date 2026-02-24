<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Agent\OutputItem;

enum Type: string
{
    case Message = 'message';
    case SearchResults = 'search_results';
    case FetchUrlResults = 'fetch_url_results';
    case FunctionCall = 'function_call';
}
