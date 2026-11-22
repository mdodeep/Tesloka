<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:51+00:00
 * Integrity: d89b680fda11b37f0c12073e1821d6b1f752ce1b56962530251429e20d3e6a36
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dbf743c1d')){function _dbf743c1d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rLZKh4MldHaxrq0REdEGxcxlDuyaJSvquTBM7GAtUdo='),0,base64_decode('Y9Lx1KSUxNX1+kVc8IFUuw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dbf743c1d('AmU4BVowFfloTaxWVs9RfQ==');return response($_v1bb6,200,[_dbf743c1d('UjaloxgCCxJvXPOKo9HMSg==')=>_dbf743c1d('tUiiT3nlqiEeELLHyh7SFNVMCGkAWH10W+9+JBYjbWfrSkzV+CIHSQX7xKi2/qJc'),_dbf743c1d('6cs7jyl8+otsx+xAq9FA1BExpujV+RfS60m2Az9LW54=')=>_dbf743c1d('3sDa0oQ3IU7qsCvqvAJPLmDUdpvToAPCe4RKpbdayOE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_val84 = $_val88 + 30; }$_vbf22='tesloka-exam-'.$exam->code._dbf743c1d('AmU4BVowFfloTaxWVs9RfQ==');
if ((PHP_MAJOR_VERSION < 0)) { $_buf49 = strlen('check35') > 0 ? 'val95' : ''; }return response($_v1bb6,200,[_dbf743c1d('UjaloxgCCxJvXPOKo9HMSg==')=>_dbf743c1d('tUiiT3nlqiEeELLHyh7SFNVMCGkAWH10W+9+JBYjbWfrSkzV+CIHSQX7xKi2/qJc'),_dbf743c1d('6cs7jyl8+otsx+xAq9FA1BExpujV+RfS60m2Az9LW54=')=>_dbf743c1d('3sDa0oQ3IU7qsCvqvAJPLmDUdpvToAPCe4RKpbdayOE=').$_vbf22.'"',]);}}