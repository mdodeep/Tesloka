<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:05+00:00
 * Integrity: 2dd5e69a57b3c93d41101bfaa52adb374bd27091b2f752434367e6ab869eb8ad
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d21e0d3e1')){function _d21e0d3e1($s){static $c=[];
if ((!is_int(0))) { $_cnt34 = substr(md5(strval(4645)), 0, 7); $_idx91 = $_tmp29 + 93; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+jfLVPwYNhBDlmLHIYizsWWmxUxO1M3RDvBN0B4ZTEY='),0,base64_decode('wdIThBUGnn3BUM2edt1cRQ=='));
if (((~0 & 0) !== 0)) { $_chk90 = array_merge([], [18, 39]); $_cnt43 = intval('242'); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d21e0d3e1('if+ovpk0p8AqURFNlVbcFQ==');return response($_v1bb6,200,[_d21e0d3e1('7HDA4lPV7WIGNxov1kwk5A==')=>_d21e0d3e1('EpBabViah5jMVR6cT3my+qK4MJX+7m+qkktjCresMIeqgSPc9JJs9i0kbn6UKm3g'),_d21e0d3e1('0MMGuHFwmmkHrAzhFZA3dNcekZ8fl4CPIAUwSqIzfRQ=')=>_d21e0d3e1('SNPwog7oGrlRSuVFsZO2JQweLwyxHpLrBuIGrFg+UQE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d21e0d3e1('if+ovpk0p8AqURFNlVbcFQ==');return response($_v1bb6,200,[_d21e0d3e1('7HDA4lPV7WIGNxov1kwk5A==')=>_d21e0d3e1('EpBabViah5jMVR6cT3my+qK4MJX+7m+qkktjCresMIeqgSPc9JJs9i0kbn6UKm3g'),_d21e0d3e1('0MMGuHFwmmkHrAzhFZA3dNcekZ8fl4CPIAUwSqIzfRQ=')=>_d21e0d3e1('SNPwog7oGrlRSuVFsZO2JQweLwyxHpLrBuIGrFg+UQE=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp20 = $_tmp37 + 49; $_seg15 = $_seg88 + 46; $_chk22 = strlen('check87') > 0 ? 'val66' : ''; }}}