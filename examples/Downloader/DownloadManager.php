<?php

namespace App\Downloader;

class DownloadManager
{
    public function __construct(protected string $url, protected string $filename)
    {
    }

    public function download(callable $progress): void
    {
        $fp = fopen($this->filename, 'w+');
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_NOPROGRESS, false);
        curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, function ($resource, $download_size, $downloaded, $upload_size, $uploaded) use ($progress) {
            if ($download_size > 0 && is_callable($progress)) {
                try {
                    call_user_func($progress, $downloaded, $download_size);
                }catch (\Exception $e){}
            }
        });
        curl_exec($ch);
    }
}