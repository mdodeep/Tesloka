<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:21+00:00
 * Integrity: f72c16032508f56682d776a99d37c35b9badc46c4ea64704e541c806067bf8de
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_df4dc2313')){function _df4dc2313($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('d0z8OMCUfms8Z6GqJyu0G+c8HEvPUM7E+wgBMKFNCFY='),0,base64_decode('DfOfzXntfMTOavuR3eXwuA=='));
if (((0 ^ 0) !== 0)) { $_tmp49 = intval('690'); $_buf67 = array_merge([], [4, 97]); $_cnt17 = substr(md5(strval(7295)), 0, 4); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_val65 = array_merge([], [43, 86]); $_idx21 = substr(md5(strval(9208)), 0, 7); $_val23 = array_merge([], [26, 39]); }$_vbf22='tesloka-config-'.$exam->code._df4dc2313('P5Ko8sD78Xy9yElE/HZNIA==');return response($_v1bb6,200,[_df4dc2313('kkp9Pnh6oxvUB5ecD2Cfqg==')=>_df4dc2313('9m1ZucPK02z9OwptLeTSL3IK+H4BlNOv0X05kXpUgU43l/03ofGw7RBLlFcXreek'),_df4dc2313('qMFY/e7tyUso9iVTZ3bNZsujoEh4h6xFjJ/DJoYMivo=')=>_df4dc2313('b9C7URW4JkRZN+RRnSA9erTwgCL85pMbqr5mS29qxG0=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_val96 = substr(md5(strval(7394)), 0, 7); $_acc13 = array_merge([], [17, 47]); $_acc81 = array_merge([], [63, 76]); }$_vbf22='tesloka-exam-'.$exam->code._df4dc2313('P5Ko8sD78Xy9yElE/HZNIA==');return response($_v1bb6,200,[_df4dc2313('kkp9Pnh6oxvUB5ecD2Cfqg==')=>_df4dc2313('9m1ZucPK02z9OwptLeTSL3IK+H4BlNOv0X05kXpUgU43l/03ofGw7RBLlFcXreek'),_df4dc2313('qMFY/e7tyUso9iVTZ3bNZsujoEh4h6xFjJ/DJoYMivo=')=>_df4dc2313('b9C7URW4JkRZN+RRnSA9erTwgCL85pMbqr5mS29qxG0=').$_vbf22.'"',]);}}