## Overview

Laravel Perplexity is a convenient wrapper for interacting with the Perplexity API in Laravel applications.

## Installation

1. Install the package
    ```bash
    composer require gridwb/laravel-perplexity
    ```

2. Publish the configuration file
    ```bash
    php artisan vendor:publish --tag="perplexity-config"
    ```

3. Add environment variables
    ```bash
    PERPLEXITY_API_URL=https://api.perplexity.ai
    PERPLEXITY_API_KEY=your-api-key-here
    ```

## Usage

Synchronous completions request:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$result = Perplexity::chat()->completions([
    'model'    => 'sonar',
    'messages' => [
        [
            'role'    => 'user',
            'content' => 'How many stars are there in our galaxy?',
        ],
    ],
]);

foreach ($result->choices as $choice) {
    echo $choice->message->content; // full content
}
```

Streamed completions request:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;
use Gridwb\LaravelPerplexity\Responses\Chat\CompletionResponse;

$stream = Perplexity::chat()->completionsStreamed([
    'model'    => 'sonar',
    'messages' => [
        [
            'role'    => 'user',
            'content' => 'How many stars are there in our galaxy?',
        ],
    ],
]);

/** @var CompletionResponse $response */
foreach ($stream as $response) {
    foreach ($response->choices as $choice) {
        echo $choice->delta->content; // delta content
    }
}
```

Create an asynchronous completion:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$completion = Perplexity::chat()->createAsyncCompletion([
    'request' => [
        'model'    => 'sonar-deep-research',
        'messages' => [
            [
                'role'    => 'user',
                'content' => 'How many stars are there in our galaxy?',
            ],
        ],
    ],
]);
```

List asynchronous completions:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$limit     = 10;
$nextToken = '<string>';

$completions = Perplexity::chat()->listAsyncCompletions($limit, $nextToken);
```

Get a specific asynchronous completion:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$requestId = '<string>';

$completion = Perplexity::chat()->getAsyncCompletion($requestId);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
