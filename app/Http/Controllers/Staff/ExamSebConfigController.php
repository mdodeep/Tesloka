<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:25+00:00
 * Integrity: 03d3c2e4041fff912a6e12d454509d4b8ef5f30d38dac3e01a98569d192728fe
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dabbda609')){function _dabbda609($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jWVrNUAI3QU5u254AhzPR6gBIUN0eEi8NuNj77qUzL4='),0,base64_decode('uIyqgDBbrl2VXms51NxxMQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dabbda609('Cklbg82QsFVb3+ivx4FELw==');return response($_v1bb6,200,[_dabbda609('NBEYqveYMfNgGlyRNguZtg==')=>_dabbda609('21PfvM9DHoHsZ4CL30haZbS5qoFaB3BgM8UB80SK0v6vjfixeloKPXRQ4omSjm4D'),_dabbda609('Io4+mmRBV1PimqiQDZsfPuKMOFfSKQVBuj0OMtxddXQ=')=>_dabbda609('1kvL05u/4M3B3h77dRaHumVr5Jdjt7wwFvkIo9u0yEI=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((!is_int(0))) { $_chk62 = 8188; }$_vbf22='tesloka-exam-'.$exam->code._dabbda609('Cklbg82QsFVb3+ivx4FELw==');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf60 = substr(md5(strval(878)), 0, 6); $_tmp15 = 1609; $_seg8 = strlen('check61') > 0 ? 'val74' : ''; }return response($_v1bb6,200,[_dabbda609('NBEYqveYMfNgGlyRNguZtg==')=>_dabbda609('21PfvM9DHoHsZ4CL30haZbS5qoFaB3BgM8UB80SK0v6vjfixeloKPXRQ4omSjm4D'),_dabbda609('Io4+mmRBV1PimqiQDZsfPuKMOFfSKQVBuj0OMtxddXQ=')=>_dabbda609('1kvL05u/4M3B3h77dRaHumVr5Jdjt7wwFvkIo9u0yEI=').$_vbf22.'"',]);}}