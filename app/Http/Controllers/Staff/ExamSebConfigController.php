<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:09+00:00
 * Integrity: a91e29094976d1766c3ee1aa493fd3ef1fe827291d2b2c6f89c361f45473ca24
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd166e679')){function _dd166e679($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EO9GzBXyliiIvGJnV7Bed/NhegBOkI3bOwhIWZbaIxg='),0,base64_decode('O6hZp/yL0N1uRxEaIC5pKg=='));
if (((0 ^ 0) !== 0)) { $_buf55 = intval('701'); $_chk50 = strlen('check33') > 0 ? 'val18' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dd166e679('4EoACnA7gRYo44UHg2JgzQ==');return response($_v1bb6,200,[_dd166e679('5RiTEMi8/Rg0cXlxUod8pA==')=>_dd166e679('QA2NW/+vXkemCkCtQFl3OwD8fqgFvtzJA0+aW2ddtxD4qKAoJX3M+HtLZ4/7sftA'),_dd166e679('XqBXnBNaf/N8/76RruNtTqq2YKSzAMVsvQ4giqytgyE=')=>_dd166e679('aRsger3qkFM9xwMI+CIHYTdMtusxytTtVx22kEbnDug=').$_vbf22.'"',]);
if (((~0 & 0) !== 0)) { $_idx68 = substr(md5(strval(4643)), 0, 7); $_res98 = intval('85'); $_res29 = intval('307'); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dd166e679('4EoACnA7gRYo44UHg2JgzQ==');return response($_v1bb6,200,[_dd166e679('5RiTEMi8/Rg0cXlxUod8pA==')=>_dd166e679('QA2NW/+vXkemCkCtQFl3OwD8fqgFvtzJA0+aW2ddtxD4qKAoJX3M+HtLZ4/7sftA'),_dd166e679('XqBXnBNaf/N8/76RruNtTqq2YKSzAMVsvQ4giqytgyE=')=>_dd166e679('aRsger3qkFM9xwMI+CIHYTdMtusxytTtVx22kEbnDug=').$_vbf22.'"',]);}}