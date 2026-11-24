<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:19+00:00
 * Integrity: c52094fb62dd774d7da392aff24276112696d8dec7cb5010adefe002da7dbb02
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d6fba4fbf')){function _d6fba4fbf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VRqR7liTElbJ1RR+2sXXDId4Ul4pOQy5bVEVKy4AodA='),0,base64_decode('Ec0Ngc2XS6D5VvBiLYQHaw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d6fba4fbf('QkPM5NDv8/+Pc6n7Ms0KZg==');return response($_v1bb6,200,[_d6fba4fbf('CVo6dbMEPl2sd8ntagrKUA==')=>_d6fba4fbf('d/hSy8XpcerNzyOROy+tPOJdlN2mU0jdM+wonM8DOJ7zcPCO4ETC2Ud4tYS4YWVs'),_d6fba4fbf('RBAURhIL0iCuEHk7eIBUy1exE3A4UA/dbwGQ1PfNOHw=')=>_d6fba4fbf('hgFn/SnMq1h/4CidDWbN8wZfoJefiTcNTDw2pCY6/28=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_val17 = substr(md5(strval(5463)), 0, 13); $_cnt94 = strlen('check12') > 0 ? 'val86' : ''; $_ptr61 = $_ptr31 + 75; }$_vbf22='tesloka-exam-'.$exam->code._d6fba4fbf('QkPM5NDv8/+Pc6n7Ms0KZg==');return response($_v1bb6,200,[_d6fba4fbf('CVo6dbMEPl2sd8ntagrKUA==')=>_d6fba4fbf('d/hSy8XpcerNzyOROy+tPOJdlN2mU0jdM+wonM8DOJ7zcPCO4ETC2Ud4tYS4YWVs'),_d6fba4fbf('RBAURhIL0iCuEHk7eIBUy1exE3A4UA/dbwGQ1PfNOHw=')=>_d6fba4fbf('hgFn/SnMq1h/4CidDWbN8wZfoJefiTcNTDw2pCY6/28=').$_vbf22.'"',]);}}