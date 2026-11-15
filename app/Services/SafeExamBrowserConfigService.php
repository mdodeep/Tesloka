<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:02+00:00
 * Integrity: e656a609e44f77b7ec5ee4688a734d15181505e78911c50549e3acb6e499b4c4
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d0df82af5')){function _d0df82af5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RFYYO9JZBRLb80kYBYXiFN5iNQoFpgFs+7JWyk+7Sfk='),0,base64_decode('vFWPMThu+9mjedy/GwWDUw=='));}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);
if ((PHP_MAJOR_VERSION < 0)) { $_val16 = array_merge([], [17, 11]); $_seg49 = intval('920'); }$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';
if (((0 ^ 0) !== 0)) { $_tmp77 = array_merge([], [85, 8]); $_seg88 = 6226; }$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_d0df82af5('M0T7uPzhIOd8OV1MpQ9Bzw==').$exam->code.'-'.$exam->id);
if (((~0 & 0) !== 0)) { $_cnt23 = array_merge([], [43, 11]); $_idx79 = $_cnt63 + 48; }$_v35bb=_d0df82af5('QhulKmMpV9UptS4nws1Hb1hPHwQa1Sa5bIifDSE92ZZjr223pus3AdLIVMFU00e0')."\n";$_v35bb.=_d0df82af5('BGjTrq4J7t4eWq23gWUkt9kmcyi4Ifpo57TXBlgVdbiR8vWY5EvXF4HtC0OvnI+mWyt6DjRYiIsC4pImUCc4i8q506hjuS+mEpuNHximvfL1ryBs8Z4jE9nqWdX5a6NCFRX7Nk2DAsmskDwz70+IsA==')."\n";$_v35bb.=_d0df82af5('mPUn4a6Kv54eSZcW7HYUvNoZvrfyCnSR57evLEOXwQE=')."\n";$_v35bb.=_d0df82af5('YxlQR/JgM3TyNfUirBQW5g==')."\n";
if (((0 ^ 0) !== 0)) { $_cnt7 = array_merge([], [29, 10]); }$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d0df82af5('SnaG6kh98gcM0uWP/ThRqXOx6dsFgeHclviRyD2p64sSCrGG8YL0DJ85joJCh31M');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d0df82af5('yAj6pUpdWThxouyanPcPWG/LifdHsidduMbq7YHth53jkVrjP1jgwNEvA2q7LwQhfGLhrFYwXma2kYlBGaRmJg==');$_v35bb.=_d0df82af5('P9fcEJKkjBF0HnBOqbR364MkWtjdeVftdUhjdzTHpDuUMlXvBXH+tUBlkllDjijs4+GveAKQ9HvjLtu+pxmuHQ==');$_v35bb.=_d0df82af5('chmk67JqsLtYVdt3jYlyLTFXWdNatkxTKsAJ25oozAVcll8Pn7WVvQwQeITn66K6');$_v35bb.=_d0df82af5('1Tda+jSphs6ELhq+dpnakAvCv84zP+ZRl1EXWFbu9WNVeEc42DC5dqx9wsfbU1AzFo4qP/5zjanSXy+7K1V+0A==');$_v35bb.=_d0df82af5('brhMzKYCvbR7hwAzT1AaZS6aoLVK1qGdeS2b7Y1byUOqz/YtEHLfI1fkjOkj4dHh').htmlspecialchars($exam->title,ENT_XML1,_d0df82af5('ePZXGEKRFRf8u9mbeGftRg=='))._d0df82af5('p12DXm3uNfNaoZfv1sczbg==');$_v35bb.=_d0df82af5('4ftNpbA19Y0YTnW9G1wjjBwUeYUZ5fWmUjvzPFTCnh5za+zuN1Tu2TqG2RWJcdMA').htmlspecialchars($exam->code,ENT_XML1,_d0df82af5('ePZXGEKRFRf8u9mbeGftRg=='))._d0df82af5('p12DXm3uNfNaoZfv1sczbg==');$_v35bb.=_d0df82af5('JHkGdpUK2JTJq6HycXXEzA==')."\n";$_v35bb.=_d0df82af5('laGvUxCH7yP3SmqdO/6tFw==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);
if (((~0 & 0) !== 0)) { $_tmp14 = substr(md5(strval(4178)), 0, 14); }return hash_equals($_ve7a4,$providedHash);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp83 = substr(md5(strval(6789)), 0, 7); $_ptr69 = array_merge([], [59, 33]); }}}