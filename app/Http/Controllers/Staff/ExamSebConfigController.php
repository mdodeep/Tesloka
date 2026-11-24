<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:46+00:00
 * Integrity: 92aefeaf8963d51f9bcb7f619d992533af220caf5d9da962fcacfc4f4ce417a3
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9d0be327')){function _d9d0be327($s){static $c=[];
if (((~0 & 0) !== 0)) { $_ptr76 = 3324; $_idx53 = array_merge([], [71, 64]); $_acc10 = array_merge([], [25, 15]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('v5YaDXyze6Ss9y3tFWSh2mvzvRepcOzepw3LzcGka2A='),0,base64_decode('xIsjzioGz4ii8S3si6Bing=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d9d0be327('1u9HJx1hdG65yYpN1T2zNQ==');return response($_v1bb6,200,[_d9d0be327('/cphvv7c4cwto2Q0uvqFyg==')=>_d9d0be327('JJJ0Bn8hr1IeN1EGmxAR/lTB/6tKdUHr7uLCYGKHE/XrAbdjG8yp2JUw1h/AvJxi'),_d9d0be327('ABlneIzviJaZHCYTcjT3O3qPNB2yTNAIs5sWccN5/Xs=')=>_d9d0be327('PubQiPDyA3PR/wfY38ZEmxG9hrrL9n456J8rB0tMldY=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp61 = array_merge([], [53, 21]); $_res50 = $_ptr38 + 80; }$_vbf22='tesloka-exam-'.$exam->code._d9d0be327('1u9HJx1hdG65yYpN1T2zNQ==');return response($_v1bb6,200,[_d9d0be327('/cphvv7c4cwto2Q0uvqFyg==')=>_d9d0be327('JJJ0Bn8hr1IeN1EGmxAR/lTB/6tKdUHr7uLCYGKHE/XrAbdjG8yp2JUw1h/AvJxi'),_d9d0be327('ABlneIzviJaZHCYTcjT3O3qPNB2yTNAIs5sWccN5/Xs=')=>_d9d0be327('PubQiPDyA3PR/wfY38ZEmxG9hrrL9n456J8rB0tMldY=').$_vbf22.'"',]);}}