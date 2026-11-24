<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:32+00:00
 * Integrity: 638e00437b39c709ed636692b6e11ac7db04c96daad57d7f7e990459630e0184
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d361c329d')){function _d361c329d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hE311v150VLQ9LVePRtM9d1wHSmMd3biG/f/LtRaAfI='),0,base64_decode('Q+CPsD6RCGiiInkyg4BgBQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_val69 = strlen('check76') > 0 ? 'val28' : ''; $_val30 = array_merge([], [91, 67]); }$_vbf22='tesloka-config-'.$exam->code._d361c329d('JxtDn50uDya+lEYnOf1ZwQ==');
if (((0 ^ 0) !== 0)) { $_val30 = strlen('check74') > 0 ? 'val72' : ''; $_res97 = substr(md5(strval(1929)), 0, 13); $_seg97 = strlen('check24') > 0 ? 'val73' : ''; }return response($_v1bb6,200,[_d361c329d('vhuiejO7MojRp+o+froWdA==')=>_d361c329d('AXoejKGqVAZjCnwriZLrLjq/sdnHa7r3X/MQFb0Q9RpGmmFO5m+rjCZIHbWMuxke'),_d361c329d('tyHxocXwHf2tDj4xgZPJ6OWhdWrpZmU3lHlhLkOOC1E=')=>_d361c329d('Tzxvqti7Vc/fNvqs7vVO6g7CxUiqrjoqhr8v+Xs62KU=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d361c329d('JxtDn50uDya+lEYnOf1ZwQ==');return response($_v1bb6,200,[_d361c329d('vhuiejO7MojRp+o+froWdA==')=>_d361c329d('AXoejKGqVAZjCnwriZLrLjq/sdnHa7r3X/MQFb0Q9RpGmmFO5m+rjCZIHbWMuxke'),_d361c329d('tyHxocXwHf2tDj4xgZPJ6OWhdWrpZmU3lHlhLkOOC1E=')=>_d361c329d('Tzxvqti7Vc/fNvqs7vVO6g7CxUiqrjoqhr8v+Xs62KU=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_chk63 = intval('123'); }}}