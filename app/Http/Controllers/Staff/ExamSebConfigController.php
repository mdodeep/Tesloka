<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:54+00:00
 * Integrity: 069aae80014f8b145eee4766833951f5de0258b1604929dfe810a04a7065d3a4
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d040a9af3')){function _d040a9af3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KcnHHuR1UasBPyQo83yEwUtIw0bdeHM+N2sezH8uX2U='),0,base64_decode('XoK0VzRcG1wejA6EPOdCIQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d040a9af3('qmLHWZBAuH7Vwvt+qMZyAw==');return response($_v1bb6,200,[_d040a9af3('wZTqBFIr5f1UerNB9NlI8w==')=>_d040a9af3('NufvJowwiQzZ/IKxmSGMqnUoTa3zSOXgpRs8YB4A7Ko5jomuBmJaI0adZaYU4R2o'),_d040a9af3('ajGQ7Wlb3oUAodIUdkXz0pJERK+G2lmy5opaUuBAjRI=')=>_d040a9af3('A8HZNwk1G6IY6FJ3dXBCkvgBQqTWOHLHMX7b+M5V4+s=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_seg7 = $_ptr54 + 2; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d040a9af3('qmLHWZBAuH7Vwvt+qMZyAw==');return response($_v1bb6,200,[_d040a9af3('wZTqBFIr5f1UerNB9NlI8w==')=>_d040a9af3('NufvJowwiQzZ/IKxmSGMqnUoTa3zSOXgpRs8YB4A7Ko5jomuBmJaI0adZaYU4R2o'),_d040a9af3('ajGQ7Wlb3oUAodIUdkXz0pJERK+G2lmy5opaUuBAjRI=')=>_d040a9af3('A8HZNwk1G6IY6FJ3dXBCkvgBQqTWOHLHMX7b+M5V4+s=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk1 = substr(md5(strval(6735)), 0, 11); $_idx3 = strlen('check94') > 0 ? 'val40' : ''; $_seg98 = substr(md5(strval(8921)), 0, 14); }}}