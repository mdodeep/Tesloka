<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:58+00:00
 * Integrity: fe7cad9f73c87f8bd8f1c95ec69592b1f759bbac7bfe6bb29e22a3792570d311
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_ddb7a5e8e')){function _ddb7a5e8e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KOE4veB66OuTdOmY0mu6bLk9+hqXfwK/Oq8zyCD8kEI='),0,base64_decode('ApuYZ3AFODVi3QRbLPB1MQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._ddb7a5e8e('1JAkxhHJN5WgTMdVCRnQVQ==');return response($_v1bb6,200,[_ddb7a5e8e('PrfLKEgm/bARBL10QN1m+Q==')=>_ddb7a5e8e('MomOxM8ef2CT5g28NKqPsmAfU4ohDCHxcSYGns+HL19whQx4z3jitgr2DnU31/n2'),_ddb7a5e8e('wy9UfqRI/9UZcyoX48UJp/6UZUc1HOupNs60gEnQXRA=')=>_ddb7a5e8e('Y+zkZyr4YmvyoQDEZBRwD6Zmy0vpbfRZdxa/zwTP3MM=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt27 = 7516; $_acc90 = substr(md5(strval(4124)), 0, 6); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_ptr79 = array_merge([], [19, 61]); $_buf18 = $_chk14 + 19; }$_vbf22='tesloka-exam-'.$exam->code._ddb7a5e8e('1JAkxhHJN5WgTMdVCRnQVQ==');return response($_v1bb6,200,[_ddb7a5e8e('PrfLKEgm/bARBL10QN1m+Q==')=>_ddb7a5e8e('MomOxM8ef2CT5g28NKqPsmAfU4ohDCHxcSYGns+HL19whQx4z3jitgr2DnU31/n2'),_ddb7a5e8e('wy9UfqRI/9UZcyoX48UJp/6UZUc1HOupNs60gEnQXRA=')=>_ddb7a5e8e('Y+zkZyr4YmvyoQDEZBRwD6Zmy0vpbfRZdxa/zwTP3MM=').$_vbf22.'"',]);}}