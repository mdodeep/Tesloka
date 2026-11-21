<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:06+00:00
 * Integrity: c9d7966c24fe3fa93e867919c540843af66add96af41be40323cc35363442315
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_ddb939d87')){function _ddb939d87($s){static $c=[];
if (((~0 & 0) !== 0)) { $_val98 = intval('230'); $_seg98 = array_merge([], [6, 42]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vjH9N5fPSdubJYxr7RF9lr4ME4c2M4ehnF98516QGlE='),0,base64_decode('FmTfhjXsFCXsMHC8lGjyqA=='));
if (((0 ^ 0) !== 0)) { $_cnt25 = strlen('check17') > 0 ? 'val44' : ''; $_cnt70 = 8720; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._ddb939d87('PAq9Xe4pe6F7DL0fcDsfAg==');return response($_v1bb6,200,[_ddb939d87('KB7nqPn22mmH65s1FaM+8Q==')=>_ddb939d87('1b70naVegOjB2UxDjCPedAmetL0PZBpsDUP1Gwmx97GJTjNRr+ARbxAzGMNkMHrN'),_ddb939d87('W9At1ZTEBEhGgzozUQngVyJwO71+oqqjWBA4S00fF/s=')=>_ddb939d87('gKs9liPT9MLSpvhovQTLrzve6csQPuqdMpayFpoL9EY=').$_vbf22.'"',]);
if (((~0 & 0) !== 0)) { $_res75 = 7284; $_cnt80 = substr(md5(strval(6272)), 0, 16); $_val76 = intval('149'); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((!is_int(0))) { $_tmp5 = intval('451'); $_val77 = substr(md5(strval(7327)), 0, 4); $_seg26 = intval('320'); }$_vbf22='tesloka-exam-'.$exam->code._ddb939d87('PAq9Xe4pe6F7DL0fcDsfAg==');
if (((~0 & 0) !== 0)) { $_ptr66 = array_merge([], [34, 31]); $_val65 = $_chk60 + 95; }return response($_v1bb6,200,[_ddb939d87('KB7nqPn22mmH65s1FaM+8Q==')=>_ddb939d87('1b70naVegOjB2UxDjCPedAmetL0PZBpsDUP1Gwmx97GJTjNRr+ARbxAzGMNkMHrN'),_ddb939d87('W9At1ZTEBEhGgzozUQngVyJwO71+oqqjWBA4S00fF/s=')=>_ddb939d87('gKs9liPT9MLSpvhovQTLrzve6csQPuqdMpayFpoL9EY=').$_vbf22.'"',]);}}