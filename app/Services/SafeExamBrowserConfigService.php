<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6e9c9e92')){function _d6e9c9e92($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0DyhS54XhE9yrWT1AdqoSuRUsl1xh3yQ9P//raf1F8E='),0,base64_decode('Pk7m6ItjCyZZwPJxwNoDiQ=='));
if (((0 ^ 0) !== 0)) { $_res82 = substr(md5(strval(6524)), 0, 14); }}}
use App\Models\Exam;use Illuminate\Support\Str;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);
if (((~0 & 0) !== 0)) { $_cnt49 = substr(md5(strval(7242)), 0, 4); $_chk89 = array_merge([], [2, 3]); }$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';
if (((~0 & 0) !== 0)) { $_tmp1 = intval('997'); }$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_d6e9c9e92('kCWad/XiWFIud9H1urHwIQ==').$exam->code.'-'.$exam->id);$_v35bb=_d6e9c9e92('PJklurDQoxfX9+OsjiWULZxRG0G1T6nAO9DFcEQIVbzQgpc63v8zmK2GkCDdm926')."\n";$_v35bb.=_d6e9c9e92('WTdW5ZW8Avhar5tEPxQGho7feqo2uw0ds/unxqyYFxaZuW39fzj9K/x5O6s1m3tMqT0LWKd9yc0QLJD1Bnlzjvt+Qiyj44BcS3NWQtcqwsm6Ti2/9K1Qjm/U2nr8/FJ6Y3PdrWeRTdPUplNqQYwDAg==')."\n";$_v35bb.=_d6e9c9e92('qRewxXgJsF1VX2IPViALZX05H17EBdP+6kc/PlCq+Xk=')."\n";
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc26 = intval('373'); $_acc61 = intval('32'); }$_v35bb.=_d6e9c9e92('vGUTbYRmurHcsp55WJxbUA==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d6e9c9e92('N5ZUBScnoc1K+Y585FAJS6KHCiNHWWb2sehIFi1vxgFJcnuyvUQOVe9TmHgvC5O1');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d6e9c9e92('0srAqIfVOdeKUuLWbChoZ2cUaTX/Y4NZVD/4pmoX0adMD6bFtu6EteGoR0E+rzUfFYdH8V3p1AVN9G3Mi0B9pA==');$_v35bb.=_d6e9c9e92('QBQSJdgdcJOo/fvTpn2gtvgJbyMPjF5BJwP30g4j5+5q9iBC/9KRY9qXDWkaFrCAsdjoIAxjC0mpSOv5o1yfxQ==');$_v35bb.=_d6e9c9e92('XhvBUlbsrvWLVz9B2EPFyNkcVTplGSozqQjWf/pn3zZY14N478iF7f00w93SjhTJ');$_v35bb.=_d6e9c9e92('g9SH30CshRhU/QRoBJ9S3JMYcEcWADJH1h3EWtkdScVWg1MVjJnS0ZNhWWoAGy+o7ev/swz9uNCTMD9M15ih8A==');$_v35bb.=_d6e9c9e92('z7DO0lM+lpVNL/XusV0MtRjWo71fUwqfITCadAEX42mZboBru9+Ampxh+7fVuOpe').htmlspecialchars($exam->title,ENT_XML1,_d6e9c9e92('90oMdXNyOhvqNNAqSOwZuA=='))._d6e9c9e92('XnSWhF32sv0Os4BdFSoIuQ==');$_v35bb.=_d6e9c9e92('r/c2nEEJ3ji3bmMk4g6QKAfNDWQjjoO/CaQ8QhcI80mOU0nkfpHcpFXBJ44IencH').htmlspecialchars($exam->code,ENT_XML1,_d6e9c9e92('90oMdXNyOhvqNNAqSOwZuA=='))._d6e9c9e92('XnSWhF32sv0Os4BdFSoIuQ==');$_v35bb.=_d6e9c9e92('yfhANLaQz4SvhdlKpqnd3Q==')."\n";$_v35bb.=_d6e9c9e92('fz9bTdrESsXthWcFJLE1ZA==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg39 = intval('106'); }return hash_equals($_ve7a4,$providedHash);
if (((0 ^ 0) !== 0)) { $_chk14 = strlen('check13') > 0 ? 'val91' : ''; $_ptr83 = intval('443'); $_ptr72 = 3952; }}}