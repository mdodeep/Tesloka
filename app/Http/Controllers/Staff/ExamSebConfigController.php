<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:19+00:00
 * Integrity: bf2697bb1f9255c265ae45edf604e6bc661d7bf26f919e87b20c3c60ced12910
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d305e70d0')){function _d305e70d0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Y34t6XUVJx7KNZpe1pEHvR2nRZf2qvlsj8X/vmwMKVc='),0,base64_decode('tkTHRa85TcC24gEsr7YdQQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_tmp3 = 42; $_seg22 = intval('756'); }$_vbf22='tesloka-config-'.$exam->code._d305e70d0('MNHF+NChm/OaslVfE9DC6w==');return response($_v1bb6,200,[_d305e70d0('80Slw93qhKhLsS5ZsGVCXQ==')=>_d305e70d0('b70bQ5j9WR+WQM4bpUF9b+bGubrMobO5oeZiDXB1W4HRP9xxfBMXi/6ERJv3lMCd'),_d305e70d0('u+yCs8eeTlB5LXb81hKZYkwxe80rWMtKG5ynzznT1JA=')=>_d305e70d0('yUMaTzBzjZVVGWGlWEAcvgo4tg4MR1qeqx37+4rO7bo=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d305e70d0('MNHF+NChm/OaslVfE9DC6w==');return response($_v1bb6,200,[_d305e70d0('80Slw93qhKhLsS5ZsGVCXQ==')=>_d305e70d0('b70bQ5j9WR+WQM4bpUF9b+bGubrMobO5oeZiDXB1W4HRP9xxfBMXi/6ERJv3lMCd'),_d305e70d0('u+yCs8eeTlB5LXb81hKZYkwxe80rWMtKG5ynzznT1JA=')=>_d305e70d0('yUMaTzBzjZVVGWGlWEAcvgo4tg4MR1qeqx37+4rO7bo=').$_vbf22.'"',]);}}