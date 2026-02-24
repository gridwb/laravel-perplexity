## Overview

Laravel Perplexity is a convenient wrapper for interacting with the Perplexity API in Laravel applications.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
    - [Agent Resource](#agent-resource)
    - [Authentication Resource](#authentication-resource)
    - [Embeddings Resource](#embeddings-resource)
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

### `Agent` Resource

#### `create response`

Generate a response for the provided input with optional web search and reasoning.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\MessageOutputItem;

$response = Perplexity::agent()->createResponse([
    'model' => 'openai/gpt-5.2',
    'input' => 'What are the latest developments in AI?',
    'tools' => [
        [
            'type' => 'web_search',
        ],
    ],
    'instructions' => 'You have access to a web_search tool. Use it for questions about current events, news, or recent developments. Use 1 query for simple questions. Keep queries brief: 2-5 words. NEVER ask permission to search - just search when appropriate',
]);

foreach ($response->output as $outputItem) {
    /**
     * One of the output item classes:
     * \Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\MessageOutputItem
     * \Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\SearchResultsOutputItem
     * \Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\FetchUrlResultsOutputItem
     * \Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\FunctionCallOutputItem
     */
    if ($outputItem instanceof MessageOutputItem) {
        foreach ($outputItem->content as $content) {
            echo $content->text; // full content
        }
    }
}
```

#### `create streamed response`

Generate a streamed response for the provided input with optional web search and reasoning.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamAgentResponse;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\TextDeltaEvent;

$stream = Perplexity::agent()->createStreamedResponse([
    'model' => 'openai/gpt-5.2',
    'input' => 'What are the latest developments in AI?',
    'tools' => [
        [
            'type' => 'web_search',
        ],
    ],
    'instructions' => 'You have access to a web_search tool. Use it for questions about current events, news, or recent developments. Use 1 query for simple questions. Keep queries brief: 2-5 words. NEVER ask permission to search - just search when appropriate',
]);

/** @var StreamAgentResponse $response */
foreach ($stream as $response) {
    /**
     * One of the stream event classes:
     * \Gridwb\LaravelPerplexity\Responses\Agent\ResponseCreatedEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\ResponseInProgressEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\ResponseCompletedEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\ResponseFailedEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\OutputItemAddedEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\OutputItemDoneEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\TextDeltaEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\TextDoneEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\ReasoningStartedEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\SearchQueriesEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\SearchResultsEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\FetchUrlQueriesEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\FetchUrlResultsEvent
     * \Gridwb\LaravelPerplexity\Responses\Agent\ReasoningStoppedEvent
     */
    $event = $response->event;

    if ($event instanceof TextDeltaEvent) {
        echo $event->delta; // delta content
    }
}
```

### `Authentication` Resource

#### `generate auth token`

Generates a new authentication token for API access.

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

Revokes an existing authentication token.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$authToken = '<string>';

Perplexity::authentication()->revokeAuthToken($authToken);
```

### `Embeddings` Resource

#### `create embeddings`

Generate embeddings for a list of texts. Use these embeddings for semantic search, clustering, and other machine learning applications.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$response = Perplexity::embeddings()->createEmbeddings([
    'input' => 'Scientists explore the universe driven by curiosity.',
    'model' => 'pplx-embed-v1-4b',
]);

foreach ($response->data as $embedding) {
    echo $embedding->object;
    echo $embedding->index;
    echo $embedding->embedding;
}
```

#### `create contextualized embeddings`

Generate contextualized embeddings for document chunks. Chunks from the same document share context awareness, improving retrieval quality for document-based applications.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$response = Perplexity::embeddings()->createContextualizedEmbeddings([
    'input' => [
        // Document 1: Three chunks
        [
            'Curiosity begins in childhood with endless questions about the world.',
            'As we grow, curiosity drives us to explore new ideas and challenge assumptions.',
            'Scientific breakthroughs often start with a simple curious question.',
        ],
        // Document 2: Two chunks
        [
            'The Curiosity rover explores Mars, searching for signs of ancient life.',
            'Each discovery on Mars sparks new questions about our place in the universe.',
        ],
    ],
    'model' => 'pplx-embed-context-v1-4b',
]);

foreach ($response->data as $contextualizedEmbedding) {
    echo $contextualizedEmbedding->object;
    echo $contextualizedEmbedding->index;

    foreach ($contextualizedEmbedding->data as $embedding) {
        echo $embedding->object;
        echo $embedding->index;
        echo $embedding->embedding;
    }
}
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

foreach ($response->results as $result) {
    echo $result->title;
    echo $result->url;
    echo $result->snippet;
    echo $result->date;
    echo $result->lastUpdated;
}
```

### `Sonar` Resource

#### `create chat completion`

Generate a chat completion response for the given conversation.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$response = Perplexity::sonar()->createChatCompletion([
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

#### `create streamed chat completion`

Generate a streamed chat completion response for the given conversation.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;
use Gridwb\LaravelPerplexity\Responses\Sonar\ChatCompletionResponse;

$stream = Perplexity::sonar()->createStreamedChatCompletion([
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

#### `create async chat completion`

Submit an asynchronous chat completion request.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$response = Perplexity::sonar()->createAsyncChatCompletion([
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

#### `list async chat completions`

Retrieve a list of all asynchronous chat completion requests for a given user.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$limit = 10;
$nextToken = '<string>';

$response = Perplexity::sonar()->listAsyncChatCompletions($limit, $nextToken);

foreach ($response->requests as $request) {
    echo $request->id;
    echo $request->model;
    echo $request->status->value;
    // ...
}
```

#### `get async chat completion`

Retrieve the response for a given asynchronous chat completion request.

```php
<?php

use Gridwb\LaravelPerplexity\Facades\Perplexity;

$requestId = '<string>';

$response = Perplexity::sonar()->getAsyncChatCompletion($requestId);

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
