<?php


namespace EasySwoole\WeChat\OfficialAccount\Server;


use EasySwoole\WeChat\Kernel\Contracts\RequestMessageInterface;
use EasySwoole\WeChat\Kernel\Messages\Message;
use EasySwoole\WeChat\Kernel\ServerGuard;
use Psr\Http\Message\ServerRequestInterface;

class Guard extends ServerGuard
{
    /**
     * @param ServerRequestInterface $request
     * @return bool
     */
    public function isValidateRequest(ServerRequestInterface $request): bool
    {
        return isset($request->getQueryParams()['echostr']);
    }

    /**
     * @param array $message
     * @return RequestMessageInterface
     */
    protected function buildRequestMessage(array $message): RequestMessageInterface
    {
        return new class($message) extends Message implements RequestMessageInterface {
            public function getType(): string
            {
                return $this->get('MsgType');
            }

            public function getId(): ?int
            {
                return $this->get('MsgId');
            }

            public function getToUserName(): ?string
            {
                return $this->get('ToUserName');
            }

            public function getFromUserName(): ?string
            {
                return $this->get('FromUserName');
            }

            public function getCreateTime(): ?int
            {
                return $this->get('CreateTime');
            }

            public function toXmlArray(): array
            {
                return $this->all();
            }
        };
    }
}
