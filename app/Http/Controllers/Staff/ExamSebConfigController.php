<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:00+00:00
 * Integrity: 1ff9cbfd9255c8641d73100f6358ea39ce32c52764955613582885bead5d34a2
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc0ef8601')){function _dc0ef8601($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0SL1MvG+nRCVMdOe9aAAJ/Lks6Fs9HWEVkzt633Ru1o='),0,base64_decode('s26D2wuH67GF61knfeRXxQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr40 = substr(md5(strval(1635)), 0, 16); $_val11 = 1329; $_tmp85 = strlen('check2') > 0 ? 'val34' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dc0ef8601('0hpT1jQx1JIMuY/9tZnNdg==');return response($_v1bb6,200,[_dc0ef8601('e+z4FIUIz55oVrqJZ3VCyA==')=>_dc0ef8601('5FDd6P35w5uvqH2G477oap7fr1q7zIHn8cnZvwRA9dzz3zyV9kJrQuR+WiRHV/FD'),_dc0ef8601('HSkZMSShQfX73hiM4z+ZxN8hbyQG6bxrW7nOg0cwRAQ=')=>_dc0ef8601('fRCg+ilLMOOXfTW+pAKT3058Ag2UdU2l/B4ih2phjU4=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dc0ef8601('0hpT1jQx1JIMuY/9tZnNdg==');return response($_v1bb6,200,[_dc0ef8601('e+z4FIUIz55oVrqJZ3VCyA==')=>_dc0ef8601('5FDd6P35w5uvqH2G477oap7fr1q7zIHn8cnZvwRA9dzz3zyV9kJrQuR+WiRHV/FD'),_dc0ef8601('HSkZMSShQfX73hiM4z+ZxN8hbyQG6bxrW7nOg0cwRAQ=')=>_dc0ef8601('fRCg+ilLMOOXfTW+pAKT3058Ag2UdU2l/B4ih2phjU4=').$_vbf22.'"',]);}}