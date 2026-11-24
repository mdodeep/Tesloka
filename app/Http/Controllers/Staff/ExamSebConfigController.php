<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:13+00:00
 * Integrity: ed578415b6063a4f7277d32c75ec3669fd2350a44f520a075435ad6fdddded7c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d818d156e')){function _d818d156e($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc20 = intval('682'); $_cnt90 = 7690; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XNDJa6VRxBy43H6UFuG9yyp50eYKlhN2k7GBF+wBa0k='),0,base64_decode('psT7zKUqQHUgY0jkFW01fw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val18 = intval('131'); $_ptr71 = strlen('check23') > 0 ? 'val0' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d818d156e('ENyhmJIqLtP1Z3xzNOpDwQ==');
if ((PHP_MAJOR_VERSION < 0)) { $_idx48 = intval('308'); }return response($_v1bb6,200,[_d818d156e('nvR2WhOHFe32cREA+7c0kQ==')=>_d818d156e('xf28tzNXrllp/XHlE4ziKJ5zbSqXVNw/CLWA4uTJlfSJvTKBD3kv6Q59Ybjd4gMd'),_d818d156e('Z9a7/tOpHpATF0R/xhorireOXNm0829/BwtT3GZVRJA=')=>_d818d156e('6mw8Npjv6rKE6W/ZanfB1mj2qCFIIhZvRaIqmQFjH1Q=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx20 = intval('443'); $_chk19 = intval('211'); $_buf31 = 2142; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d818d156e('ENyhmJIqLtP1Z3xzNOpDwQ==');return response($_v1bb6,200,[_d818d156e('nvR2WhOHFe32cREA+7c0kQ==')=>_d818d156e('xf28tzNXrllp/XHlE4ziKJ5zbSqXVNw/CLWA4uTJlfSJvTKBD3kv6Q59Ybjd4gMd'),_d818d156e('Z9a7/tOpHpATF0R/xhorireOXNm0829/BwtT3GZVRJA=')=>_d818d156e('6mw8Npjv6rKE6W/ZanfB1mj2qCFIIhZvRaIqmQFjH1Q=').$_vbf22.'"',]);}}