<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4f6c4ebc')){function _d4f6c4ebc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SLwJDRY3UO2/B+V0DFNtNRA/SUJmYS4S+mftdzFAZRs='),0,base64_decode('07CHOZ03Iv5BgrQt5n1BSA=='));}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';
if ((PHP_MAJOR_VERSION < 0)) { $_val59 = array_merge([], [65, 79]); }$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_d4f6c4ebc('J/L+eT0haezO0fQSBSgSMg==').$exam->code.'-'.$exam->id);
if ((!is_int(0))) { $_buf44 = $_seg63 + 26; $_cnt81 = 9576; }$_v35bb=_d4f6c4ebc('LlXuenDuo2VleP1A7c6nR0HIzQpiqsvCcRrK1ClykKJVAjTtDdmPnxfZRBCyMitz')."\n";
if (((0 ^ 0) !== 0)) { $_tmp38 = substr(md5(strval(7820)), 0, 14); }$_v35bb.=_d4f6c4ebc('MHjBEr2lLfzOugWlrJlI5wk9QRfCrGh8iDWBGbTNP7maib8WSEleFYlVJcagPPCyIGQoyNfgeF6cwi/wKEzdZl0W6jtXQlvi3GmUZ9IfhFoJccjOAdmBCSBbulCeCgh4EycZFLlTJLGPMPEj5IrK4A==')."\n";$_v35bb.=_d4f6c4ebc('TvTTHIdpvx1YGbO1VDCadtpYBw+Kj1eDt3RM8U2qrqU=')."\n";
if ((PHP_MAJOR_VERSION < 0)) { $_idx94 = 1330; $_buf79 = substr(md5(strval(7826)), 0, 11); }$_v35bb.=_d4f6c4ebc('zW3pcMIpCvVzTghsTOHLcw==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d4f6c4ebc('jqIap9WHqPA04hqUY/I3F6VikNmObKL268lp0rqH73XHTJY2DTbCsbGceUGQY8UI');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d4f6c4ebc('lYeh7llkwfO6U5BAyrq406gw9rgfgF+kgzGPa++jXoFGyc8AByUFk9Gtu5HIMxQVj+vs+j+NRnpm0maNmgqSOw==');$_v35bb.=_d4f6c4ebc('cZNVEzhe/mesxdDfRIvlBIBvh3tGewGi4QBnHPq+q1zkHv8FSWMIumfuvjiSZ0+NL0cBNHx041iPacKHolzlOA==');$_v35bb.=_d4f6c4ebc('yiMbwUJxdEDh7gQ3iaUaw8lLATdh4Q95irqkaTcix6/nCV2sKl2loWuZrAPTkzWM');$_v35bb.=_d4f6c4ebc('/pKWU5KfFqS+zzcsy1CoMDfB/BNQsUjpZ+rpAUD3nxdmx3CuMYgRQUQeybeisZhfw6GjyPUyJK3rFKWR83Fr9g==');$_v35bb.=_d4f6c4ebc('qzdPsoXRkwoVrR2k69E2oMYE6YRhPELk6rJz+dIharJhsq+pRLRGL5LzlGtUGvYP').htmlspecialchars($exam->title,ENT_XML1,_d4f6c4ebc('n9lmosQrsexjNXRsCpWBRg=='))._d4f6c4ebc('XhfRddOK+LmBgdTxdp+V9Q==');$_v35bb.=_d4f6c4ebc('9kxTGtKoj05LcnUYm4F1co1vtrmvlxyW2PbhZEjbO9diYj01IDQ7XUm5J+z9OVsl').htmlspecialchars($exam->code,ENT_XML1,_d4f6c4ebc('n9lmosQrsexjNXRsCpWBRg=='))._d4f6c4ebc('XhfRddOK+LmBgdTxdp+V9Q==');$_v35bb.=_d4f6c4ebc('a0Higw6/Bi6Ai6O1abEkxw==')."\n";$_v35bb.=_d4f6c4ebc('Qa8uJqTzoeyfLGg/GL0WCg==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);return hash_equals($_ve7a4,$providedHash);}}