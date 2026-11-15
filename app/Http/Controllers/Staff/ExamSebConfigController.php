<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:34+00:00
 * Integrity: f5de456ce7b5a3ffff444b8d6e857cd97d6610ca1b6892c02107dfc3b0b527ec
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4aaa30a3')){function _d4aaa30a3($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk48 = 1384; $_res3 = 8154; $_acc30 = 4791; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('i9itZFrwUXQkbjd1nvUVr2W63fQBR2pT5x7IMP/a/JA='),0,base64_decode('9hTObgIchX7DapXS0tz2HA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx96 = substr(md5(strval(1685)), 0, 6); $_cnt87 = substr(md5(strval(7254)), 0, 13); $_val5 = array_merge([], [4, 27]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp11 = strlen('check56') > 0 ? 'val84' : ''; $_seg41 = $_val45 + 43; }$_vbf22='tesloka-config-'.$exam->code._d4aaa30a3('pnQnXW7jtJR1qr40LT/dcg==');return response($_v1bb6,200,[_d4aaa30a3('aw6k4aZnYoFzuZHuPdGR+g==')=>_d4aaa30a3('j0VC4iE+OpLgXfoxSw/cObwRarjjJscjB4T2ppctclppBaeLzHpthHES+dEvE/kY'),_d4aaa30a3('8cDnYB6r9OPjH7PucDUCyIObKmTDn0UxIeo7SacWq2w=')=>_d4aaa30a3('FzF/ZACIEAelq1CAFoFuY+LIG8tsMwllu4lmcNhayT0=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d4aaa30a3('pnQnXW7jtJR1qr40LT/dcg==');return response($_v1bb6,200,[_d4aaa30a3('aw6k4aZnYoFzuZHuPdGR+g==')=>_d4aaa30a3('j0VC4iE+OpLgXfoxSw/cObwRarjjJscjB4T2ppctclppBaeLzHpthHES+dEvE/kY'),_d4aaa30a3('8cDnYB6r9OPjH7PucDUCyIObKmTDn0UxIeo7SacWq2w=')=>_d4aaa30a3('FzF/ZACIEAelq1CAFoFuY+LIG8tsMwllu4lmcNhayT0=').$_vbf22.'"',]);}}