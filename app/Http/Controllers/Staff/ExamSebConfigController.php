<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:08+00:00
 * Integrity: 25688b6170e974b3a8060ace7aeff48f9488f7f7100c49aadc732205d7f8c83a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc02591e9')){function _dc02591e9($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk89 = substr(md5(strval(5396)), 0, 6); $_cnt30 = strlen('check43') > 0 ? 'val11' : ''; $_idx29 = 4548; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ThlSpvW29CoybeoGL3mPRSLcS70d/Wx0Je9/SDV4KE4='),0,base64_decode('XyhczzfOEj6+mXrY0iC0aA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_res57 = substr(md5(strval(7972)), 0, 5); }$_vbf22='tesloka-config-'.$exam->code._dc02591e9('7AOE7nDZuPnaypHtpAOVPA==');return response($_v1bb6,200,[_dc02591e9('gurKfypeYMIpajxQXoRUwQ==')=>_dc02591e9('I0qcOXdFQ625c1VA2KeEEHVLqYkttJ3Jw7ehygHlSpeo5bpWEtVWCZoztPstUMvV'),_dc02591e9('sFBhJ581i5eGdIHOanbbW5tLuPw7vs21YOKBVLrhdRU=')=>_dc02591e9('VuBxTy1OEZiuGQPv/18FdxMZNjUsybDKmSBiqpBPBVU=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf70 = strlen('check23') > 0 ? 'val62' : ''; }$_vbf22='tesloka-exam-'.$exam->code._dc02591e9('7AOE7nDZuPnaypHtpAOVPA==');
if (((0 ^ 0) !== 0)) { $_res79 = substr(md5(strval(1324)), 0, 8); $_ptr68 = 6336; $_cnt93 = $_acc45 + 91; }return response($_v1bb6,200,[_dc02591e9('gurKfypeYMIpajxQXoRUwQ==')=>_dc02591e9('I0qcOXdFQ625c1VA2KeEEHVLqYkttJ3Jw7ehygHlSpeo5bpWEtVWCZoztPstUMvV'),_dc02591e9('sFBhJ581i5eGdIHOanbbW5tLuPw7vs21YOKBVLrhdRU=')=>_dc02591e9('VuBxTy1OEZiuGQPv/18FdxMZNjUsybDKmSBiqpBPBVU=').$_vbf22.'"',]);}}