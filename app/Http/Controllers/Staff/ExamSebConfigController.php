<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:46+00:00
 * Integrity: 6d480bf24397a8787400a12fcfafad98bbe874b4827b16950292fe23f0519324
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4fa4d690')){function _d4fa4d690($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp50 = $_chk60 + 40; $_seg1 = substr(md5(strval(5358)), 0, 10); $_acc64 = 5031; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NiS9eNe+PT2KntlJP/dbEvAquXJ7GH2egWBM1WbdMAQ='),0,base64_decode('LQp+2cuz79ySCMStFzTF7A=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d4fa4d690('pH9j5a7Adul1/KbCEMI0RQ==');return response($_v1bb6,200,[_d4fa4d690('3wq2bMTTolcWzD+0stZJFw==')=>_d4fa4d690('BDKI86gx8e13jrxbVMarEnNqLBxqazeci5cq2Gxecnozk+4uGYcrE10L0477Fhvd'),_d4fa4d690('xXJNhGytFertjDS9220nUAwGHOLJj7WALogkVMo8hw0=')=>_d4fa4d690('/035KS8lba9+6Frs/syhzHZOhFqUCWlLMja0rHZ/KEk=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_val64 = $_buf82 + 59; }$_vbf22='tesloka-exam-'.$exam->code._d4fa4d690('pH9j5a7Adul1/KbCEMI0RQ==');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf57 = substr(md5(strval(9530)), 0, 10); }return response($_v1bb6,200,[_d4fa4d690('3wq2bMTTolcWzD+0stZJFw==')=>_d4fa4d690('BDKI86gx8e13jrxbVMarEnNqLBxqazeci5cq2Gxecnozk+4uGYcrE10L0477Fhvd'),_d4fa4d690('xXJNhGytFertjDS9220nUAwGHOLJj7WALogkVMo8hw0=')=>_d4fa4d690('/035KS8lba9+6Frs/syhzHZOhFqUCWlLMja0rHZ/KEk=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_val61 = array_merge([], [29, 9]); $_ptr64 = 4539; }}}