<?php

namespace App\Services;

class ContentSanitizer
{
    /**
     * Allowed Editor.js block types
     */
    protected array $allowedBlockTypes = [
        'header',
        'paragraph',
        'list',
        'quote',
        'code',
        'table',
        'image',
        'embed',
    ];

    /**
     * Sanitize Editor.js content JSON
     */
    public function sanitize(array $contentJson): array
    {
        if (!isset($contentJson['blocks']) || !is_array($contentJson['blocks'])) {
            return ['blocks' => []];
        }

        $sanitizedBlocks = [];

        foreach ($contentJson['blocks'] as $block) {
            if (!isset($block['type']) || !in_array($block['type'], $this->allowedBlockTypes)) {
                // Skip disallowed block types
                continue;
            }

            $sanitizedBlock = $this->sanitizeBlock($block);

            if ($sanitizedBlock) {
                $sanitizedBlocks[] = $sanitizedBlock;
            }
        }

        return [
            'blocks' => $sanitizedBlocks,
            'version' => $contentJson['version'] ?? '2.29.1',
        ];
    }

    /**
     * Sanitize individual block based on type
     */
    protected function sanitizeBlock(array $block): ?array
    {
        $type = $block['type'];

        return match ($type) {
            'header' => $this->sanitizeHeader($block),
            'paragraph' => $this->sanitizeParagraph($block),
            'list' => $this->sanitizeList($block),
            'quote' => $this->sanitizeQuote($block),
            'code' => $this->sanitizeCode($block),
            'table' => $this->sanitizeTable($block),
            'image' => $this->sanitizeImage($block),
            'embed' => $this->sanitizeEmbed($block),
            default => null,
        };
    }

    protected function sanitizeHeader(array $block): array
    {
        return [
            'type' => 'header',
            'data' => [
                'text' => $this->sanitizeText($block['data']['text'] ?? ''),
                'level' => min(max((int)($block['data']['level'] ?? 2), 1), 6),
            ],
        ];
    }

    protected function sanitizeParagraph(array $block): array
    {
        return [
            'type' => 'paragraph',
            'data' => [
                'text' => $this->sanitizeText($block['data']['text'] ?? ''),
            ],
        ];
    }

    protected function sanitizeList(array $block): array
    {
        $items = $block['data']['items'] ?? [];

        return [
            'type' => 'list',
            'data' => [
                'style' => in_array($block['data']['style'] ?? 'unordered', ['ordered', 'unordered'])
                    ? $block['data']['style']
                    : 'unordered',
                'items' => array_map(fn($item) => $this->sanitizeText($item), $items),
            ],
        ];
    }

    protected function sanitizeQuote(array $block): array
    {
        return [
            'type' => 'quote',
            'data' => [
                'text' => $this->sanitizeText($block['data']['text'] ?? ''),
                'caption' => $this->sanitizeText($block['data']['caption'] ?? ''),
                'alignment' => in_array($block['data']['alignment'] ?? 'left', ['left', 'center'])
                    ? $block['data']['alignment']
                    : 'left',
            ],
        ];
    }

    protected function sanitizeCode(array $block): array
    {
        return [
            'type' => 'code',
            'data' => [
                'code' => $block['data']['code'] ?? '', // Code is not sanitized, only stored
            ],
        ];
    }

    protected function sanitizeTable(array $block): array
    {
        $content = $block['data']['content'] ?? [];

        return [
            'type' => 'table',
            'data' => [
                'withHeadings' => (bool)($block['data']['withHeadings'] ?? false),
                'content' => array_map(function ($row) {
                    return array_map(fn($cell) => $this->sanitizeText($cell), $row);
                }, $content),
            ],
        ];
    }

    protected function sanitizeImage(array $block): array
    {
        $file = $block['data']['file'] ?? [];

        return [
            'type' => 'image',
            'data' => [
                'file' => [
                    'url' => $this->sanitizeUrl($file['url'] ?? ''),
                ],
                'caption' => $this->sanitizeText($block['data']['caption'] ?? ''),
                'withBorder' => (bool)($block['data']['withBorder'] ?? false),
                'withBackground' => (bool)($block['data']['withBackground'] ?? false),
                'stretched' => (bool)($block['data']['stretched'] ?? false),
            ],
        ];
    }

    protected function sanitizeEmbed(array $block): array
    {
        $allowedServices = ['youtube', 'vimeo', 'twitter', 'instagram'];
        $service = $block['data']['service'] ?? '';

        if (!in_array($service, $allowedServices)) {
            return ['type' => 'paragraph', 'data' => ['text' => 'Embed not allowed']];
        }

        return [
            'type' => 'embed',
            'data' => [
                'service' => $service,
                'source' => $this->sanitizeUrl($block['data']['source'] ?? ''),
                'embed' => $this->sanitizeUrl($block['data']['embed'] ?? ''),
                'width' => (int)($block['data']['width'] ?? 600),
                'height' => (int)($block['data']['height'] ?? 300),
                'caption' => $this->sanitizeText($block['data']['caption'] ?? ''),
            ],
        ];
    }

    /**
     * Sanitize text content - strip all HTML tags except basic formatting
     */
    protected function sanitizeText(string $text): string
    {
        // Strip all HTML tags
        return strip_tags($text);
    }

    /**
     * Sanitize URLs
     */
    protected function sanitizeUrl(string $url): string
    {
        // Basic URL validation
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return '';
        }

        // Only allow http and https protocols
        $parsed = parse_url($url);
        if (!isset($parsed['scheme']) || !in_array($parsed['scheme'], ['http', 'https'])) {
            return '';
        }

        return $url;
    }
}
