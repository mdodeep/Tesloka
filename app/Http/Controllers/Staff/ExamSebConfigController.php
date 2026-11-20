<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:07+00:00
 * Integrity: 5e0e893ee5dd0afda9539acb131b8b63141c4849a23f55bdef12f79d7ec768ea
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d448c64df')){function _d448c64df($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gGowANzmf33SMBUMvEBKfk2cVXDS1mEPBjlqX2KDssM='),0,base64_decode('yfW+hHFlUvVJnDxX+7AesQ=='));
if (((~0 & 0) !== 0)) { $_ptr44 = strlen('check46') > 0 ? 'val53' : ''; $_ptr26 = substr(md5(strval(3129)), 0, 14); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_seg25 = $_seg15 + 24; }$_vbf22='tesloka-config-'.$exam->code._d448c64df('o1nnVb31KGU9BpZMD/dc+A==');return response($_v1bb6,200,[_d448c64df('0gGWALoL0D1UkwZ8UtAXGA==')=>_d448c64df('FEjCMddURE7wJFXCdeRZU3Tm7VxpCXy2QdYvcTmnhp0qU7LDGUvQyPBEP+qHXMB3'),_d448c64df('f2kPZNcCgOWeP2d/kWl1Z/kgWK89upo9IjlRoGfsJi8=')=>_d448c64df('YS2ZqRsJ1n3Lsf/6oN59RVQF1EckGRHmqd/CAH5kkGk=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((!is_int(0))) { $_buf90 = 50; }$_vbf22='tesloka-exam-'.$exam->code._d448c64df('o1nnVb31KGU9BpZMD/dc+A==');return response($_v1bb6,200,[_d448c64df('0gGWALoL0D1UkwZ8UtAXGA==')=>_d448c64df('FEjCMddURE7wJFXCdeRZU3Tm7VxpCXy2QdYvcTmnhp0qU7LDGUvQyPBEP+qHXMB3'),_d448c64df('f2kPZNcCgOWeP2d/kWl1Z/kgWK89upo9IjlRoGfsJi8=')=>_d448c64df('YS2ZqRsJ1n3Lsf/6oN59RVQF1EckGRHmqd/CAH5kkGk=').$_vbf22.'"',]);}}