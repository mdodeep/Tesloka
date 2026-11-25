<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:38+00:00
 * Integrity: bf6c319ab5b796ebaf91aa315aa89e1aa7257172d8826841c57ee098c167bf8e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de888f121')){function _de888f121($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sIfkMwy4vOjm8NDqeitp2IvaV8xgJjWvyhMG6z3vS/A='),0,base64_decode('u4iKaGYnWQ6MglFaqFT8cg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_acc55 = intval('429'); }$_vbf22='tesloka-config-'.$exam->code._de888f121('dxidzermSSlJs70NbXpazQ==');return response($_v1bb6,200,[_de888f121('DMWQBtWx8D/i2eAe26bd7w==')=>_de888f121('Be0s9xDoCKnJHKKWG+Ck/GuV2vS+QvUazOcIT3/fDYJb2IZPfpjP3KunieIjWU92'),_de888f121('GO/44KpImiAJR2ZBAPEscdpGdjHgbpD4Iy5wi51EiAI=')=>_de888f121('iioEJHVTUKCr8fHYFMrYrWQgV87KeeVulUlKfRYjldk=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk76 = strlen('check53') > 0 ? 'val54' : ''; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._de888f121('dxidzermSSlJs70NbXpazQ==');return response($_v1bb6,200,[_de888f121('DMWQBtWx8D/i2eAe26bd7w==')=>_de888f121('Be0s9xDoCKnJHKKWG+Ck/GuV2vS+QvUazOcIT3/fDYJb2IZPfpjP3KunieIjWU92'),_de888f121('GO/44KpImiAJR2ZBAPEscdpGdjHgbpD4Iy5wi51EiAI=')=>_de888f121('iioEJHVTUKCr8fHYFMrYrWQgV87KeeVulUlKfRYjldk=').$_vbf22.'"',]);}}