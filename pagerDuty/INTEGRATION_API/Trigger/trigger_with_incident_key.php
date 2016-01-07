<?php
/*
@Purpose : This is for incident management work. Triggering pager duty service using key. Integration API.
*/

$SUBDOMAIN='pdt-dank';
$URL = 'https://events.pagerduty.com/generic/2010-04-15/create_event.json';

$payload = array(
  "service_key"=> "5706e66b0c034b15878b3ccff8c17c5e",
  "event_type"=> "trigger",
  "incident_key"=>"5",
  "description"=> "Exception ocurred in Referral Cron...",
  "client"=> "Amit Patange",
  "client_url"=> "https=>//monitoring.service.com",
  "details"=> "Please look in to this message. Priority : 101..."
);

$session = curl_init();

curl_setopt($session, CURLOPT_URL, $URL);
curl_setopt($session, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($session, CURLOPT_HTTPHEADER, array(
    'Content-type'=> 'application/json'
));

$result = curl_exec($session);
curl_close($session);

echo "---------------------------";
echo "<pre>";
print_r($result);
?>
