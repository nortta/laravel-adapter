<?php

namespace Nortta\Laravel;

use Illuminate\Encryption\Encrypter;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Client\Factory;

class Nortta
{
    protected $http;

    protected $storage;

    protected $baseUrl;

    protected $path;

    protected $cipher;

    protected $ssl;

    public function __construct(Factory $http, Filesystem $storage, $config)
    {
        $this->http = $http;
        $this->storage = $storage;
        $this->baseUrl = $config['url'];
        $this->path = $config['path'];
        $this->cipher = $config['cipher'];
    }

    public function connect($key, $token)
    {
        $url = "{$this->baseUrl}/connections/{$token}";

        $data = [
            'key' => base64_encode($key),
            'url' => config('app.url'),
        ];

        return $this->http()->post($url, $data);
    }

    public function decrypt($string)
    {
        $encrypter = new Encrypter($this->key());

        return $encrypter->decrypt($string);
    }

    protected function key()
    {
        return $this->storage->get("$this->path/key");
    }

    public function generateKey()
    {
        $key = Encrypter::generateKey($this->cipher);

        if (!$this->storage->isDirectory('nortta')) {
            $this->storage->makeDirectory('nortta');
        }

        $this->storage->ensureDirectoryExists($this->path);

        $this->storage->put("$this->path/key", $key);

        return $key;
    }

    protected function http()
    {
        $http = $this->http->acceptJson();

        if (!$this->ssl) {
            $http->withoutVerifying();
        }

        return $http;
    }
}
