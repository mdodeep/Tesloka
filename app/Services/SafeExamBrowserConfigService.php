<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:49+00:00
 * Integrity: 6e48eacd37c0657c17bcb61b20d2efb1699df9d30aeab06f678e96aad97f6c95
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d50dd0c6c')){function _d50dd0c6c($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val6 = intval('583'); $_ptr70 = intval('105'); $_seg43 = intval('274'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pC9+yWAgvW6XtJgJt7BOYtouXK4Z1d6/Ygxkf8XUmdA='),0,base64_decode('gc3imTeZza2Maidwtw1HEw=='));
if (false) { $_idx27 = $_tmp73 + 63; $_tmp5 = array_merge([], [19, 12]); $_chk95 = 5540; }}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';$_vb73e=hash('sha256',$quitPassword);
if (false) { $_acc99 = $_cnt70 + 100; }$_ve3f3=$exam->seb_config_key??hash('sha256',_d50dd0c6c('nJPCS92uaOQo5KA9/5B3nA==').$exam->code.'-'.$exam->id);
if (((0 ^ 0) !== 0)) { $_idx97 = $_seg62 + 75; $_seg3 = strlen('check77') > 0 ? 'val17' : ''; $_tmp9 = substr(md5(strval(6498)), 0, 15); }$_v35bb=_d50dd0c6c('lvRTP8UiKEeM1tsWJHvP0rYIg2kUsCurYuS5koVAfbkYiCv0uvtaXzxYaV7RFYWu')."\n";$_v35bb.=_d50dd0c6c('txl2Jl7lIyukm4AFN18oBU1HWG2+yg6Hw3ip4zK4IQj1cO2WaaesNBwZIAbTYdCwmhnAGz1ksm0Zr3v1n1mf/+jlM1auQkoop/xdcGem18eiPDKH3zdlQL7ltgGs75FujybMjxTrh0F1hbBvo/Izrw==')."\n";$_v35bb.=_d50dd0c6c('LN2Zps3YZdlHRvS+O3nxUjjQjuV6sKoEbPrdDOd2wnU=')."\n";
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp14 = 7884; }$_v35bb.=_d50dd0c6c('fkYonwwG00ZUpPgKz/2Ihg==')."\n";$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_d50dd0c6c('d1kr3YRxiivdafrzxRG0FfWzyYJ8tKsoHU1GhzZILsBdSWq5ZCLzTUCFKglxFyTu');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_d50dd0c6c('CkN5otapoCP8SK4LV0Vdp8UMF/VCdFWTZ6KwZDCMCWpsitDU/KL38fGEtMxv+D79nepeWfug9HDg4cVOetdmmg==');$_v35bb.=_d50dd0c6c('7C2ft7plBDztuA3HZ1x+rn+D0x/EtTwQS3XGHf0fY299aVKUwSlnsD64dItcWQB4K5tOkC2L0/Ul6tYSoKq+AQ==');$_v35bb.=_d50dd0c6c('44dg5pQJ0tYUXAUC31G+1GdYz2iJBkAb7QOAxbukX/nGh1rsXH/DxVcUUi/6kets');$_v35bb.=_d50dd0c6c('En6SNOMFSpjzPU+8dbajcgDVokw+wCV5ybBllQo+rSsO4Ggj93gYYbRnYH0WJEwTDI/p6YS3S/aj8wSqMgjQ1g==');$_v35bb.=_d50dd0c6c('VPIRP9B3KboYSdITVG+mOXJsbGPTe7CnERjbBzdLKr4BPw88aSH79U0Im6TnIOdq').htmlspecialchars($exam->title,ENT_XML1,_d50dd0c6c('IAYNgGv9GtSiK4TVjhf69w=='))._d50dd0c6c('CsuPN2pv4vvS84bi/Yz/dQ==');$_v35bb.=_d50dd0c6c('8yKWoEjzS4m4UGcyiQZdBAa2uJtzxAzPD0Xvidj/ODN/WyQCZn0NgcF1zeHHdjAw').htmlspecialchars($exam->code,ENT_XML1,_d50dd0c6c('IAYNgGv9GtSiK4TVjhf69w=='))._d50dd0c6c('CsuPN2pv4vvS84bi/Yz/dQ==');$_v35bb.=_d50dd0c6c('6phg2hN8r5U61z7IBT8KQw==')."\n";$_v35bb.=_d50dd0c6c('cU0SWEEYHaZFnoVY2aLoFg==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);
if (((~0 & 0) !== 0)) { $_val46 = strlen('check91') > 0 ? 'val41' : ''; $_buf94 = strlen('check1') > 0 ? 'val81' : ''; }return hash_equals($_ve7a4,$providedHash);}}