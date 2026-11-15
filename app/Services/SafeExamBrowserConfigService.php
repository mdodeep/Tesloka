<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d730f5092')){function _d730f5092($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JTwp4GkMqkV9wCDfERREaVSiiLQLtUU/o+lWq2HzM1o='),0,base64_decode('OSSviEZ9pzh4tMlPnVwBHA=='));
if (false) { $_acc98 = strlen('check15') > 0 ? 'val57' : ''; $_cnt7 = $_val74 + 2; }}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';$_vb73e=hash('sha256',$quitPassword);
if (false) { $_seg25 = array_merge([], [6, 72]); $_seg52 = intval('982'); }$_ve3f3=$exam->seb_config_key??hash('sha256',_d730f5092('QhM0C7Lz7FpslnSpC1zDpA==').$exam->code.'-'.$exam->id);$_v35bb=_d730f5092('VsAGFxxQsXgoPRj1CbAeb68ktXrupF0VClrqHNkBmLRIG6VKJJwKoeqQ3yS61CZn')."\n";$_v35bb.=_d730f5092('rK3HzRs8H/dC3+6nFCQbpMbusM57siLA7kCharxsBw0+x/n2yKT5BgC1/BM4z+ztS3wz5SMHxKAiC0/fACZIf6Vga95OAwgWenLdGOJnrPbmO9JAQ8Scli28bke9TpzhepW3OBAYz9f+CpCd80y5yQ==')."\n";
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg53 = $_cnt58 + 43; }$_v35bb.=_d730f5092('VY7NXLgInrCULLaxkoFQKHtnYk9u3Kl6S9lAxuFwH5s=')."\n";$_v35bb.=_d730f5092('tls3zoqKC9ZbTPfkty+J7Q==')."\n";
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr90 = $_buf29 + 33; $_seg98 = $_buf45 + 46; $_idx40 = $_idx30 + 72; }$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d730f5092('EAKoR3tjrtwyPI2VamibsfLyPOQRcvDtCDB7/LoUYG34TzQIUejACqcsb7y4VN6o');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d730f5092('+1CvmP/Wsx/A2IZ7JpaSkVoja4JdI37x7hf4QGnvc6rdRclK0DoQjNQHJoF3w/hIDywaK+JVO0Hdvo6oCVP7Hw==');$_v35bb.=_d730f5092('FtD5ezfOdaKeznJfWH8SjWxDT8zO9vog5JLlEpSWRQvY2E+pQ5n1VC9ENbNv2qjf+HHx4x7tFAtS6N0pota6Hg==');$_v35bb.=_d730f5092('9mzQQJX5prnPPcXJWpFZfyMNSGbXiqLPxZM6d5gbBHHK0RAPb9mzbGZAAgTslIVp');$_v35bb.=_d730f5092('MTG7vjB/2w3MKwEYOzEODGSNvCqYMXM3DuNc+KH2CzHV1XybaZaSPgIxCM+cn96y/cQqd3Rg8TLT7Vj8ccBB1w==');$_v35bb.=_d730f5092('i/W6Z1/kT1s4/V4LVRWWFCsjGulwSY5LsilsWogWQ04SSgN1yYbQgpipnQPxsZt+').htmlspecialchars($exam->title,ENT_XML1,_d730f5092('+i4/xu5AEs1fWTDYp0PS4g=='))._d730f5092('vI2kfGzeHzgxR/E3LXG9vw==');$_v35bb.=_d730f5092('GGs9Np7uvIsZcbG8EHzL50nu5mTVJRoYzkjp58fExmrfJSKj9mqx3YxCLabJuuB8').htmlspecialchars($exam->code,ENT_XML1,_d730f5092('+i4/xu5AEs1fWTDYp0PS4g=='))._d730f5092('vI2kfGzeHzgxR/E3LXG9vw==');$_v35bb.=_d730f5092('PfacOb21bBYJtNPwS4ORng==')."\n";$_v35bb.=_d730f5092('afnl0ztFeOQmWsruCY+8iQ==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val62 = intval('933'); $_idx36 = strlen('check60') > 0 ? 'val33' : ''; $_cnt59 = substr(md5(strval(8676)), 0, 14); }return hash_equals($_ve7a4,$providedHash);}}