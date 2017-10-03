<?php
/**
* 桥接模式例子
*/

interface MsgInterface
{
	public function msg($content);
}

class CommonMsg implements MsgInterface
{
	public function msg($content) {
		return "普通消息：" . $content;
	}
}


class ImportantMsg implements MsgInterface
{
	public function msg($content) {
		return "重要消息：" . $content;
	}
}

interface Send {
	function send($to);
}

class ZnSend implements Send
{
	public function send($to)
	{
		return "站内发送给：" . $to;
	}
}

class QQSend implements Send
{
	public function send($to)
	{
		return "QQ发送给：" . $to;
	}
}

class Info
{
	public $msgType;
	public $sendWay;

	public function setMsgType($msgType)
	{
		$this->msgType = $msgType;
	}

	public function setSendWay($sendWay)
	{
		$this->sendWay = $sendWay;
	}

	public function send($to, $msg)
	{
		return $this->sendWay->send($to) . "，" . $this->msgType->msg($msg);
	}

}

class Client
{
	public static function main()
	{
		$info = new Info();
		$commonMsg = new CommonMsg();
		$info->setMsgType($commonMsg);
		$znSend = new ZnSend();
		$info->setSendWay($znSend);
		// $info->setSendWay(new QQSend());
		// $info->setMsgType(new ImportantMsg());
		$res = $info->send("小明", "回家吃饭");
		print_r($res);
	}
}

Client::main();
