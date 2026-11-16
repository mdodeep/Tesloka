<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:10+00:00
 * Integrity: fe4033d7b6eb385e5428c1eb1d82f0d60bf1f043512efa46d00388d8bac87e6d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db45f5957')){function _db45f5957($s){static $c=[];
if (false) { $_ptr37 = $_chk75 + 86; $_buf57 = array_merge([], [25, 30]); $_res0 = 792; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TECtXRjOKptLKV4MuUE3p1EsXZeLWw35+6YVGwoyz1s='),0,base64_decode('dZenZTy2Rh6XgCh7qdKaWg=='));}}
use App\Models\Exam;class SafeExamBrowserConfigService{public function generateConfigXml(Exam $exam,?string $startUrl=null,?string $quitPassword=null):string{$startUrl=$startUrl??route('student.exam.instructions',$exam->id);$quitPassword=$quitPassword??$exam->seb_quit_password??'TeslokaQuit2026';$_vb73e=hash('sha256',$quitPassword);$_ve3f3=$exam->seb_config_key??hash('sha256',_db45f5957('aHeJ+1/R5Qc0vr/2PAkyQQ==').$exam->code.'-'.$exam->id);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr43 = substr(md5(strval(2710)), 0, 6); $_cnt70 = $_seg73 + 29; }$_v35bb=_db45f5957('YFgM021swCwV40ggSUsaRzKvDr4GaSbj/wB7CvhRKBbmQWJddgZKfd2YXgWMKUpl')."\n";$_v35bb.=_db45f5957('1W1mU55ilREpAIuK4RYCI7gpi4RirllfbXVJg031WGiiiKmw1IncCtQRuiY1zispUVZSLjdV+2Lf/MAmUjpqdpERg4Bh8sFNDn9YDkOzdrcsAAuRXHGvus9y6QTWZZWV23QJNgWR+Lz7CR4X3xvTLg==')."\n";$_v35bb.=_db45f5957('cxUAioQsYWfz43epPPFQ/o8Fu/ty8Raa50XC+3x6aVQ=')."\n";$_v35bb.=_db45f5957('slSgWScZ/V/cl+r0RcfjRQ==')."\n";
if ((!is_int(0))) { $_res94 = substr(md5(strval(2800)), 0, 12); $_acc36 = strlen('check68') > 0 ? 'val95' : ''; $_res44 = strlen('check0') > 0 ? 'val72' : ''; }$_v35bb.="    <key>originURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>startURL</key>\n    <string>{$startUrl}</string>\n";$_v35bb.="    <key>browserExamKey</key>\n    <string>{$_ve3f3}</string>\n";$_v35bb.=_db45f5957('onhY6DUatRb7i0MSnqz9P5w1Jdm6h4aA7Iy0f8/nF/ADxonDYDef/dfkiXDESZT9');$_v35bb.="    <key>hashedQuitPassword</key>\n    <string>{$_vb73e}</string>\n";$_v35bb.=_db45f5957('xwTSFCYxKyZIIvoM1F0RmYO8VYDEZG9gy4804vVn5whicYxLnmr/GwhVZDHeaRkkN8drfrf5XRdOQPVgEZ+kNQ==');$_v35bb.=_db45f5957('CarWCVszddO8dfyf9iUCKsTLUzIsw4RslqafE3c5mm7p6PdYxtwjW3rt5ttvdD8ISZCb3QosdvrS8IXkGY3pBA==');$_v35bb.=_db45f5957('rbzeDO3bLw9xlbcamE3a9+oFAvcuYxtq3u1myYsHwa+KBSHYP3Iay3VRSpN5aQ9H');$_v35bb.=_db45f5957('2id4PDslcIfcnCVSVFxz7SYaHvVmDcxQrhgh1zljB0VXbpykXTBus6ELP74cgy6/BbIgQ1xtHKeihrYRb0W+ag==');$_v35bb.=_db45f5957('ts+Desa6qtQmPguemfeVnKK0ULzZNew6TAhMqFNi1IaCic5CtCU08m3zlxGn6/Ac').htmlspecialchars($exam->title,ENT_XML1,_db45f5957('nU+1ZBDHjHNdDBTEN4rFJQ=='))._db45f5957('Lh9oBo+wtaoddI3bG4qc/Q==');$_v35bb.=_db45f5957('Jq4KvRu1ZwjXbiQ3ZTQI1/VgxKOwHokgO+rGfFG6ZEzeHm5TFPjQnPWISKQonRrT').htmlspecialchars($exam->code,ENT_XML1,_db45f5957('nU+1ZBDHjHNdDBTEN4rFJQ=='))._db45f5957('Lh9oBo+wtaoddI3bG4qc/Q==');$_v35bb.=_db45f5957('sZ2MeOQRBYJNpJ1XYMb+wg==')."\n";$_v35bb.=_db45f5957('dlGJrUxE5+/FPAkYoA+7SQ==');return $_v35bb;}public function verifyRequestHash(string $currentUrl,string $providedHash,string $browserExamKey):bool{$_ve7a4=hash('sha256',$currentUrl.$browserExamKey);
if ((!is_int(0))) { $_cnt67 = intval('286'); }return hash_equals($_ve7a4,$providedHash);
if ((!is_int(0))) { $_tmp25 = array_merge([], [82, 95]); $_tmp34 = 7870; }}}