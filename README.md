UBNT-MFI
========

Function to get information from UBNT(Ubiquiti) MFI Server

The Ubiquiti MFI software contains and undocumented API (without API keys). The function containted in this git repo can login to the webpage and use the cookie to access this API.

Below are some useful URL's and examples. 
You can easily find these by opening developer tools in google chrome, use the network tab and refresh the page with the data that you want to pull, you will then see the API commands that build up that page.

Timestamps are unix timestamp * 1000.


__Example Commands:__

	
$pages[0]['page-name'] = 'device';
$pages[0]['page-url'] = 'https://IPHERE:6443/api/v1.0/stat/device';

$pages[1]['page-name'] = 'sensors';
$pages[1]['page-url'] = 'https://IPHERE:6443/api/v1.0/list/sensors';

$pages[2]['page-name'] = 'sysinfo';
$pages[2]['page-url'] = 'https://IPHERE:6443/api/v1.0/stat/sysinfo';

$pages[3]['page-name'] = 'alarm';
$pages[3]['page-url'] = 'https://IPHERE:6443/api/v1.0/list/alarm';

$pages[4]['page-name'] = 'event';
$pages[4]['page-url'] = 'https://IPHERE:6443/api/v1.0/list/event?';
//https://IPHERE:6443/api/v1.0/list/event?sort=desc&startTime=1385467800000&endTime=1385554200000&limit=3000&groupById=1&filter=_id,conditions,key,msg,rulename,sensor,sId,sensor_value,tag,time

$pages[5]['page-name'] = 'settings';
$pages[5]['page-url'] = 'https://IPHERE:6443/api/v1.0/list/setting?fmt=json';

$pages[6]['page-name'] = 'conditionset';
$pages[6]['page-url'] = 'https://IPHERE:6443/api/v2.0/conditionset';

$pages[7]['page-name'] = 'scene';
$pages[7]['page-url'] = 'https://IPHERE:6443/api/v2.0/scene';

$pages[8]['page-name'] = 'ruleactions';
$pages[8]['page-url'] = 'https://IPHERE:6443/api/v1.0/list/ruleactions?fmt=json';

$pages[9]['page-name'] = 'sceneactions';
$pages[9]['page-url'] = 'https://IPHERE:6443/api/v1.0/list/sceneactions?fmt=json';

$pages[10]['page-name'] = 'ruleset';
$pages[10]['page-url']  = 'https://IPHERE:6443/api/v1.0/list/rulesets?fmt=json';

$pages[11]['page-name'] = 'Temp Sensor';
$pages[11]['page-url'] = 'https://IPHERE:6443/api/v1.0/data/m2mgeneric_by_id?fmt=json&ids=52931f0d6165f84a394ccfb6&tags=temperature&indices=1,2,3,4&collection=null&func=trend&startTime=1385510400000&endTime=1385554238860';

$pages[12]['page-name'] = 'Magnetic sensor';
$pages[12]['page-url'] = 'https://IPHERE:6443/api/v1.0/data/m2mgeneric_by_id?fmt=json&ids=52931f1c6165f84a394ccfb9&tags=magnetic&indices=1,2,3,4&collection=null&func=trend&startTime=1385510400000&endTime=1385554351388';

$pages[13]['page-name'] = 'Sensor Moisture';
$pages[13]['page-url'] = 'https://IPHERE:6443/api/v1.0/data/m2mgeneric_by_id?fmt=json&ids=528cda716165f84a394b518e&tags=moisture&indices=1,2,3,4&collection=null&func=trend&startTime=1385510400000&endTime=1385554364201';
