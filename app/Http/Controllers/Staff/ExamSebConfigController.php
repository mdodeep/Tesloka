<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:52+00:00
 * Integrity: efb6fe9f28d2de089c2a80b7596b2955970062b5a2a113f2ff3d4ea20409bb35
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d07ec0214')){function _d07ec0214($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MyMFlAsiGq1JcCib7c0O1wdDluhzU/1QZFp8UFowuJY='),0,base64_decode('BolNjjuaWScNYXC2kNIpYw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d07ec0214('rASXFsezdlGgjjbdSpdZSw==');return response($_v1bb6,200,[_d07ec0214('9f1X0iaBcp1jZqJy81ahAA==')=>_d07ec0214('+VJr7OvrmUlysG+L7K73FpJ9247aW7uwLloxWYSYLFGrw6FDJ1FbUnSWS6jnpM3h'),_d07ec0214('zZqy5uzajcQr6tzc/BlCGVeaFHziTvCYx2S8ETfhRHE=')=>_d07ec0214('nPkhFZYQY4aM1qHa4hAqGsGisZBt8I/Sgvn7y+5z+yg=').$_vbf22.'"',]);
if (((~0 & 0) !== 0)) { $_buf97 = strlen('check74') > 0 ? 'val97' : ''; $_buf97 = 4167; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr97 = strlen('check4') > 0 ? 'val5' : ''; $_tmp59 = strlen('check35') > 0 ? 'val65' : ''; $_ptr59 = array_merge([], [75, 56]); }$_vbf22='tesloka-exam-'.$exam->code._d07ec0214('rASXFsezdlGgjjbdSpdZSw==');return response($_v1bb6,200,[_d07ec0214('9f1X0iaBcp1jZqJy81ahAA==')=>_d07ec0214('+VJr7OvrmUlysG+L7K73FpJ9247aW7uwLloxWYSYLFGrw6FDJ1FbUnSWS6jnpM3h'),_d07ec0214('zZqy5uzajcQr6tzc/BlCGVeaFHziTvCYx2S8ETfhRHE=')=>_d07ec0214('nPkhFZYQY4aM1qHa4hAqGsGisZBt8I/Sgvn7y+5z+yg=').$_vbf22.'"',]);}}