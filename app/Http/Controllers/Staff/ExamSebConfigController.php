<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dfcb20e05')){function _dfcb20e05($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Y6Gs7JtCNgO1HVMS/x4soZLkLUPDCmjldIPtOUUIsZ4='),0,base64_decode('ypErcbcAWKoPcKPIE/yyWg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_idx97 = 3756; }$_vbf22='tesloka-config-'.$exam->code._dfcb20e05('3UVtrhaDrFZSxbVRKHnNtw==');return response($_v1bb6,200,[_dfcb20e05('WV1Zb0lYEb0H43zvrKjm1w==')=>_dfcb20e05('vXpWKhc/7TDQqymHwO3mm3ElMK5LUl9AHzygtcDblsO6VSHLkeiYjSlXBy6w83vX'),_dfcb20e05('NP4XJkKXy/0LD/NJngqHJ7YnbZoHVf0pDnEGpkY4Q58=')=>_dfcb20e05('8k+EAOd1ri0eQ/0O5Hm9dGDRfFgdmS15xa1sbfvuBiE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_res84 = array_merge([], [61, 52]); $_seg26 = substr(md5(strval(379)), 0, 14); $_buf51 = substr(md5(strval(116)), 0, 6); }$_vbf22='tesloka-exam-'.$exam->code._dfcb20e05('3UVtrhaDrFZSxbVRKHnNtw==');return response($_v1bb6,200,[_dfcb20e05('WV1Zb0lYEb0H43zvrKjm1w==')=>_dfcb20e05('vXpWKhc/7TDQqymHwO3mm3ElMK5LUl9AHzygtcDblsO6VSHLkeiYjSlXBy6w83vX'),_dfcb20e05('NP4XJkKXy/0LD/NJngqHJ7YnbZoHVf0pDnEGpkY4Q58=')=>_dfcb20e05('8k+EAOd1ri0eQ/0O5Hm9dGDRfFgdmS15xa1sbfvuBiE=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr78 = strlen('check8') > 0 ? 'val68' : ''; }}}