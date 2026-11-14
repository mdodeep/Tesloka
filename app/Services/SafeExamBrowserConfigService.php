<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:06+00:00
 * Integrity: 90830522eac3cf227eb1444b6716fee34fb1ae71e0fc3173d8b1481d1b2703a4
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de462f2a1')){function _de462f2a1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZfyDVW7dJ4sFYGPrOEQfTr3d1tRRx5+SUp4FBsID/cc='),0,base64_decode('rp6aC7RMwCAO2O/F1Q0eUA=='));}}
use App\Models\Exam;use Illuminate\Support\Str;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);
if ((PHP_MAJOR_VERSION < 0)) { $_res55 = array_merge([], [27, 0]); }$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';
if (false) { $_ptr15 = $_cnt55 + 81; $_tmp13 = intval('450'); }$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_de462f2a1('1mxnk+yfD/NrZAILqeD1dw==').$exam->code.'-'.$exam->id);
if ((!is_int(0))) { $_seg0 = intval('903'); $_cnt41 = $_chk11 + 72; }$_v35bb=_de462f2a1('NOt+DASjwF3GChufGAG3Zse5sJiDr3NieRcfLNbacrZElkKQ8mdfGztIrfneqaRk')."\n";$_v35bb.=_de462f2a1('don8oAmkO2CrFHBEMFhprxVkR87TKz+7Nb24eM3OSCtWAvdnZ4rR1hTPusQSfmHh68Q4d7wPkmSbE6JG07bTFo6TFail0g3F8mnoH4S/zZSMaPTPUHjBKzFTb1obHKor/w5U4J2rCloNTHXASonzmQ==')."\n";$_v35bb.=_de462f2a1('eZFwrVnU+959BxDC2gTFO7KIIeiYeVEzGuqnKNo8QLE=')."\n";
if (((0 ^ 0) !== 0)) { $_ptr29 = intval('519'); }$_v35bb.=_de462f2a1('mLKg6uFmcv4hU3Ddl+PMlA==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_de462f2a1('DUIRxBwlPSHky7CKWkoxQhYXYUtnaKYzmFQ9F/6rp13NXdR3hSP0GXBh/tJeMIkJ');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_de462f2a1('wsiazcUDostPM3W3CMfTy6+A4DFpYAm1AezaSpWqChOLhWDLiM5W/4WBYHbyd022ndyjGgwYDKqbibYgiwotbw==');$_v35bb.=_de462f2a1('N2lX4H7Fpj/ekhZw1p5qxf4zw5A8nra+zkYEuQulUyLJwV9MiIfcAKods18B6XpRMzbVmy3nC/p7P7Ez3GwLKg==');$_v35bb.=_de462f2a1('TJPHR669K/ma+EehP+PwZbchpyCa/S8PSNtmECOZvBlE69XS01jEYgpKcaIzcD64');$_v35bb.=_de462f2a1('Oh1o2RM4/6USJ2q6py6kIZJTPVPuNnvXZONi4aU87g4epaCXJTTwdeEgxgHkNl5m6piUXtNR5Las+bQ7SIEXKg==');$_v35bb.=_de462f2a1('Kl2FUFKSZ5cyVAWIXFnz8RZnt0SEPEifDlNu3osvvvC3aT08o2aqXkYW54hGkxmN').htmlspecialchars($exam->title,ENT_XML1,_de462f2a1('/txE8wpsnbTOdDnd+mF2tA=='))._de462f2a1('Y5RxdED1O7Uh8cSHzPMjXQ==');$_v35bb.=_de462f2a1('fpiLnx56BgEP9giR4PWhxqefj8zJWpTW3EjXO7buOneWwG1NYy2u7ItfRxO6JL1V').htmlspecialchars($exam->code,ENT_XML1,_de462f2a1('/txE8wpsnbTOdDnd+mF2tA=='))._de462f2a1('Y5RxdED1O7Uh8cSHzPMjXQ==');$_v35bb.=_de462f2a1('KDXoPUby11n8uTXMOq1amQ==')."\n";$_v35bb.=_de462f2a1('/p8R3h3LhA9hwUEFdzHp9Q==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);return hash_equals($_ve7a4,$providedHash);}}