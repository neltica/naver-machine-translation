<?php
$url="https://openapi.naver.com/v1/language/translate";
$url=parse_url($url);

$host=$url['host'];
$path=$url['path'];
$fp=fsockopen($host,80,$errno,$errstr,10.0);

$send_data="source=ko&target=en&text=\"hello\"";
fputs($fp, "POST v1/language/translate HTTP/1.1\r\n");

fputs($fp, "Host: openapi.naver.com\r\n");

fputs($fp, "User-Agent: curl/7.43.0\r\n");
fputs($fp, "Accept: */*\r\n");
fputs($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
fputs($fp, "X-Naver-Client-Id: {o2J6MV_2v3x_dvOP5wKd}\r\n");
fputs($fp, "X-Naver-Client-Secret: {ESlwhWbgXL}\r\n");
fputs($fp, $send_data);


$result = '';

while(!feof($fp)) {

    $result .= fgets($fp, 128);

}

fclose($fp);



//헤더와 컨텐츠(웹페이지에 표시되는 내용) 구분

$result = explode("\r\n\r\n", $result, 2);



$header = isset($result[0]) ? $result[0] : '';

$content = isset($result[1]) ? $result[1] : '';



//결과 출력

echo $header;

echo $content;
?>
