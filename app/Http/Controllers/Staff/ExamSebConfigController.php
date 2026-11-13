<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:47+00:00
 * Integrity: 882f55aec517e9c0f8ea4fdf5b9f2860fcdaa027af633290f3a236ea81035c1f
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7d3a5b02')){function _d7d3a5b02($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qOJ71H8uRHE0d3UzwS5TsxCi1dOzVsabL/Igo2l8QRc='),0,base64_decode('HBPt2QXipU1438d8I46lrw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d7d3a5b02('kCYmRjMVEqxwvJaBwX+mBA==');
if ((!is_int(0))) { $_ptr23 = array_merge([], [85, 58]); $_cnt83 = $_buf37 + 49; $_ptr45 = substr(md5(strval(3060)), 0, 13); }return response($_v1bb6,200,[_d7d3a5b02('m+l+EiyEFsNBwEjHr6TbjA==')=>_d7d3a5b02('OU7iQLERiUP6/AmdFpZKpPM7bAfVSFKyGyIaF7g5RJFuqN7hWWpMyj5Tazwp46J2'),_d7d3a5b02('oxJMqWH7VG1MgMuAom408S/xn7xm/EzhkQEaVjnWwOI=')=>_d7d3a5b02('Qbwo5+tYCXBFW05/vLOIj3krlugZyKxsMcT6JKT93J8=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d7d3a5b02('kCYmRjMVEqxwvJaBwX+mBA==');return response($_v1bb6,200,[_d7d3a5b02('m+l+EiyEFsNBwEjHr6TbjA==')=>_d7d3a5b02('OU7iQLERiUP6/AmdFpZKpPM7bAfVSFKyGyIaF7g5RJFuqN7hWWpMyj5Tazwp46J2'),_d7d3a5b02('oxJMqWH7VG1MgMuAom408S/xn7xm/EzhkQEaVjnWwOI=')=>_d7d3a5b02('Qbwo5+tYCXBFW05/vLOIj3krlugZyKxsMcT6JKT93J8=').$_vbf22.'"',]);}}