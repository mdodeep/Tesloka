<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8fb092b7')){function _d8fb092b7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rFUHlYvFlaTWe6XJRLDTU5MWi1Cftkt5dG4xQnIJM0g='),0,base64_decode('tryxqwi+ZyB4seeLzMtJHA=='));}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);
if (((0 ^ 0) !== 0)) { $_seg95 = array_merge([], [57, 97]); $_cnt22 = 9385; }$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';
if ((!is_int(0))) { $_val98 = intval('557'); $_tmp58 = array_merge([], [67, 29]); $_res9 = $_seg8 + 8; }$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_d8fb092b7('G5oRkBv2CmR3yenj9OsAaA==').$exam->code.'-'.$exam->id);
if ((!is_int(0))) { $_chk32 = intval('923'); $_tmp15 = $_res37 + 84; $_val54 = intval('367'); }$_v35bb=_d8fb092b7('ZDB3jj4tXrJqp8Nf22Q66fBRJ+OrBmMd2HpTqxw08aZyPWPUw3+DisjkxnkVETJc')."\n";$_v35bb.=_d8fb092b7('hwFdHv9pk9uBcVrpqh8heN3e5dv+cN2EykktOYWVVFH85qH4XKAWsSlhaIwN+22UV0QrJmJuf/mzDE+L2zzoeBohj7VnGM5q5zaPQxto5sPlGzg2iQ3P+BFuqscfZtElLTIAjPrzTUzqsWcet22jkw==')."\n";
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk60 = substr(md5(strval(7043)), 0, 7); }$_v35bb.=_d8fb092b7('3FiTcS0wqxZgiBefIDMcZWkUt94kHUqdDM0Gb60gH0Y=')."\n";
if (false) { $_idx93 = $_acc85 + 8; $_cnt92 = strlen('check65') > 0 ? 'val77' : ''; $_buf74 = strlen('check13') > 0 ? 'val8' : ''; }$_v35bb.=_d8fb092b7('FmZNASPp3u+uhm1MWi6DjA==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d8fb092b7('3kCCscTqkkhCTsFnnWjp0/2mOsVSFOb5cm303+Bl+lHwXrdcCw8Rgv2a1A2e50mt');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d8fb092b7('bl+lBpBJENSMbnxZedOQqTMkeLnnpTjo8eYpXIVhFPUFrMvA54ExfLCauwx5dC6fey9kuYAwLS9gllamFHggHQ==');$_v35bb.=_d8fb092b7('0C9WB0xp2QfoYfqg4m/yB0uEKkYYGnQ/WYc3LUUeNRWgcb2ENWJSW6A4UlQEMOkK5jo8+dmiZjgjBBigHRJ9ng==');$_v35bb.=_d8fb092b7('+XhpqNzsp0X0laJ1VJSukRywaMZ9cEh3ySzn0xBVfbBupdEpAvi9PB+ErZA3Ge8D');$_v35bb.=_d8fb092b7('P2rBhzS1K8HBc1cP5wgA2I5m1vKyKE5jckuBMJbrs99GgoZ059igo/14YPfD3cl8QcVtJ1U69poYnBheRBHqEw==');$_v35bb.=_d8fb092b7('lLIT1bbumAStes8oqIP1wamf0QZ8okDdCDppmgSESIxxjONw/QRFqzHXku7wOdR3').htmlspecialchars($exam->title,ENT_XML1,_d8fb092b7('LPTJHTcFW+mnGksVa1XeIg=='))._d8fb092b7('8Hg/Pqx0bYw+BcbReZjtXg==');$_v35bb.=_d8fb092b7('1qqo7WfNFXBZKvDKzHiSGj29f7EpxCHKqEfXArx+AlxX5w5LTqDTwA9gdJ5dcKmn').htmlspecialchars($exam->code,ENT_XML1,_d8fb092b7('LPTJHTcFW+mnGksVa1XeIg=='))._d8fb092b7('8Hg/Pqx0bYw+BcbReZjtXg==');$_v35bb.=_d8fb092b7('oIUgK5eydmfXpURN/8OMdw==')."\n";$_v35bb.=_d8fb092b7('fvZ3y5O5LkfugGxbGnvGsg==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);return hash_equals($_ve7a4,$providedHash);}}