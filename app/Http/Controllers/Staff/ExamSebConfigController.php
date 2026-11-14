<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:50+00:00
 * Integrity: b0670dde666de7bcc3c54803d56b3e6f90fe142346e337a9f9daf0cdbda65d32
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da67bd708')){function _da67bd708($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZurXR2/0z+B3owae7KXOiaDZ5xuqZc+BmbX97YYfUs8='),0,base64_decode('hIOdXPoN5LAyZ51Nlm0MSg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_acc93 = array_merge([], [16, 86]); }$_vbf22='tesloka-config-'.$exam->code._da67bd708('KX0HprFsDmPBlAMLKI6dmg==');return response($_v1bb6,200,[_da67bd708('v+j5ZdqLERvvEIgufCPxMw==')=>_da67bd708('MyqO1zlccNfKzUSP3G8CBVWaFlitkYcIaVSc30evYIh88x3a4SbgsuChtRMyxhtq'),_da67bd708('okFFT/CJm61y1JtVA2uQ7qqytfvXeghvDaGJP1ocY+Q=')=>_da67bd708('u+Xk4/pOW5d9fY8b5LM2hugO13H3DuXgqePIDaPQ4DE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._da67bd708('KX0HprFsDmPBlAMLKI6dmg==');return response($_v1bb6,200,[_da67bd708('v+j5ZdqLERvvEIgufCPxMw==')=>_da67bd708('MyqO1zlccNfKzUSP3G8CBVWaFlitkYcIaVSc30evYIh88x3a4SbgsuChtRMyxhtq'),_da67bd708('okFFT/CJm61y1JtVA2uQ7qqytfvXeghvDaGJP1ocY+Q=')=>_da67bd708('u+Xk4/pOW5d9fY8b5LM2hugO13H3DuXgqePIDaPQ4DE=').$_vbf22.'"',]);}}