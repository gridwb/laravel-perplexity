## Overview

Laravel Perplexity is a convenient wrapper for interacting with the Perplexity API in Laravel applications.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
    - [Authentication Resource](#authentication-resource)
    - [Search Resource](#search-resource)
    - [Sonar Resource](#sonar-resource)
- [Testing](#testing)
- [Changelog](#changelog)
- [License](#license)

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

### `Authentication` Resource

#### `generate auth token`

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$tokenName = '<string>';

$response = Perplexity::authentication()->generateAuthToken($tokenName);

echo $response->authToken;
echo $response->createdAtEpochSeconds;
echo $response->tokenName;
```

#### `revoke auth token`

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$authToken = '<string>';

Perplexity::authentication()->revokeAuthToken($authToken);
```

### `Search` Resource

#### `search the web`

Search the web and retrieve relevant web page contents.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$response = Perplexity::search()->search([
    'query' => 'latest AI developments 2026',
]);

echo $response->id;
echo $response->serverTime;

foreach ($response->results as $result) {
    echo $result->title;
    echo $result->url;
    echo $result->snippet;
    echo $result->date;
    echo $result->lastUpdated;
}
```

### `Sonar` Resource

#### `completions`

Completions request:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$response = Perplexity::sonar()->createCompletion([
    'model' => 'sonar',
    'messages' => [
        [
            'role' => 'user',
            'content' => 'How many stars are there in our galaxy?',
        ],
    ],
]);

foreach ($response->choices as $choice) {
    echo $choice->message->content; // full content
    // ...
}
```

#### `completions streamed`

Streamed completions request:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;
use Gridwb\LaravelPerplexity\Responses\Sonar\ChatCompletionResponse;

$stream = Perplexity::sonar()->createStreamedCompletion([
    'model' => 'sonar',
    'messages' => [
        [
            'role' => 'user',
            'content' => 'How many stars are there in our galaxy?',
        ],
    ],
]);

/** @var ChatCompletionResponse $response */
foreach ($stream as $response) {
    foreach ($response->choices as $choice) {
        echo $choice->delta->content; // delta content
        // ...
    }
}
```

#### `create async completion`

Create an asynchronous completion request:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$response = Perplexity::sonar()->createAsyncCompletion([
    'request' => [
        'model' => 'sonar-deep-research',
        'messages' => [
            [
                'role' => 'user',
                'content' => 'How many stars are there in our galaxy?',
            ],
        ],
    ],
]);

echo $response->id;
echo $response->model;
echo $response->status->value;
// ...
```

#### `list async completions`

List asynchronous completions request:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$limit = 10;
$nextToken = '<string>';

$response = Perplexity::sonar()->listAsyncCompletions($limit, $nextToken);

foreach ($response->requests as $request) {
    echo $request->id;
    echo $request->model;
    echo $request->status->value;
    // ...
}
```

#### `get async completion`

Get a specific asynchronous completion request:

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$requestId = '<string>';

$response = Perplexity::sonar()->getAsyncCompletion($requestId);

echo $response->id;
echo $response->model;
echo $response->status->value;
// ...
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
