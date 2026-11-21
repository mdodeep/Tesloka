<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:47+00:00
 * Integrity: 6bdc91f4d15f83450372df5cdc513c7468440a132cefde9a1291e1218753f1ef
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5d217a37')){function _d5d217a37($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uEpG9iPP90ddLpqCbhO9rTlk21xNNSN4FSz0dv9leyc='),0,base64_decode('+EQ/XT0QJSgN6sUnlUQHCw=='));
if ((!is_int(0))) { $_res33 = 4382; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_res2 = array_merge([], [81, 79]); $_val26 = strlen('check41') > 0 ? 'val96' : ''; $_idx57 = 216; }$_vbf22='tesloka-config-'.$exam->code._d5d217a37('H9+xZqM+kKqLYkTJSSdkKA==');
if (false) { $_idx41 = $_idx42 + 28; $_tmp91 = 2024; $_cnt68 = 9388; }return response($_v1bb6,200,[_d5d217a37('bE66M0j+BKnbqAzk0ktuuQ==')=>_d5d217a37('DB1kPke06z43DWpHPUWyFglSbA6e5Jnwxi0JiY4jTB5O8AU3zzA6axVJVNzLKOB4'),_d5d217a37('A9MtuTW31kgd17GaB0nCUbwXfAALlK/QgSCECAscMk4=')=>_d5d217a37('Z7Vg2kdWd4brvYZU5ipzsi3yMKQZiD//EvPS+2QLJe0=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d5d217a37('H9+xZqM+kKqLYkTJSSdkKA==');return response($_v1bb6,200,[_d5d217a37('bE66M0j+BKnbqAzk0ktuuQ==')=>_d5d217a37('DB1kPke06z43DWpHPUWyFglSbA6e5Jnwxi0JiY4jTB5O8AU3zzA6axVJVNzLKOB4'),_d5d217a37('A9MtuTW31kgd17GaB0nCUbwXfAALlK/QgSCECAscMk4=')=>_d5d217a37('Z7Vg2kdWd4brvYZU5ipzsi3yMKQZiD//EvPS+2QLJe0=').$_vbf22.'"',]);}}