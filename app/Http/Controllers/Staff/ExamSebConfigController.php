<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:05+00:00
 * Integrity: 36ecef682d85d0059c562038b66ae3a67f8a9b1d9f87aab5d3d603bd99e75e02
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4d0f2c71')){function _d4d0f2c71($s){static $c=[];
if (false) { $_ptr65 = 1281; $_idx88 = $_res81 + 29; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UkH13/nEY/sjhNK9axaAFHTdoLaxXhkMJ//dLMlQrSo='),0,base64_decode('a86n7zWWVq/QObylj11z6Q=='));
if (((0 ^ 0) !== 0)) { $_tmp35 = 6426; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d4d0f2c71('qCy2ZYIMM4kmn/p3mDw8bg==');return response($_v1bb6,200,[_d4d0f2c71('648Bk2UC5CPinp4zPXyUGw==')=>_d4d0f2c71('/63TNLj/OIthRm+JIFgovJCt3a2E++F/WAxouSzddzp7jKAeO64QO0fq1bjFP0aV'),_d4d0f2c71('NlbMPlP/0Nb2JgLgMXJBwi+TXeFUfDpELMY1WzgllGI=')=>_d4d0f2c71('t0tfitgsVG2r/unF9I3wwe81h3SKOPcDiIZBUZLd+C4=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d4d0f2c71('qCy2ZYIMM4kmn/p3mDw8bg==');
if ((!is_int(0))) { $_seg64 = substr(md5(strval(4616)), 0, 15); }return response($_v1bb6,200,[_d4d0f2c71('648Bk2UC5CPinp4zPXyUGw==')=>_d4d0f2c71('/63TNLj/OIthRm+JIFgovJCt3a2E++F/WAxouSzddzp7jKAeO64QO0fq1bjFP0aV'),_d4d0f2c71('NlbMPlP/0Nb2JgLgMXJBwi+TXeFUfDpELMY1WzgllGI=')=>_d4d0f2c71('t0tfitgsVG2r/unF9I3wwe81h3SKOPcDiIZBUZLd+C4=').$_vbf22.'"',]);}}