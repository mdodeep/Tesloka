<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:06+00:00
 * Integrity: f408fa3e851c400fdf9ceb2524f4008d6b6a752b519867c0fa58e731adb24061
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d20deae58')){function _d20deae58($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EVo3j+x5vK/cS8oJk9D5tiElh+nSovHy3jzHBITjzic='),0,base64_decode('UXq+aYUAS0ZseJeZbXO3ig=='));}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_d20deae58('nhTwPq1DpAePbVLaJ06CVA==').$exam->code.'-'.$exam->id);
if (false) { $_res27 = intval('383'); }$_v35bb=_d20deae58('P0qHU8U4AkNS6BZLoF22sEyOmHbp5AumXuvOk546gO17Q9vaOQ5lxdFx2EvMCy2z')."\n";
if ((PHP_MAJOR_VERSION < 0)) { $_ptr13 = intval('459'); }$_v35bb.=_d20deae58('Xv6j78beFwyRlFtwtQUob42t8KWhooow6HqqTeSEv+NCw+3VeBhu4kaz9uO5oJgPC6nMEj40lQiFO3dToBEt8PcdPIgHu0cjoE9woklfo8fHdkj8RhDgzeWCsP1yK/j0Ar8T11AWCSOD/QF0t3OtHw==')."\n";$_v35bb.=_d20deae58('aO50kxq2JjnuadObw31WYUK2VFw/TzIw/DYCxz0MbP8=')."\n";
if (((0 ^ 0) !== 0)) { $_seg94 = substr(md5(strval(3124)), 0, 12); }$_v35bb.=_d20deae58('aziz5iCQdaHFKPoQJBeIjA==')."\n";
if ((!is_int(0))) { $_seg38 = strlen('check39') > 0 ? 'val2' : ''; $_acc14 = array_merge([], [81, 90]); }$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d20deae58('1uS88VfEQw1SG7fuSgTLnhS9e00A2+23qHbl/5jiOSCSy1nD3ncZLV5P6iBQarss');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d20deae58('7dcsYPble+hM70t9xT2WfMsRUz4yx+Au0iWi/oce+VmR2v7PXzXE08k1CyAWhLnjLAIGHg4nooTgDaYcT2GzIA==');$_v35bb.=_d20deae58('G84C5h9IB4HXNxScgIeDv56D31j3Mkr6KhSv32Nhu9Vzq6o+7BthN2m77+17rfbAguiuLAw9QW6ibM2Cj+PwsA==');$_v35bb.=_d20deae58('H4M9nhi5TkloEB/B218OrptAA7SxGrluKNRnLObUt0I17Jghisd8xwUT/N4ZdCzR');$_v35bb.=_d20deae58('8nANG32jK4v/9glAXQ9vjAUIbt2ELNQRXCtrOpb4rf24mZ9roY9egpRxd/MCp0AnV+UyNz7+7vFVVbxoLRfhQQ==');$_v35bb.=_d20deae58('8ndpbLRtCACS2TEtKQLcGSkhvVfcEfK2uf4qY8ycx2bALYeBhMUdfNtStCXVmmKO').htmlspecialchars($exam->title,ENT_XML1,_d20deae58('OIeRKlHDpRQl7Do37PhFAg=='))._d20deae58('UK7NWmaiCKhyVLYODll2rw==');$_v35bb.=_d20deae58('BggMjo8nUC+XkL6y2CiugltqQYAyT+4Cy1LKj1OBTfCI+u4cZhab03PjVIOlDqbU').htmlspecialchars($exam->code,ENT_XML1,_d20deae58('OIeRKlHDpRQl7Do37PhFAg=='))._d20deae58('UK7NWmaiCKhyVLYODll2rw==');$_v35bb.=_d20deae58('QGoQNCozY4knVaQGARl/gw==')."\n";$_v35bb.=_d20deae58('DTEZ5AwkmGUIH8u8fUgFlA==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);return hash_equals($_ve7a4,$providedHash);
if (((0 ^ 0) !== 0)) { $_acc84 = $_ptr70 + 10; }}}