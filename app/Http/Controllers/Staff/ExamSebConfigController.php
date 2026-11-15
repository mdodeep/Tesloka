<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:36+00:00
 * Integrity: d14550d7fd40bab3182de50c2bf5702a2c32f34da7ecba3b371eaa8fa965aa87
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3e13c2e1')){function _d3e13c2e1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lqtCd31FQOA1TqAvjilweyZ76u5SPoTABkxE0z9Vb3I='),0,base64_decode('RiJwE8677Yg7yxKRb7kNZg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d3e13c2e1('vRxfe/BwILo1pF7yrN8AGQ==');return response($_v1bb6,200,[_d3e13c2e1('DQ/8Igm2BGouvwpvKL2pXQ==')=>_d3e13c2e1('EHvDHSC9n7vUFxsm9mQPp9MBpxT+3/7SilYeNEcZQb/1gN0F+EKEGbwfZaffeXFw'),_d3e13c2e1('QiAG22StjIrlJ8M05bhXh6f94uj1LNwKUe2Dj9YsIFc=')=>_d3e13c2e1('FODzg705q3ixqlQureaj66R/rEguadbFdHZRD7SFhRI=').$_vbf22.'"',]);
if (false) { $_acc15 = 7237; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d3e13c2e1('vRxfe/BwILo1pF7yrN8AGQ==');return response($_v1bb6,200,[_d3e13c2e1('DQ/8Igm2BGouvwpvKL2pXQ==')=>_d3e13c2e1('EHvDHSC9n7vUFxsm9mQPp9MBpxT+3/7SilYeNEcZQb/1gN0F+EKEGbwfZaffeXFw'),_d3e13c2e1('QiAG22StjIrlJ8M05bhXh6f94uj1LNwKUe2Dj9YsIFc=')=>_d3e13c2e1('FODzg705q3ixqlQureaj66R/rEguadbFdHZRD7SFhRI=').$_vbf22.'"',]);}}