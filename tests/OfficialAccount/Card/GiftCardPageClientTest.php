<?php


namespace EasySwoole\WeChat\Tests\OfficialAccount\Card;


use EasySwoole\WeChat\Kernel\ServiceContainer;
use EasySwoole\WeChat\OfficialAccount\Card\GiftCardPageClient;
use EasySwoole\WeChat\Tests\Mock\Message\Status;
use EasySwoole\WeChat\Tests\TestCase;
use Psr\Http\Message\ServerRequestInterface;

class GiftCardPageClientTest extends TestCase
{
    public function testAdd()
    {
        $response = $this->buildResponse(Status::CODE_OK, $this->readMockResponseJsonByFunction(__FUNCTION__));
        $app = $this->mockAccessToken(new ServiceContainer(['appId' => '123456']));
        $app = $this->mockHttpClient(function (ServerRequestInterface $request) {
            $this->assertEquals('POST', $request->getMethod());
            $this->assertEquals('/card/giftcard/page/add', $request->getUri()->getPath());
            $this->assertEquals('access_token=mock_access_token', $request->getUri()->getQuery());
        }, $response, $app);

        $params = [
            'page_title' => '礼品卡',
            'support_multi' => true,
            'banner_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
            'theme_list' => [
                [
                    'theme_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                    'title' => 'title',
                    'title_color' => '#FB966E',
                    'show_sku_title_first' => true,
                    'item_list' => [
                        [
                            'card_id' => 'pbLatjiSj_yVRH5XTb2Zsln7DNQg',
                            'title' => '焦糖拿铁',
                        ],
                        [
                            'card_id' => 'pbLatjlq75CPBR_tYCRdPlxSGlOs',
                            'title' => '焦糖拿铁',
                        ],
                    ],
                    'pic_item_list' => [
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语1',
                        ],
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语2',
                        ],
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语3',
                        ],
                    ],
                    'category_index' => 0,
                ],
                [
                    'theme_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                    'title' => 'title_lalala',
                    'title_color' => '#FB966E',
                    'item_list' => [
                        [
                            'card_id' => 'pbLatjiSj_yVRH5XTb2Zsln7DNQg',
                            'title' => '焦糖拿铁',
                        ],
                        [
                            'card_id' => 'pbLatjlq75CPBR_tYCRdPlxSGlOs',
                            'title' => '蛋糕',
                        ],
                    ],
                    'pic_item_list' => [
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语1',
                            'outer_img_id' => 'outer_img_id_1',
                        ],
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语2',
                            'outer_img_id' => 'outer_img_id_2',
                        ],
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语3',
                            'outer_img_id' => 'outer_img_id_3',
                        ],
                    ],
                    'category_index' => 1,
                ],
                [
                    'theme_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                    'title' => 'title_lalala',
                    'title_color' => '#FB966E',
                    'item_list' => [
                        [
                            'card_id' => 'pbLatjiSj_yVRH5XTb2Zsln7DNQg',
                        ],
                        [
                            'card_id' => 'pbLatjlq75CPBR_tYCRdPlxSGlOs',
                        ],
                    ],
                    'pic_item_list' => [
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语1',
                            'outer_img_id' => 'outer_img_id_1',
                        ],
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语2',
                            'outer_img_id' => 'outer_img_id_2',
                        ],
                        [
                            'background_pic_url' => 'http://mmbiz.qpic.cn/mmbiz_jpg/p98FjXy8LafBWIJsGFe7tlPvtBFxXXTPdx5cEuFMcWWsiaR1DyrN5ML3jiaVYZibovA8OrwOylUia6ywvVU6Aqboibw/0',
                            'default_gifting_msg' => '祝福语3',
                            'outer_img_id' => 'outer_img_id_3',
                        ],
                    ],
                    'is_banner' => true,
                ],
            ],
            'category_list' => [
                [
                    'title' => '主题分类一',
                ],
                [
                    'title' => '主题分类二',
                ],
            ],
            'address' => '广州市海珠区222号',
            'service_phone' => '020-12345678',
            'biz_description' => '退款指引',
            'cell_1' => [
                'title' => '申请发票',
                'url' => 'https://open.weixin.qq.com',
            ],
            'cell_2' => [
                'title' => '申请退款',
                'url' => 'https://mp.weixin.qq.com',
            ],
        ];
        $client = new GiftCardPageClient($app);
        $this->assertIsArray($client->add($params));
        $this->assertEquals($this->readMockResponseJsonByFunction(__FUNCTION__, true), $client->add($params));
    }


    public function testGet()
    {
        $response = $this->buildResponse(Status::CODE_OK, $this->readMockResponseJsonByFunction(__FUNCTION__));
        $app = $this->mockAccessToken(new ServiceContainer(['appId' => '123456']));
        $app = $this->mockHttpClient(function (ServerRequestInterface $request) {
            $this->assertEquals('POST', $request->getMethod());
            $this->assertEquals('/card/giftcard/page/get', $request->getUri()->getPath());
            $this->assertEquals('access_token=mock_access_token', $request->getUri()->getQuery());
        }, $response, $app);

        $client = new GiftCardPageClient($app);
        $this->assertIsArray($client->get("abcedfghifk=+Uasdaseq14fadkf8123h4jk"));
        $this->assertEquals($this->readMockResponseJsonByFunction(__FUNCTION__, true), $client->get("abcedfghifk=+Uasdaseq14fadkf8123h4jk"));
    }

    public function testUpdate()
    {
        $response = $this->buildResponse(Status::CODE_OK, $this->readMockResponseJsonByFunction(__FUNCTION__));
        $app = $this->mockAccessToken(new ServiceContainer(['appId' => '123456']));
        $app = $this->mockHttpClient(function (ServerRequestInterface $request) {
            $this->assertEquals('POST', $request->getMethod());
            $this->assertEquals('/card/giftcard/page/update', $request->getUri()->getPath());
            $this->assertEquals('access_token=mock_access_token', $request->getUri()->getQuery());
        }, $response, $app);

        $params = [
            'theme_pic_url' => 'http://img.com/theme_pic',
            'title' => 'title_lalala',
            'title_color' => '#FFFFFF',
            'item_list' => [
                [
                    'card_id' => 'card_id_lalala',
                ],
            ],
            'pic_item_list' => [
                [
                    'background_pic_url' => 'http://img.com/bg_pic1',
                    'default_gifting_msg' => '祝福语1',
                ],
                [
                    'background_pic_url' => 'http://img.com/bg_pic2',
                    'default_gifting_msg' => '祝福语2',
                ],
                [
                    'background_pic_url' => 'http://img.com/bg_pic3',
                    'default_gifting_msg' => '祝福语3',
                ],
            ],
        ];
        $client = new GiftCardPageClient($app);
        $this->assertTrue($client->update("abcedfghifk=+Uasdaseq14fadkf8123h4jk", "http://img.com/banner_pic", $params));
    }


    public function testList()
    {
        $response = $this->buildResponse(Status::CODE_OK, $this->readMockResponseJsonByFunction(__FUNCTION__));
        $app = $this->mockAccessToken(new ServiceContainer(['appId' => '123456']));
        $app = $this->mockHttpClient(function (ServerRequestInterface $request) {
            $this->assertEquals('POST', $request->getMethod());
            $this->assertEquals('/card/giftcard/page/batchget', $request->getUri()->getPath());
            $this->assertEquals('access_token=mock_access_token', $request->getUri()->getQuery());
        }, $response, $app);

        $client = new GiftCardPageClient($app);
        $this->assertIsArray($client->list());
        $this->assertEquals($this->readMockResponseJsonByFunction(__FUNCTION__, true), $client->list());
    }

    public function testSetMaintain()
    {
        $response = $this->buildResponse(Status::CODE_OK, $this->readMockResponseJsonByFunction(__FUNCTION__));
        $app = $this->mockAccessToken(new ServiceContainer(['appId' => '123456']));
        $app = $this->mockHttpClient(function (ServerRequestInterface $request) {
            $this->assertEquals('POST', $request->getMethod());
            $this->assertEquals('/card/giftcard/maintain/set', $request->getUri()->getPath());
            $this->assertEquals('access_token=mock_access_token', $request->getUri()->getQuery());
        }, $response, $app);

        $client = new GiftCardPageClient($app);
        $this->assertIsArray($client->setMaintain("xxxxx"));
        $this->assertEquals($this->readMockResponseJsonByFunction(__FUNCTION__, true), $client->setMaintain("xxxxx"));
    }

    protected function readMockResponseJsonByFunction(string $func, bool $jsonDecode = false)
    {
        $fileName = ucwords(preg_replace('/(.)(?=[A-Z])/u', '$1' . '_', ltrim($func, 'test'))) . '.json';
        $ret = file_get_contents(dirname(__FILE__) . '/mock_data/gift_card_page_' . $fileName);
        return $jsonDecode ? json_decode($ret, true) : $ret;
    }
}
