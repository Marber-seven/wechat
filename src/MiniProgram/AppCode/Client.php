<?php


namespace EasySwoole\WeChat\MiniProgram\AppCode;


use EasySwoole\WeChat\Kernel\Contracts\StreamResponseInterface;
use EasySwoole\WeChat\Kernel\Psr\StreamResponse;
use EasySwoole\WeChat\Kernel\ServiceProviders;
use EasySwoole\WeChat\MiniProgram\BaseClient;

class Client extends BaseClient
{
    /**
     * @param string $path
     * @param array $optional
     * @return StreamResponseInterface
     * @throws \EasySwoole\WeChat\Kernel\Exceptions\HttpException
     */
    public function get(string $path, array $optional = [])
    {
        $params = array_merge([
            'path' => $path,
        ], $optional);

        return $this->getStream('/wxa/getwxacode', $params);
    }

    /**
     * @param string $scene
     * @param array $optional
     * @return StreamResponseInterface
     * @throws \EasySwoole\WeChat\Kernel\Exceptions\HttpException
     */
    public function getUnLimit(string $scene, array $optional = [])
    {
        $params = array_merge([
            'scene' => $scene,
        ], $optional);

        return $this->getStream('/wxa/getwxacodeunlimit', $params);
    }

    /**
     * @param string $path
     * @param int|null $width
     * @return StreamResponseInterface
     * @throws \EasySwoole\WeChat\Kernel\Exceptions\HttpException
     */
    public function getQrCode(string $path, int $width = null)
    {
        return $this->getStream('/cgi-bin/wxaapp/createwxaqrcode', compact('path', 'width'));
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @return StreamResponse
     * @throws \EasySwoole\WeChat\Kernel\Exceptions\HttpException
     */
    protected function getStream(string $endpoint, array $params)
    {
        $response = $this->getClient()
            ->setMethod('POST')
            ->setBody($this->jsonDataToStream($params))
            ->send($this->buildUrl(
                $endpoint,
                ['access_token' => $this->app[ServiceProviders::AccessToken]->getToken()])
            );

        if (false !== stripos($response->getHeaderLine('Content-disposition'), 'attachment')) {
            return new StreamResponse($response->getBody());
        }

        $this->checkResponse($response);
    }
}
