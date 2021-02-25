<?php

namespace Kapouet\Klaro\Http\Controllers;

class AssetsController
{
    /**
     * @param string $file
     *
     * @return \Illuminate\Http\Response|mixed|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function js(string $file)
    {
        return $this->pretendResponseIsFile(__DIR__ . "/../../../dist/js/{$file}", 'application/javascript');
    }

    /**
     * @param string $file
     *
     * @return \Illuminate\Http\Response|mixed|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function css(string $file)
    {
        return $this->pretendResponseIsFile(__DIR__ . "/../../../dist/css/{$file}", 'text/css');
    }

    /**
     * @param string $file
     * @param string $mimeType
     *
     * @return \Illuminate\Http\Response|mixed|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function pretendResponseIsFile(string $file, string $mimeType)
    {
        $expires = strtotime('+1 year');
        $lastModified = filemtime($file);
        $cacheControl = 'public, max-age=31536000';

        if ($this->matchesCache($lastModified)) {
            return response()->make('', 304, [
                'Expires' => $this->httpDate($expires),
                'Cache-Control' => $cacheControl,
            ]);
        }

        return response()->file($file, [
            'Content-Type' => "$mimeType; charset=utf-8",
            'Expires' => $this->httpDate($expires),
            'Cache-Control' => $cacheControl,
            'Last-Modified' => $this->httpDate($lastModified),
        ]);
    }

    protected function matchesCache(int $lastModified): bool
    {
        $ifModifiedSince = $_SERVER['HTTP_IF_MODIFIED_SINCE'] ?? '';

        return @strtotime($ifModifiedSince) === $lastModified;
    }

    protected function httpDate(int $timestamp): string
    {
        return sprintf('%s GMT', gmdate('D, d M Y H:i:s', $timestamp));
    }
}
