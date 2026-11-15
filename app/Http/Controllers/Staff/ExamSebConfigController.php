<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d8fd44b5f')){function _d8fd44b5f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('G1XkvYw1wCCwNR3HOPh7aLOyEncS0uyVDTqGcZRm2xY='),0,base64_decode('T9Dkqa22MqlcpR0WZPFMyA=='));
if (false) { $_chk88 = strlen('check52') > 0 ? 'val25' : ''; $_ptr62 = array_merge([], [19, 36]); $_ptr30 = array_merge([], [65, 76]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d8fd44b5f('s7xultlirCjJW8gGrxXR0g==');return response($_v1bb6,200,[_d8fd44b5f('xRtuVURysinVBPZuivqDIg==')=>_d8fd44b5f('UhjJ5nvBE9nJO31FMSJ9Wy9wmq2vYnhYYLWlpdZ45NqMFi7D1LS9B8y2LSuVpIeZ'),_d8fd44b5f('Nwp1A6oOmKGZwysmzs8REinGRIbHiBxa4F5MyecbFQA=')=>_d8fd44b5f('SF9oGEmJY8Gg6TKrABGRMNLqnDcfV/C+ydv2BnF8Z6M=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc64 = 8003; $_ptr67 = $_ptr87 + 95; $_seg66 = 5868; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d8fd44b5f('s7xultlirCjJW8gGrxXR0g==');return response($_v1bb6,200,[_d8fd44b5f('xRtuVURysinVBPZuivqDIg==')=>_d8fd44b5f('UhjJ5nvBE9nJO31FMSJ9Wy9wmq2vYnhYYLWlpdZ45NqMFi7D1LS9B8y2LSuVpIeZ'),_d8fd44b5f('Nwp1A6oOmKGZwysmzs8REinGRIbHiBxa4F5MyecbFQA=')=>_d8fd44b5f('SF9oGEmJY8Gg6TKrABGRMNLqnDcfV/C+ydv2BnF8Z6M=').$_vbf22.'"',]);}}