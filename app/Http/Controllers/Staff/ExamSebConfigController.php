<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:07+00:00
 * Integrity: 1a02436c104e5dab3368f3e13b9e45e67fc9641e30fe1dfc500cfac385464928
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dad42820d')){function _dad42820d($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt30 = substr(md5(strval(435)), 0, 4); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LcQjOPE3o3TrjkMAbDrOzz+UQH9B7cAkr4v8NhEN5Gw='),0,base64_decode('nHTLUzQcRv/4ySsNI7F6Xw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dad42820d('IOKTZYHFxaZrRqUhipxedg==');return response($_v1bb6,200,[_dad42820d('2QzgmA8u6FK1u1ojoPZWcg==')=>_dad42820d('Uo9ntAdkj0UFb/y6IG9+oDEGH4JlavP3FEYf4zxuDd4X5FzfM5PNMHdSqL78iSTS'),_dad42820d('hS0CgLuJk8bwCBXSscE8KjprPTNbIhysz3cuBHHld6o=')=>_dad42820d('hBzQG8tFOiU0Ey5FBdgOmwIGWrj14GAnpPvE1c3fjpA=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_ptr53 = strlen('check26') > 0 ? 'val41' : ''; $_chk87 = $_acc85 + 80; }$_vbf22='tesloka-exam-'.$exam->code._dad42820d('IOKTZYHFxaZrRqUhipxedg==');return response($_v1bb6,200,[_dad42820d('2QzgmA8u6FK1u1ojoPZWcg==')=>_dad42820d('Uo9ntAdkj0UFb/y6IG9+oDEGH4JlavP3FEYf4zxuDd4X5FzfM5PNMHdSqL78iSTS'),_dad42820d('hS0CgLuJk8bwCBXSscE8KjprPTNbIhysz3cuBHHld6o=')=>_dad42820d('hBzQG8tFOiU0Ey5FBdgOmwIGWrj14GAnpPvE1c3fjpA=').$_vbf22.'"',]);
if (false) { $_cnt87 = 5724; $_ptr93 = 2435; $_ptr62 = intval('209'); }}}