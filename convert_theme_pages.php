<?php

declare(strict_types=1);

$base = __DIR__.'/_template_source';
$outDir = __DIR__.'/resources/views/pages/generated';
if (! is_dir($outDir)) {
    mkdir($outDir, 0775, true);
}

$linkMap = [
    'index.html' => "{{ route('home') }}",
    'index-2.html' => "{{ route('home') }}",
    'index-3.html' => "{{ route('home') }}",
    'index-4.html' => "{{ route('home') }}",
    'about.html' => "{{ route('about') }}",
    'contact.html' => "{{ route('contact') }}",
    'gallery.html' => "{{ route('gallery') }}",
    'faq.html' => "{{ route('faq') }}",
    'team.html' => "{{ route('team.index') }}",
    'team-details.html' => "{{ route('team.index') }}",
    'news-grid.html' => "{{ route('blog.index') }}",
    'news-details.html' => "{{ route('blog.index') }}",
    'news.html' => "{{ route('blog.index') }}",
    'destination.html' => "{{ route('destinations.index') }}",
    'destination-2.html' => "{{ route('destinations.index') }}",
    'destination-details.html' => "{{ route('destinations.index') }}",
    'tour-list.html' => "{{ route('tours.index') }}",
    'tour-grid.html' => "{{ route('tours.index') }}",
    'tour-sidebar.html' => "{{ route('tours.index') }}",
    'tour-no-sidebar.html' => "{{ route('tours.index') }}",
    'tour-details.html' => "{{ route('tours.index') }}",
];

$files = [
    'index' => ['file' => 'index.html', 'title' => 'Home'],
    'about' => ['file' => 'about.html', 'title' => 'About Us'],
    'gallery' => ['file' => 'gallery.html', 'title' => 'Gallery'],
    'contact' => ['file' => 'contact.html', 'title' => 'Contact'],
    'faq' => ['file' => 'faq.html', 'title' => 'FAQ'],
    'team' => ['file' => 'team.html', 'title' => 'Team'],
    'team_details' => ['file' => 'team-details.html', 'title' => 'Team Details'],
    'news_grid' => ['file' => 'news-grid.html', 'title' => 'Travel News'],
    'news_details' => ['file' => 'news-details.html', 'title' => 'Article'],
    'tour_grid' => ['file' => 'tour-grid.html', 'title' => 'Tours'],
    'tour_details' => ['file' => 'tour-details.html', 'title' => 'Tour Details'],
    'destinations' => ['file' => 'destination.html', 'title' => 'Destinations'],
    'destination_details' => ['file' => 'destination-details.html', 'title' => 'Destination'],
];

function transformHtml(string $html, array $linkMap): string
{
    $html = preg_replace('/<script[^>]*cloudflareinsights[^>]*><\/script>/i', '', $html);
    $html = preg_replace('/<script[^>]*email-decode[^>]*><\/script>/i', '', $html);

    $html = preg_replace_callback('/\b(src|href)="assets\/([^"]+)"/', function ($m) {
        return $m[1].'="{{ asset(\'assets/'.$m[2].'\') }}"';
    }, $html);

    $html = preg_replace_callback('/url\(\s*assets\/([^)]+)\s*\)/i', function ($m) {
        $p = trim($m[1]);

        return 'url(\'{{ asset(\'assets/'.$p.'\') }}\')';
    }, $html);

    foreach ($linkMap as $old => $new) {
        $html = str_replace('href="'.$old.'"', 'href="'.$new.'"', $html);
    }

    return $html;
}

function extractMainContent(string $html): ?string
{
    if (preg_match(
        '/<div\\s+id="smooth-wrapper"\\s*>\\s*<div\\s+id="smooth-content"\\s*>(.*?)<!--\\s*Footer Section Start\\s*-->/si',
        $html,
        $m
    )) {
        return trim($m[1]);
    }

    return null;
}

foreach ($files as $key => $meta) {
    $path = $base.'/'.$meta['file'];
    if (! is_file($path)) {
        fwrite(STDERR, "Missing: $path\n");
        continue;
    }
    $raw = file_get_contents($path);
    $body = extractMainContent($raw);
    if ($body === null) {
        fwrite(STDERR, "Could not extract: {$meta['file']}\n");
        continue;
    }
    $body = transformHtml($body, $linkMap);
    $title = $meta['title'];
    $blade = <<<BLADE
@extends('layouts.roavio', ['title' => '{$title}'])

@section('content')
{$body}
@endsection

BLADE;
    file_put_contents($outDir.'/_'.$key.'.blade.php', $blade);
    echo "Wrote _{$key}.blade.php\n";
}

echo "Done.\n";
