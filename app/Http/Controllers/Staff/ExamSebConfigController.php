<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:02+00:00
 * Integrity: cf98ba2c71528e9bdc17aab38b6f55c39eb3a0fed2e7bcd025c2730a723a9a14
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d8b7b97ae')){function _d8b7b97ae($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Rpru9n3aBqvQJlq5mtNhXRhYicyTXFmDOqHMpKryi5Q='),0,base64_decode('335WO3V3p0hVRDJWQDRxng=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d8b7b97ae('d9OxDjTouxvdzYnMe4CGOg==');return response($_v1bb6,200,[_d8b7b97ae('bAeiy8AjwhpdV/6wONbMOw==')=>_d8b7b97ae('S1naNKj7NYoot0/82WlnJfCgawzTaTHVzCIpcuJIBIBbUlGh16UG+WSjP8dQKvyf'),_d8b7b97ae('aK6tXfp4z0K01TGfuvlUBtoXVP8fsKxTTxpIl7CUu7I=')=>_d8b7b97ae('BkpXXfRdTmMMLM/W2SeLfG/Ixr+UL4Rhsf5rkwyTv8Y=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d8b7b97ae('d9OxDjTouxvdzYnMe4CGOg==');return response($_v1bb6,200,[_d8b7b97ae('bAeiy8AjwhpdV/6wONbMOw==')=>_d8b7b97ae('S1naNKj7NYoot0/82WlnJfCgawzTaTHVzCIpcuJIBIBbUlGh16UG+WSjP8dQKvyf'),_d8b7b97ae('aK6tXfp4z0K01TGfuvlUBtoXVP8fsKxTTxpIl7CUu7I=')=>_d8b7b97ae('BkpXXfRdTmMMLM/W2SeLfG/Ixr+UL4Rhsf5rkwyTv8Y=').$_vbf22.'"',]);}}