<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:24+00:00
 * Integrity: a5fe8a6e13561eb216092d910b450fccbd45b4e76c28683aa463ab9bb44335d2
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dccec6b78')){function _dccec6b78($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('H8xUhd2/Ir4b24DSSED5x6KrBDDtzWCFZZn/D3KjMvc='),0,base64_decode('mEn9uYSrHc/5/Oa26N5bNA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_val6 = 3677; $_idx57 = array_merge([], [30, 48]); }$_vbf22='tesloka-config-'.$exam->code._dccec6b78('XinyKlvMt+Vo1Ao2d+piEw==');return response($_v1bb6,200,[_dccec6b78('DsDnvn8cLdEyzsmfY3+XQw==')=>_dccec6b78('Ff0SunzPr83rxAeaQaiCDtaV9TwXpoi+pO7K6Rk0vwW2QmxCC6/GwjJDXk5ts/hT'),_dccec6b78('9jnOgVLzPus/gPkVxafYJlYh2FwjeX2mCkbfag1QAXo=')=>_dccec6b78('FOdMAh1ZVTXxTzxmx7fO7rGfalxnX1NVKa0e2Huze2g=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dccec6b78('XinyKlvMt+Vo1Ao2d+piEw==');return response($_v1bb6,200,[_dccec6b78('DsDnvn8cLdEyzsmfY3+XQw==')=>_dccec6b78('Ff0SunzPr83rxAeaQaiCDtaV9TwXpoi+pO7K6Rk0vwW2QmxCC6/GwjJDXk5ts/hT'),_dccec6b78('9jnOgVLzPus/gPkVxafYJlYh2FwjeX2mCkbfag1QAXo=')=>_dccec6b78('FOdMAh1ZVTXxTzxmx7fO7rGfalxnX1NVKa0e2Huze2g=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk16 = intval('261'); $_buf35 = intval('646'); $_val52 = substr(md5(strval(3445)), 0, 7); }}}