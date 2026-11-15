<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:29+00:00
 * Integrity: 70d9cc4ad1a6117188484a766b85d0e44fba40851435a8655312994255203c70
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de55c29cd')){function _de55c29cd($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val93 = strlen('check48') > 0 ? 'val44' : ''; $_val52 = substr(md5(strval(3579)), 0, 4); $_tmp69 = strlen('check70') > 0 ? 'val25' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jZsfkqVBr0/zNCHJAdrT7sv3QAaxp/56j/YpWBYJH20='),0,base64_decode('VtB6t9R+RtYn9eGMXsGzfg=='));
if ((!is_int(0))) { $_seg87 = intval('369'); }}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';
if (((~0 & 0) !== 0)) { $_val61 = 9499; }$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_de55c29cd('WJyO1Gu/szFA7mkBawNPTA==').$exam->code.'-'.$exam->id);
if ((PHP_MAJOR_VERSION < 0)) { $_val67 = substr(md5(strval(4878)), 0, 9); $_acc59 = $_ptr44 + 61; $_seg34 = intval('419'); }$_v35bb=_de55c29cd('T68b+UuY31bTDv2iC6grH4G53l/+pw3aZrMkshO6mR4CWMBhKrk+/jlTcFEely5O')."\n";$_v35bb.=_de55c29cd('t3mkNFd7bQY7/qX92u9gfMx33FMapLrWFhOL+41wHArLTyF9NMQMA9GXZZLYob5vWfxB+wPjKpexrxZHjelY7w7TnHRc/MF6YB5n2ClpiV6Y3DXWxRcm5HW5AsqoK65X/ClIdHixa4q490Rjj4KUVQ==')."\n";$_v35bb.=_de55c29cd('QVCJAZFvYjz2moKmvdqZlcmno6ZJldzfIamGizWFHK8=')."\n";$_v35bb.=_de55c29cd('W0q67TlaSSIFYJKj+dJ2FQ==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_de55c29cd('jx1dw9javGd/M+OTOaR5yUnwPy/jo4BvKFlwPmOLjLF/xZKItUueI1vXiVMG0QIm');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_de55c29cd('KlUgIjpxU1RZRwDebTJoNkcNhuQvzr9qsMfTDwn3xjnZeLgtd6yFEkibnBSPYNR91EKMvAmUb6R4G05G3lMGWg==');$_v35bb.=_de55c29cd('/YlOeq78jRiu2/HxQyC5yTN8Q54py7fZd4oZvJjWulm3dIIt/24gnFkw3RHslPjEXIa6dHpFPSlPiPu5ovBlyw==');$_v35bb.=_de55c29cd('d6Ju+jDfHmOz/+jdOzt4HmjEWU/hb+/DqTKbAGa5f+z71aoLdbsx9r6PsSoSPyDa');$_v35bb.=_de55c29cd('JH/3MQFeQSsmia3huCgygI+jitjtspa88akZZtNJ317VnMFGQkjjKBiImAfolY54fE2fkFFObHF6EyYOQ/BswQ==');$_v35bb.=_de55c29cd('UMSl7t21LSQlPH/hWwNekEqn4NhMvPaxeQnw9wDUt/va2LkkzdEGzlUV1Ecyko0c').htmlspecialchars($exam->title,ENT_XML1,_de55c29cd('wyiw5cXTifkDZsBGYSSVXA=='))._de55c29cd('qahfPVmDgdoOUHwrMkVOZg==');$_v35bb.=_de55c29cd('P4VKeI7g2Bv5s6voT9uy5Pi/6Q82x6Vf2Gd0CxzLpIEiTdYEVsWr0hrIYeUMJw4p').htmlspecialchars($exam->code,ENT_XML1,_de55c29cd('wyiw5cXTifkDZsBGYSSVXA=='))._de55c29cd('qahfPVmDgdoOUHwrMkVOZg==');$_v35bb.=_de55c29cd('9YYldnfH2t3Jht+7Uu208Q==')."\n";$_v35bb.=_de55c29cd('E29hx7hSbAL8d+JXFOkeFw==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);return hash_equals($_ve7a4,$providedHash);
if ((!is_int(0))) { $_cnt57 = 2200; $_tmp19 = 2779; $_ptr46 = array_merge([], [92, 11]); }}}