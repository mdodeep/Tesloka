<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:39+00:00
 * Integrity: 47cf6c71fa26da8d34c42e105435eb64fbeb635c23a80176d5c4abadb7c0e876
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_df0ce2bc2')){function _df0ce2bc2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('827NKP9tE36Eud+dVPEHl849aBDmeQh5PsJs43V1LUQ='),0,base64_decode('wc6Qka301P/8v4byasHYXA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk83 = 7796; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((!is_int(0))) { $_chk68 = $_val27 + 97; $_tmp92 = substr(md5(strval(2660)), 0, 14); $_tmp39 = intval('89'); }$_vbf22='tesloka-config-'.$exam->code._df0ce2bc2('23ep1FZ06r+yjYAucEwkOw==');return response($_v1bb6,200,[_df0ce2bc2('j17TyZRvxnNvx+SimpYDKg==')=>_df0ce2bc2('tiQX5d0AAF4MX3xjAOcV5/rv5sPICpVLD2uGQMIhs9Fosmif3nNo4j1Hct68udbp'),_df0ce2bc2('C2RVaSK70YJZYdzKTaiEwEs9aWDXoPN7SBxzC3rKiLk=')=>_df0ce2bc2('rdAWpbctqeCkAWcm7Neh86IWYdd+BKaQW5PkD/Yv1i0=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._df0ce2bc2('23ep1FZ06r+yjYAucEwkOw==');
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr74 = array_merge([], [88, 5]); $_val5 = $_res27 + 2; $_idx99 = substr(md5(strval(8927)), 0, 14); }return response($_v1bb6,200,[_df0ce2bc2('j17TyZRvxnNvx+SimpYDKg==')=>_df0ce2bc2('tiQX5d0AAF4MX3xjAOcV5/rv5sPICpVLD2uGQMIhs9Fosmif3nNo4j1Hct68udbp'),_df0ce2bc2('C2RVaSK70YJZYdzKTaiEwEs9aWDXoPN7SBxzC3rKiLk=')=>_df0ce2bc2('rdAWpbctqeCkAWcm7Neh86IWYdd+BKaQW5PkD/Yv1i0=').$_vbf22.'"',]);}}