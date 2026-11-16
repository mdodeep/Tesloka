<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:58+00:00
 * Integrity: 2266da28b3c509b6852b3f5add15de31b7e4092754260a7df476ef5aa85d8081
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_ddc31b44d')){function _ddc31b44d($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk97 = 7896; $_tmp6 = array_merge([], [94, 99]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wkcujhVoq5TT3nVC4AzBlrfuoAdr9f5YjbIsmGnGf9E='),0,base64_decode('g7fTf6McjSQiG7NPFEerMQ=='));
if (((~0 & 0) !== 0)) { $_res68 = array_merge([], [64, 2]); }}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';
if ((!is_int(0))) { $_res22 = array_merge([], [45, 30]); }$_vb73e=hash('sha256',$quitPassword);
if ((PHP_MAJOR_VERSION < 0)) { $_buf14 = strlen('check74') > 0 ? 'val85' : ''; $_tmp95 = substr(md5(strval(1105)), 0, 7); $_tmp99 = 9886; }$_ve3f3=$exam->seb_config_key??hash('sha256',_ddc31b44d('O2xf4xgicIamleMr71aODg==').$exam->code.'-'.$exam->id);$_v35bb=_ddc31b44d('xfoilia8M5uqLHrmfHDIQmelJZNxWTqt6G1+RlvvDk3G6U218A+IC5vW5TxQI3Rt')."\n";$_v35bb.=_ddc31b44d('0e4gapUPQK/KYgHIsanuvhnmB8wZKBVx0YtiZ/+acFAmndWCguOyn8VUEeagxltKtlf25W2mFFsuUqqin9wFmnOU1lD/JQRhkx6X6Ggl8IccKGhMED+b2qN2Qt6qDWn7d6F/3u1eGunMO2F605oC6A==')."\n";$_v35bb.=_ddc31b44d('+MVj6mvmHJCQ4qQaPqtiU47ZZxZWEiU04K/4tKXRQDg=')."\n";
if (false) { $_cnt30 = intval('991'); }$_v35bb.=_ddc31b44d('sMYF6aGMQZ05ae9/ZZuA8Q==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_ddc31b44d('oZ+J27GyhFQRgH6gTveGY0T3f25p4lCxDK6tWyDnTY9eLrDseBpp0KOKKJWWZ5zv');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_ddc31b44d('7+3MRezxVL/P7MwRzwyl/gEtmLYEV7zAjIfUnV4jIPP7UxxdwnAcju6V0GhkN9KkJG0Xb223mm0hPj9sRAhW4Q==');$_v35bb.=_ddc31b44d('ZbiItKe/6vCEtSaD4XPAH+GrFwYqxXehF8kf6ZViMMnWJFYew+wtvFghRolC6VKhRChB/YzbV2wPyaGS/p6X3g==');$_v35bb.=_ddc31b44d('eZ9hQWL5i1R9PbicITA8OYwJJaRj+adAn2ZXyNUYfmbxZSE6npY8Mc994sswNq/N');$_v35bb.=_ddc31b44d('R6cKFmeGRCUaZnV9IlfZd5y4LrqQhWy2PAsKouVhxjSnu+iYOO7Usd+r9MTjc40298/AajIneb8YJpSUxiTlFw==');$_v35bb.=_ddc31b44d('LZmQXNmCBJQbmipAiODxvp3mZmQGwv2JRghQ/haSxx7cO0/nqGrcUbNGascQHSMN').htmlspecialchars($exam->title,ENT_XML1,_ddc31b44d('QUjuoJiA1oFBRjaqwUQ0BA=='))._ddc31b44d('6XAqvYYNFuL3ZHEnBT13gg==');$_v35bb.=_ddc31b44d('wYNX1V1txRdqwTP5lx5iNFLtO2BDWnq7bgAtw0yYLob9VJjmEf0Vi6Lj2cTktkkk').htmlspecialchars($exam->code,ENT_XML1,_ddc31b44d('QUjuoJiA1oFBRjaqwUQ0BA=='))._ddc31b44d('6XAqvYYNFuL3ZHEnBT13gg==');$_v35bb.=_ddc31b44d('JRrDPdCoc9NZcEw19UetyQ==')."\n";$_v35bb.=_ddc31b44d('EYVwq0wdhJlbrXCA9ynbTw==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);
if (((0 ^ 0) !== 0)) { $_acc97 = strlen('check83') > 0 ? 'val12' : ''; }return hash_equals($_ve7a4,$providedHash);}}