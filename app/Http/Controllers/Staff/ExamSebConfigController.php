<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:41+00:00
 * Integrity: f3813c1e31973cceeeb864a337ef872c326c3fc947b27027c8e0169ff65a2b4b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d58916b83')){function _d58916b83($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EBY5HQc41SYHg09RqZvXwGV9xTy5wi1rrgb616HLTSs='),0,base64_decode('RXZotbOtwENA1knfz6GAqA=='));
if (((0 ^ 0) !== 0)) { $_buf67 = $_idx29 + 18; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d58916b83('aAj+E8MwKcwjGXiG/i0lew==');return response($_v1bb6,200,[_d58916b83('CXMwmpKLtiOnEubucVxBPg==')=>_d58916b83('RQHhyJCcyb2pQesjBTXwIV6yWlHSt+xxuTL52FBnMPufBEtoRjO1+RijmKIx7sYd'),_d58916b83('pApHZZsbz8J7ykhfOsHt0ov2b9+7dddWgcId3fJHfu8=')=>_d58916b83('idgw39BLtR810/H7OFOfFYmPpJsV0mbRQ4Mk+kV97Cc=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val75 = 7986; $_tmp79 = intval('599'); }$_vbf22='tesloka-exam-'.$exam->code._d58916b83('aAj+E8MwKcwjGXiG/i0lew==');
if (((~0 & 0) !== 0)) { $_tmp98 = 3749; }return response($_v1bb6,200,[_d58916b83('CXMwmpKLtiOnEubucVxBPg==')=>_d58916b83('RQHhyJCcyb2pQesjBTXwIV6yWlHSt+xxuTL52FBnMPufBEtoRjO1+RijmKIx7sYd'),_d58916b83('pApHZZsbz8J7ykhfOsHt0ov2b9+7dddWgcId3fJHfu8=')=>_d58916b83('idgw39BLtR810/H7OFOfFYmPpJsV0mbRQ4Mk+kV97Cc=').$_vbf22.'"',]);}}