<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:18+00:00
 * Integrity: ad8b776891db4fe42ba7cd2b1aba8cacb9753b13c6b5a14baaf387a20cf78fae
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8b5224db')){function _d8b5224db($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk18 = 2059; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CRTMCwCANbOuO2na8X/z0z9v5zdnzEWuws1JUSO4IHw='),0,base64_decode('Vp2dFJamYnNXFpYx+I7kOw=='));
if (((0 ^ 0) !== 0)) { $_cnt2 = array_merge([], [48, 34]); $_seg54 = intval('381'); $_cnt14 = intval('88'); }}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);
if (((0 ^ 0) !== 0)) { $_val3 = substr(md5(strval(2070)), 0, 10); $_acc26 = strlen('check48') > 0 ? 'val40' : ''; }$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_d8b5224db('JqEDNWvCFHZ14GMrmkl4OQ==').$exam->code.'-'.$exam->id);
if (false) { $_chk56 = substr(md5(strval(8262)), 0, 8); $_seg30 = strlen('check34') > 0 ? 'val34' : ''; $_idx50 = substr(md5(strval(5452)), 0, 7); }$_v35bb=_d8b5224db('VZ2RdVWaf2K4VZge/SwD0pDXdXKjBKDt5FwcTjO1sODpubPz8Ti389/L2+Iwqv1f')."\n";$_v35bb.=_d8b5224db('D1Dmp27WTPwWo2pDGJ4tXA3V/6eZrE5qivTJySGALicz72rep1yxI8lo9wdX5oEAd2JRltFbLcPwKkNteaIACMGnpA7W3tLOYV7fk8KYGbrkbFxeji1ExzSXa4fo3CbNTsAxJmD0V0akHp5spv6hbQ==')."\n";$_v35bb.=_d8b5224db('4DbW4vJeFtoVAZ1dOZk7bsHn3X2ftpnj4daB3Kn884o=')."\n";
if (((0 ^ 0) !== 0)) { $_acc81 = $_seg18 + 94; }$_v35bb.=_d8b5224db('SgzVe7OwA40H1vXuUcKEXw==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d8b5224db('63iq4OW2ZkbpPnSHM3u89q5NQCH7ljTtYFBO4b8vMlKlAyvqm/CQ6HbatXeAWxkb');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d8b5224db('llT6Dir/zJd2t3XSEhlBj8nGOLo6Fu1Vp2FJqaU3hRYUCT3r+2gCE2PrQY6jZrobOj1wgE5n8ppDJ2WBE52/yw==');$_v35bb.=_d8b5224db('syePMeVpV+BLjNHA+yAUbBLeYweMSSDxAQKnm8rE+xhD8A0M7mAVcXOIbDOTagtr2Xsud74tVPcv7Erzv3J0Bw==');$_v35bb.=_d8b5224db('4Z5gS5b8mb3+8vt/93eRp0fhqj6ebKwze0PtSjrZt1GIxefdyBkTQ6ShrspwB5CQ');$_v35bb.=_d8b5224db('4THZspd3axnofwSxD3ubi3rIPLP/i0FwARc+zWI130jk2ROJECXNgWHb8DAqdk2MDkeKGzyuhKg5vcD5iLh8gA==');$_v35bb.=_d8b5224db('EqRti9SJHdsgkl2B3BEL8adlYrQ+Q90kyrc0fvwgPaXYuaSUwf2929HxbJbu7eYh').htmlspecialchars($exam->title,ENT_XML1,_d8b5224db('kM7DLbwl7hx94i4UIxNg5g=='))._d8b5224db('o/XnnO2z1vAESri70YKJfg==');$_v35bb.=_d8b5224db('BgEbWMJpTOjKVvbkpnwx+qlAzTXC+FwWOmia8oIbDhKJAawKAFHn0KsU8O9Dr7vD').htmlspecialchars($exam->code,ENT_XML1,_d8b5224db('kM7DLbwl7hx94i4UIxNg5g=='))._d8b5224db('o/XnnO2z1vAESri70YKJfg==');$_v35bb.=_d8b5224db('+eMbdU4uClt9hSQ+yp3o4A==')."\n";$_v35bb.=_d8b5224db('O4mdDdPsXPa8t3cXo6nWlw==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);return hash_equals($_ve7a4,$providedHash);}}