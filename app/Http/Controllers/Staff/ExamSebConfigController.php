<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:31+00:00
 * Integrity: 3849ab4825874ba3b4a694f789db49a2717d82dbfb50c0c7a56a0c623d677587
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_daedd99ee')){function _daedd99ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jbelqb+evqRV2DTg4EqMlutiZWkird9XY1wUyErDPc4='),0,base64_decode('K77Oj8XBgp/vFAKmKztnjw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx49 = intval('681'); }$_vbf22='tesloka-config-'.$exam->code._daedd99ee('fTFxfysXlC7ny0dmDVFYqw==');return response($_v1bb6,200,[_daedd99ee('r9zc+ja5nzDiLdqdUi30ag==')=>_daedd99ee('EcyRHSavXY2MncEN0CngtGSHBIqLSd38njqCwj6xqZXTYDALBmHLqU4MWMXI2WYO'),_daedd99ee('IrkiHrlA3xmoRO4nLO7UyyYtkw/j7cktzphnluJtL/8=')=>_daedd99ee('DfF48pHxfzby6GQnldbRy4hZ0obdQWqsB5U3E4iBlsE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._daedd99ee('fTFxfysXlC7ny0dmDVFYqw==');return response($_v1bb6,200,[_daedd99ee('r9zc+ja5nzDiLdqdUi30ag==')=>_daedd99ee('EcyRHSavXY2MncEN0CngtGSHBIqLSd38njqCwj6xqZXTYDALBmHLqU4MWMXI2WYO'),_daedd99ee('IrkiHrlA3xmoRO4nLO7UyyYtkw/j7cktzphnluJtL/8=')=>_daedd99ee('DfF48pHxfzby6GQnldbRy4hZ0obdQWqsB5U3E4iBlsE=').$_vbf22.'"',]);
if (((~0 & 0) !== 0)) { $_tmp93 = array_merge([], [96, 28]); $_tmp54 = array_merge([], [59, 79]); }}}