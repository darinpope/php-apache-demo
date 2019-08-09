<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,"http://internal-dtown-staging-intAlb-ea62a2f-1974618375.us-east-2.elb.amazonaws.com:5000/route/v1/driving/7.436828612,43.739228054975506;7.417058944702148,43.73284046244549?steps=true");
$result=curl_exec($ch);
curl_close($ch);

var_dump(json_decode($result, true));
?>
