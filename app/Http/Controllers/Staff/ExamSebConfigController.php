<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:21+00:00
 * Integrity: 3fd570dbe9cd7f257993cee389d5cf6c64d7903301710f7337e6fc54487ddb13
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d2efba0b5')){function _d2efba0b5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VzP7bWUE0RVqhATAOTy77p7+s5QaQ4TZp7KgzdDc8Wk='),0,base64_decode('0E9yfVTufI2HsWVRCnc9Mg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d2efba0b5('zdx3fVVDIyVJ3wL5sXO7IA==');return response($_v1bb6,200,[_d2efba0b5('DzAnnFINMiVJkwmnwdzCPw==')=>_d2efba0b5('k4DfdJPGJ7fLf8ggDN7IhbY9q1IrbnsvzWfKMz/MoJ1mppVgQ1s5fEQZjTH0MgaT'),_d2efba0b5('tkgbXSlgSHCwMyVna2OJY1zn6e4q5JJVvDvjBA105NU=')=>_d2efba0b5('esKVmBDZyhmsULpQh4aRnoblAKNQhads8vDH88/K5xI=').$_vbf22.'"',]);
if (false) { $_res13 = $_acc35 + 79; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d2efba0b5('zdx3fVVDIyVJ3wL5sXO7IA==');
if ((!is_int(0))) { $_cnt58 = strlen('check60') > 0 ? 'val53' : ''; $_cnt64 = array_merge([], [72, 22]); }return response($_v1bb6,200,[_d2efba0b5('DzAnnFINMiVJkwmnwdzCPw==')=>_d2efba0b5('k4DfdJPGJ7fLf8ggDN7IhbY9q1IrbnsvzWfKMz/MoJ1mppVgQ1s5fEQZjTH0MgaT'),_d2efba0b5('tkgbXSlgSHCwMyVna2OJY1zn6e4q5JJVvDvjBA105NU=')=>_d2efba0b5('esKVmBDZyhmsULpQh4aRnoblAKNQhads8vDH88/K5xI=').$_vbf22.'"',]);}}