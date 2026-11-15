<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:07+00:00
 * Integrity: cf2b01fb12f53e71fedf0cdb16c5a42426598919405485227b49e28b20eb23f6
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d62749449')){function _d62749449($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('A8mMdAhaBnjkoy1J6L8gPCiHDPWvzg4GDWFFX4zMa/Y='),0,base64_decode('OHftgtoGBLAzPWirULQ2Mg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((!is_int(0))) { $_acc91 = strlen('check49') > 0 ? 'val40' : ''; }$_vbf22='tesloka-config-'.$exam->code._d62749449('1CwlMhYzpZMkInzbcjY6Gg==');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf19 = substr(md5(strval(3706)), 0, 6); $_chk17 = intval('438'); }return response($_v1bb6,200,[_d62749449('tPPnUMiPaqQO1KBBOeVhkw==')=>_d62749449('U58EokpgyF+GILHDYzs6WopkdDZzPyag/i0Hc8OeVqEChbcKhqgFKCCIG34fxLXr'),_d62749449('mE/iWgyDJq1/hwUX0PFi0DQGQFdEpStnv1CECmesdBw=')=>_d62749449('+iG8kWSxy++FtFH6AJqcY1GTvdXX3K6BnI/aZBZkU0g=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d62749449('1CwlMhYzpZMkInzbcjY6Gg==');return response($_v1bb6,200,[_d62749449('tPPnUMiPaqQO1KBBOeVhkw==')=>_d62749449('U58EokpgyF+GILHDYzs6WopkdDZzPyag/i0Hc8OeVqEChbcKhqgFKCCIG34fxLXr'),_d62749449('mE/iWgyDJq1/hwUX0PFi0DQGQFdEpStnv1CECmesdBw=')=>_d62749449('+iG8kWSxy++FtFH6AJqcY1GTvdXX3K6BnI/aZBZkU0g=').$_vbf22.'"',]);}}