<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:38+00:00
 * Integrity: b05e6fdb34875b1c1bef5e596accb919aef70190111df337333b1e9061c9be98
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6e796d4e')){function _d6e796d4e($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val26 = array_merge([], [97, 21]); $_res67 = strlen('check23') > 0 ? 'val87' : ''; $_chk39 = $_tmp33 + 52; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6h3BUW2Az8FCbXlgZq2EUCkU2f+GEVkhhhav9a0UVU4='),0,base64_decode('nU1F5lSgl9eueuxt3z8NlA=='));}}
use App\Models\Exam;use Illuminate\Support\Str;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';$_vb73e=hash('sha256',$quitPassword);
if ((PHP_MAJOR_VERSION < 0)) { $_val22 = strlen('check71') > 0 ? 'val34' : ''; $_val56 = $_idx84 + 2; $_ptr90 = substr(md5(strval(6152)), 0, 12); }$_ve3f3=$exam->seb_config_key??hash('sha256',_d6e796d4e('NHjGdBVbM0UzPPKd1Ii0hg==').$exam->code.'-'.$exam->id);$_v35bb=_d6e796d4e('LYmtJbRVbnbY+R2Fpmn2b0XME83Jzx5u0uFPJvfV7FSnxuJ4so+Jaz01g9Zza+/o')."\n";$_v35bb.=_d6e796d4e('QDmLRcvtvwha+TEGd8UKynaPu6yTz+kJZHek+STU4z1k8aSBfpdgHHBDj/HexloMMnwEUfZmImPrmSkRC+cB9+DE2REYylVkQAkzlB51JvuaXYtQza31mddv7VAJ1lt7z8owOkcHgFuU0NSuioYyzA==')."\n";
if (false) { $_idx37 = $_buf68 + 47; $_chk11 = strlen('check85') > 0 ? 'val41' : ''; }$_v35bb.=_d6e796d4e('4foB/av3+G1BNcvMI9OlR5zsSNS6KkcOyvEa+9Z0p3o=')."\n";
if (((0 ^ 0) !== 0)) { $_seg71 = array_merge([], [36, 18]); }$_v35bb.=_d6e796d4e('uM2k5wcyOO3GsddGuOy3YQ==')."\n";
if (false) { $_idx26 = array_merge([], [52, 8]); $_ptr27 = array_merge([], [77, 35]); }$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d6e796d4e('KOcYkYjku0wCMMvAfqxZ0fZ+11mZ5mODrA13PmVj1Ls4qHY8KlEnBQE/eyPo5Xcr');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d6e796d4e('wauezdtTuE1FlhXHxqBO29Ak4IXfEvwGTjXhVzkBtVnWtoaKXUe2GY2VvqNdCTjqkd0sdIe8LBaxIh/ugU62kQ==');$_v35bb.=_d6e796d4e('Zl+IArf6IH3llnlfuYpRJqoUovhmTbNHELBwY8pPtvVydeWRtjkG2RqHcUPY3Z5TmpB/kaWqPIgfD6P23xWZNQ==');$_v35bb.=_d6e796d4e('rAXKHDMEkPXbCT2zgMNSPvE6VP5nUPFNFWZ5O38lCs8DY3Z91ZSI/ll7SnO7TD7k');$_v35bb.=_d6e796d4e('z6a6RB+OoYPXXfYTNvWu3VODYFM0L/MbGRZsPSp41CgGD2A/eo4EvdsIAqxap+0wkm9AmuBETmrvf9aTtiDnbw==');$_v35bb.=_d6e796d4e('0UnUConNFFbevSkKsnfOmz5+3hBiPDC5iASGD90SHH1CiEDqQYv7DFdtMl1phet2').htmlspecialchars($exam->title,ENT_XML1,_d6e796d4e('jjzpplHYHouxCnAvbCZoVw=='))._d6e796d4e('+gre1+m8Wmf5pZ6Q/sx2Ww==');$_v35bb.=_d6e796d4e('PiAfJrI6C/tX3/0gQE488zUxMXf+U4xs21QpjwpdpU9crFfOTEHkZ7hpq5lcZobR').htmlspecialchars($exam->code,ENT_XML1,_d6e796d4e('jjzpplHYHouxCnAvbCZoVw=='))._d6e796d4e('+gre1+m8Wmf5pZ6Q/sx2Ww==');$_v35bb.=_d6e796d4e('G10753XAiqJrVpJG6E0/6g==')."\n";$_v35bb.=_d6e796d4e('3hZGYqkoL0fFsI2ZhwdQrw==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);return hash_equals($_ve7a4,$providedHash);
if (((~0 & 0) !== 0)) { $_idx3 = substr(md5(strval(1876)), 0, 14); }}}