<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:06+00:00
 * Integrity: 9469bd68ed4c2adc76efee84baf6c826c30ba97ba055fcde4818add4db0214ad
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d2d606638')){function _d2d606638($s){static $c=[];
if ((!is_int(0))) { $_seg98 = substr(md5(strval(4390)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mRzm1ZljzbCQB2NQZMI0fJJVrsN0AzNGEeFCTsVmmT0='),0,base64_decode('5+/+XAVJdguWISDWm0ICtA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_chk59 = substr(md5(strval(8873)), 0, 10); $_val46 = intval('4'); $_tmp79 = array_merge([], [87, 70]); }$_vbf22='tesloka-config-'.$exam->code._d2d606638('SvIC6uVdMr3efFTOhyFJ8Q==');return response($_v1bb6,200,[_d2d606638('7FZpehD7EKGT1Tw2jnzhFg==')=>_d2d606638('hziD2TEA34wDXHWpMEQnxIyaZXQDbCZmLudVDehek7x2xyc7/FT2Krp5yheQsLEr'),_d2d606638('Ce/zSbYzp7R6odP1lKEfBbFLSATJTTpWe/+iTnFSdgY=')=>_d2d606638('kojtDbMC6wCguQr3q6t3I1Kxq71VOJyAhKejxFnUPEU=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d2d606638('SvIC6uVdMr3efFTOhyFJ8Q==');return response($_v1bb6,200,[_d2d606638('7FZpehD7EKGT1Tw2jnzhFg==')=>_d2d606638('hziD2TEA34wDXHWpMEQnxIyaZXQDbCZmLudVDehek7x2xyc7/FT2Krp5yheQsLEr'),_d2d606638('Ce/zSbYzp7R6odP1lKEfBbFLSATJTTpWe/+iTnFSdgY=')=>_d2d606638('kojtDbMC6wCguQr3q6t3I1Kxq71VOJyAhKejxFnUPEU=').$_vbf22.'"',]);
if ((!is_int(0))) { $_val53 = strlen('check58') > 0 ? 'val38' : ''; }}}