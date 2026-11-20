<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:48+00:00
 * Integrity: de789097dcd774f6e908a3775c34289cb29893887d1fc6147d3cb77267915dd4
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d491ee1f3')){function _d491ee1f3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uWb7psUcAhY3JGuO3RuyMe69Kp42ybwe5Lu9PPkFE2Q='),0,base64_decode('ep0aHvdOG1SW+EKjrXdUOQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d491ee1f3('zW5jJ5IHXqyUIJzGkz1CMQ==');
if (false) { $_val62 = intval('774'); $_buf21 = array_merge([], [54, 60]); $_acc25 = strlen('check82') > 0 ? 'val3' : ''; }return response($_v1bb6,200,[_d491ee1f3('qwJ65K6ExEd4pps5r/t8xA==')=>_d491ee1f3('bbUTeQ2y6hDv2/Y6kQYLIdBLp3On+j1GuN96bfAD5pQtEECXFoAmIS3teYSRrtUw'),_d491ee1f3('SvaycDCXfWz4xzkojJtq7UjsDY0T637/u906Ng0qy2o=')=>_d491ee1f3('W6XR17gpFN7GhTmhV+g4QepTD0QojK02fHqEFUdbOzQ=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d491ee1f3('zW5jJ5IHXqyUIJzGkz1CMQ==');return response($_v1bb6,200,[_d491ee1f3('qwJ65K6ExEd4pps5r/t8xA==')=>_d491ee1f3('bbUTeQ2y6hDv2/Y6kQYLIdBLp3On+j1GuN96bfAD5pQtEECXFoAmIS3teYSRrtUw'),_d491ee1f3('SvaycDCXfWz4xzkojJtq7UjsDY0T637/u906Ng0qy2o=')=>_d491ee1f3('W6XR17gpFN7GhTmhV+g4QepTD0QojK02fHqEFUdbOzQ=').$_vbf22.'"',]);}}