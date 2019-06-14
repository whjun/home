<?php
namespace app;

/**
 * 阿里短信验证码发送类
 * @author Administrator
 *
 */
use AliyunMNS\Client;
use AliyunMNS\Model\BatchSmsAttributes;
use AliyunMNS\Model\MessageAttributes;
use AliyunMNS\Requests\PublishMessageRequest;
class Sms
{
    /**
     * 阿里大鱼短信验证码发送类
     * @author Administrator
     *
     */
    public function alidayu($mobile,$code)
    {
        vendor('SmsSdk\mns-autoloader');
        vendor('SmsSdk\AliyunMNS\Client');
        vendor('SmsSdk\AliyunMNS\Topic');
        vendor('SmsSdk\AliyunMNS\Model\MailAttributes');
        vendor('SmsSdk\AliyunMNS\Model\SmsAttributes');
        vendor('SmsSdk\AliyunMNS\Model\BatchSmsAttributes');
        vendor('SmsSdk\AliyunMNS\Model\MessageAttributes');
        vendor('SmsSdk\AliyunMNS\Exception\MnsException');
        vendor('SmsSdk\AliyunMNS\Requests\PublishMessageRequest');
        /**
         * Step 1. 初始化Client
         */
        $this->endPoint = "http://1530678844828178.mns.cn-qingdao.aliyuncs.com/"; // eg. http://1234567890123456.mns.cn-shenzhen.aliyuncs.com
        $this->accessId = "LTAIdly8EFjVqt1n";
        $this->accessKey = "X34OygdcOOUpQYBgofOoV7zysfmZxC";
        $this->client = new Client($this->endPoint, $this->accessId, $this->accessKey);
        /**
         * Step 2. 获取主题引用
        */
        $topicName = "sms.topic-cn-qingdao";
        $topic = $this->client->getTopicRef($topicName);
        /**
         * Step 3. 生成SMS消息属性
        */
        // 3.1 设置发送短信的签名（SMSSignName）和模板（SMSTemplateCode）
        $batchSmsAttributes = new BatchSmsAttributes("兴福锦绣城", "SMS_95595274");
        // 3.2 （如果在短信模板中定义了参数）指定短信模板中对应参数的值
        $code1 = strval($code);
        $mobile1 = strval($mobile);
        $batchSmsAttributes->addReceiver($mobile1, array("name" => $code1));
//         $batchSmsAttributes->addReceiver("YourReceiverPhoneNumber2", array("YourSMSTemplateParamKey1" => "value1"));
        $messageAttributes = new MessageAttributes(array($batchSmsAttributes));
        /**
         * Step 4. 设置SMS消息体（必须）
         *
         * 注：目前暂时不支持消息内容为空，需要指定消息内容，不为空即可。
        */
        $messageBody = "smsmessage";
        /**
         * Step 5. 发布SMS消息
         */
        
        $request = new PublishMessageRequest($messageBody, $messageAttributes);
        $res = $topic->publishMessage($request);
        if ($res->isSucceed()){
            return true;
        }else{
            return false;
        }

    }
    /**
     * 阿里云短信验证码发送类
     * @author Administrator
     *
     */

    
    function aliyun($mobile,$code) {
        vendor('aliyunSms/aliyun-php-sdk-core/Config');
        vendor('aliyunSms/Dysmsapi/Request/V20170525/SendSmsRequest');
        vendor('aliyunSms/Dysmsapi/Request/V20170525/QuerySendDetailsRequest');
        //此处需要替换成自己的AK信息
        $accessKeyId = "LTAIyP1GilaFkIBO";
        $accessKeySecret = "6f43QxKhHseRUlISeiUvU0AlwvKjRP";
        //短信API产品名
        $product = "Dysmsapi";
        //短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";
        //暂时不支持多Region
        $region = "cn-hangzhou";
    
        //初始化访问的acsCleint
        $profile = \DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
        \DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
        $acsClient= new \DefaultAcsClient($profile);
    
        $request = new \Dysmsapi\Request\V20170525\SendSmsRequest;
        //必填-短信接收号码
        $request->setPhoneNumbers($mobile);
        //必填-短信签名
        $request->setSignName("品器");
        //必填-短信模板Code
        $request->setTemplateCode("SMS_138490053");
        //选填-假如模板中存在变量需要替换则为必填(JSON格式)
        $request->setTemplateParam("{\"code\":\"$code\"}");
    
        //发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);
        return $acsResponse;
    }
    
    
    
}


