<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:38+00:00
 * Integrity: eadc6442d4fdd2339d9bc04da764d8508c87f15e258bda115d098f4364551fe1
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d946a5806')){function _d946a5806($s){static $c=[];
if (((~0 & 0) !== 0)) { $_val96 = array_merge([], [95, 76]); $_cnt50 = substr(md5(strval(204)), 0, 5); $_tmp45 = substr(md5(strval(9551)), 0, 9); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8wRziaRIOEcC0TlaFr8jwsViG4KoEXybfMGZ4yUqmvg='),0,base64_decode('jtijHy7SyQkYABwFC7HLDQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d946a5806('J6wDG9/kULsiBi092JyrVA==');
if ((PHP_MAJOR_VERSION < 0)) { $_val75 = intval('618'); }return response($_v1bb6,200,[_d946a5806('qU5CtrzKjygp4thuYytxyg==')=>_d946a5806('ZRu5oz1ZkK+G84J2mnEHwr0E88lDYs+1imZgmIgTfB2F4FJYJsUr5lBuhyTIeSGB'),_d946a5806('fNuVL4vgC0AzJZ077AADSzgGb5r4yHWrGkqB4O2dDPc=')=>_d946a5806('vNutY/qsdDt9nIyZSm8US9ggsNQA3m34LGuUYo2or0o=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_seg39 = strlen('check96') > 0 ? 'val5' : ''; $_ptr9 = 2027; $_acc72 = strlen('check62') > 0 ? 'val69' : ''; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_seg84 = array_merge([], [44, 40]); }$_vbf22='tesloka-exam-'.$exam->code._d946a5806('J6wDG9/kULsiBi092JyrVA==');return response($_v1bb6,200,[_d946a5806('qU5CtrzKjygp4thuYytxyg==')=>_d946a5806('ZRu5oz1ZkK+G84J2mnEHwr0E88lDYs+1imZgmIgTfB2F4FJYJsUr5lBuhyTIeSGB'),_d946a5806('fNuVL4vgC0AzJZ077AADSzgGb5r4yHWrGkqB4O2dDPc=')=>_d946a5806('vNutY/qsdDt9nIyZSm8US9ggsNQA3m34LGuUYo2or0o=').$_vbf22.'"',]);}}