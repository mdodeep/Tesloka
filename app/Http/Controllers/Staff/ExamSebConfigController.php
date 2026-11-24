<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:48+00:00
 * Integrity: 99a8719a72617b78a331192f5bf6c0bfb5eaaf2789970854f6fb6bbfeade1166
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d693be8c5')){function _d693be8c5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xQYfXPcZ9CTxVypKarZ0wsvz0pxpIHF4UVQVKPq81oc='),0,base64_decode('OezSW7sxwpz74r1QIpfkTw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d693be8c5('t/I6a5FZK5DV/O/bNpfE+w==');
if ((!is_int(0))) { $_chk22 = array_merge([], [73, 0]); $_chk83 = 8407; $_res87 = 8098; }return response($_v1bb6,200,[_d693be8c5('Z6LiEesZigsW8YuFYaC2fQ==')=>_d693be8c5('jA3xhAsxRZwf20u0lPs2eR4qjY8JCvJsqNJC2UhQViiFvq5w2XRY/7A7HZDUcfO8'),_d693be8c5('MUkgDZJv6i7K2uPMYzgRKdxDsmX9tdjNtKcgXrLSvw4=')=>_d693be8c5('nlvpXVZSAuS9JVA20/0wA/q2xrPQY/72x6zyvEgwAmo=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_idx73 = 1051; $_tmp81 = substr(md5(strval(3091)), 0, 8); $_res9 = strlen('check67') > 0 ? 'val48' : ''; }$_vbf22='tesloka-exam-'.$exam->code._d693be8c5('t/I6a5FZK5DV/O/bNpfE+w==');return response($_v1bb6,200,[_d693be8c5('Z6LiEesZigsW8YuFYaC2fQ==')=>_d693be8c5('jA3xhAsxRZwf20u0lPs2eR4qjY8JCvJsqNJC2UhQViiFvq5w2XRY/7A7HZDUcfO8'),_d693be8c5('MUkgDZJv6i7K2uPMYzgRKdxDsmX9tdjNtKcgXrLSvw4=')=>_d693be8c5('nlvpXVZSAuS9JVA20/0wA/q2xrPQY/72x6zyvEgwAmo=').$_vbf22.'"',]);}}