<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:36+00:00
 * Integrity: 074f9f57e386c0fb439ea72e8b3c050b81e2c948c6e3c0349aba811f6b60ed9b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4a133612')){function _d4a133612($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc3 = intval('677'); $_seg99 = substr(md5(strval(6855)), 0, 4); $_chk70 = $_cnt99 + 35; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('w2mKBSnWe/2pUMf71tasg0fQnydzyX9Adnib0BmNbmo='),0,base64_decode('WNXa+LBQ+zJxisYYTdeEEQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr16 = $_res27 + 84; $_chk56 = strlen('check29') > 0 ? 'val7' : ''; $_seg55 = array_merge([], [5, 8]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d4a133612('pgfaLxp4U42Jalu2VcQmbQ==');return response($_v1bb6,200,[_d4a133612('Ls786PSNuf9A+oWiRU1RgA==')=>_d4a133612('i/hVzzg92O7GecXEw/WxerH5VkdamXtvASLQI9sEQGzeAl8Uebk91fhW51Aga2XF'),_d4a133612('dYV87Q2WHa9J2QuJ1MBWix+O7xCqAgFHliUK+/Zvsu8=')=>_d4a133612('Gcgp14gbBlzRFKV9TlSU6UaHqZA1mC6deWTl+AvdC6U=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_acc9 = 7201; $_tmp45 = intval('942'); $_tmp97 = intval('659'); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d4a133612('pgfaLxp4U42Jalu2VcQmbQ==');return response($_v1bb6,200,[_d4a133612('Ls786PSNuf9A+oWiRU1RgA==')=>_d4a133612('i/hVzzg92O7GecXEw/WxerH5VkdamXtvASLQI9sEQGzeAl8Uebk91fhW51Aga2XF'),_d4a133612('dYV87Q2WHa9J2QuJ1MBWix+O7xCqAgFHliUK+/Zvsu8=')=>_d4a133612('Gcgp14gbBlzRFKV9TlSU6UaHqZA1mC6deWTl+AvdC6U=').$_vbf22.'"',]);}}