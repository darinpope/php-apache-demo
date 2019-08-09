<?php
function stest($ip, $portt) {
  $fp = @fsockopen($ip, $portt, $errno, $errstr, 0.1);
  if (!$fp) {
      return false;
  } else {
      fclose($fp);
      return true;
  }
}

$ip = gethostbyname('internal-dtown-staging-intAlb-ea62a2f-1974618375.us-east-2.elb.amazonaws.com');
echo $ip;

$result = dns_get_record("internal-dtown-staging-intAlb-ea62a2f-1974618375.us-east-2.elb.amazonaws.com");
print_r($result);

if(stest("internal-dtown-staging-intAlb-ea62a2f-1974618375.us-east-2.elb.amazonaws.com",5000)) {
  print "I can see port 5000";
} else {
  print "I cannot see port 5000";
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,"http://internal-dtown-staging-intAlb-ea62a2f-1974618375.us-east-2.elb.amazonaws.com:5000/route/v1/driving/7.436828612,43.739228054975506;7.417058944702148,43.73284046244549?steps=true");
$result=curl_exec($ch);
curl_close($ch);

var_dump(json_decode($result, true));
?>
