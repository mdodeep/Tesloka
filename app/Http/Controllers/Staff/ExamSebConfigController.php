<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:11+00:00
 * Integrity: 18033bdbbd117fcdc1b55ec178618f18b1128aad964cb1e9ea3b511af2f22e35
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4fcc7e53')){function _d4fcc7e53($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YYZ1Q2Qhqj2iAjTyM65nvKFsRehHB25Su3h7aL81Kpo='),0,base64_decode('IFYDj3fKwXjuIgrpwvBc5g=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d4fcc7e53('06z86D/I76lAbj1Vpe/Gyw==');return response($_v1bb6,200,[_d4fcc7e53('Hvs/xhON56iEgkN/DFAGmA==')=>_d4fcc7e53('IvjA60O+Nr7sDxu3VcPPdR/bSDuWZjLDuUg9zSP6pwtSWn+EceYghcZduyv+m0qy'),_d4fcc7e53('Da0x+1oLB22PtJej4q/fUampW0RBs7dIkgnlxJqJhgg=')=>_d4fcc7e53('XQPP3fF0Tv1a25SHzp1D+bYSeDsnxN5u3EoOri3qD+E=').$_vbf22.'"',]);
if (false) { $_res67 = intval('618'); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d4fcc7e53('06z86D/I76lAbj1Vpe/Gyw==');
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp51 = array_merge([], [59, 11]); }return response($_v1bb6,200,[_d4fcc7e53('Hvs/xhON56iEgkN/DFAGmA==')=>_d4fcc7e53('IvjA60O+Nr7sDxu3VcPPdR/bSDuWZjLDuUg9zSP6pwtSWn+EceYghcZduyv+m0qy'),_d4fcc7e53('Da0x+1oLB22PtJej4q/fUampW0RBs7dIkgnlxJqJhgg=')=>_d4fcc7e53('XQPP3fF0Tv1a25SHzp1D+bYSeDsnxN5u3EoOri3qD+E=').$_vbf22.'"',]);
if (((~0 & 0) !== 0)) { $_chk27 = substr(md5(strval(5936)), 0, 6); $_acc52 = intval('224'); }}}