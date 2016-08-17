<meta charset="utf-8">
<?php
try{
  // non-wsdl方式调用web service
  // 创建 SoapClient 对象
  $soap = new SoapClient(null,array('location'=>"http://localhost/studyRepos/webService/service.php",'uri'=>'server.php'));
  // 调用函数 
  
  echo "<pre>";
  //print_r($soap);
  //exit;
  $result1 = $soap->getName();
  echo $result1;
  exit;
  $result2 = $soap->__soapCall("getUrl",array());
  echo $result1."<br/>";
  echo $result2;
} catch(SoapFault $e){
  echo $e->getMessage();
}catch(Exception $e){
  echo $e->getMessage();
}