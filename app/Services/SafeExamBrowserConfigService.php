<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:18+00:00
 * Integrity: 5d754da99e767286fe5e250593422cf402a67b7f6e84d9a24224033e75db0d43
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dd9a01e29')){function _dd9a01e29($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OHHwYzxBrTLj78huRxMOPJtLS1pDzv9tJa12ZduzIFw='),0,base64_decode('yVk6pIUrkTcmjcARxg2b3A=='));}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk29 = substr(md5(strval(6277)), 0, 14); }$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';$_vb73e=hash('sha256',$quitPassword);
if (((~0 & 0) !== 0)) { $_acc16 = strlen('check86') > 0 ? 'val44' : ''; }$_ve3f3=$exam->seb_config_key??hash('sha256',_dd9a01e29('5c+JAcHO3x5UyWR29jsayg==').$exam->code.'-'.$exam->id);$_v35bb=_dd9a01e29('efORWijm89e0pftmgATREmE4ccKBugp4fImdzdK1Tw9lWoBF3J7ZnZ7DygLlJtlp')."\n";
if (((~0 & 0) !== 0)) { $_tmp34 = substr(md5(strval(1504)), 0, 11); $_cnt49 = strlen('check97') > 0 ? 'val3' : ''; }$_v35bb.=_dd9a01e29('GxjNfT9QMbrsLV+XDbDmUcsXV8iTMNAoxhl09tKVER/zfn/cr91s05ueFTKIZ/P5dGp2MVeDbv/nXuTKJDBVLBcK0DhoJ2K8JIDBRrXTagJAc8tFbM7pEq1PR2YW6jdEUjRf+NaiyusLO/t7uW0/2w==')."\n";
if (((0 ^ 0) !== 0)) { $_acc92 = substr(md5(strval(1512)), 0, 9); $_seg88 = $_idx15 + 14; }$_v35bb.=_dd9a01e29('HIQsq/OoGl+6R2HpYlUYpJOt6jm9T8zFfRXqfC2icG4=')."\n";$_v35bb.=_dd9a01e29('R+CtBGwt9UX2qKKHnMppCw==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_dd9a01e29('Uyuev9S8F2b4Rn70Orw1Kys/7EyOlup3ZCyjpO8HMgs6xbgdNfu8l20yMjjrvdRs');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_dd9a01e29('2M+TyLe7wjfPIQtWrrtPZLu+w821aheuqM0dvcbQyqVGt+wBWXoxxdUgao7+zWiBgE/6irygfJUqxWcEUhsVIg==');$_v35bb.=_dd9a01e29('DCxkud7h6hxkhptAl3hWcuclRXzgrAxoBcdXf8UAaea4L7j32l9fo/J94TjKSsPX9PCxI/8vRAnkhOg3X2JPnQ==');$_v35bb.=_dd9a01e29('iuB9tAEaSB82Kk/eaWcPOOUey32UiLSxFZ0Pe24zwlagGQXp3qIootl9AN+MfOB+');$_v35bb.=_dd9a01e29('ItWcRClhbXsV0BjADW0kqz37QvvYWWm3W3nyCT9DIBDFUcqof66sxNMQU/BMSPpbaI7x87g95nTYgbyHOfMxxg==');$_v35bb.=_dd9a01e29('/iT7Xa7q/Fa0KSseVDxDUwf98q6i0Sklbkcks5XFdfyuS5Qk/6FzhVPJJLm0qN/1').htmlspecialchars($exam->title,ENT_XML1,_dd9a01e29('3YD/eYHaaqntrxqqOD215w=='))._dd9a01e29('gOVqhF9wj2P1QBwvcFpMvg==');$_v35bb.=_dd9a01e29('duRlw6nxGc6wlyNeF7JfgS8JsbU0FiSC0Y3nQO3jajHiltE+h8kmfEH/rFg+1abT').htmlspecialchars($exam->code,ENT_XML1,_dd9a01e29('3YD/eYHaaqntrxqqOD215w=='))._dd9a01e29('gOVqhF9wj2P1QBwvcFpMvg==');$_v35bb.=_dd9a01e29('rzWUy6PyZoUiIHDyqLv5CQ==')."\n";$_v35bb.=_dd9a01e29('37WNIKFzvz5C1oCUq+drEA==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);
if (false) { $_val96 = 7512; }return hash_equals($_ve7a4,$providedHash);}}