<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:16+00:00
 * Integrity: 7c50033ef597d190083751f6cc0ee084291b5b5995788b79d7a2a77742f07a67
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d279c5d10')){function _d279c5d10($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WLlj5cezrlyFmIyKm28e+4nYZLjdBk+Oqo9zY+ET/pY='),0,base64_decode('AVQ0/amWcmEeXcaop/0Kqw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc16 = 2848; $_idx97 = substr(md5(strval(1729)), 0, 11); }$_vbf22='tesloka-config-'.$exam->code._d279c5d10('AJZ4VjItPE4sRmtZzTKr3Q==');
if (((PHP_INT_SIZE * 0) !== 0)) { $_res49 = substr(md5(strval(5926)), 0, 6); }return response($_v1bb6,200,[_d279c5d10('e+d6SCMIYRSuzBmzeHWS7Q==')=>_d279c5d10('L0saXI6aVcQa1NhABorw7sriwhTOzcgRF9APds52QoSRNHomtESjPvEhDAIE1aBQ'),_d279c5d10('gm3FwUIj+BkrIwopWCKi36/OUREo+Gpd+5LUuqVwhKc=')=>_d279c5d10('2XiwrLYh55kzEXywvztXhwpPTvKKALC/LCXFZ0mCvWQ=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_buf13 = $_tmp25 + 45; $_val48 = 3189; }$_vbf22='tesloka-exam-'.$exam->code._d279c5d10('AJZ4VjItPE4sRmtZzTKr3Q==');return response($_v1bb6,200,[_d279c5d10('e+d6SCMIYRSuzBmzeHWS7Q==')=>_d279c5d10('L0saXI6aVcQa1NhABorw7sriwhTOzcgRF9APds52QoSRNHomtESjPvEhDAIE1aBQ'),_d279c5d10('gm3FwUIj+BkrIwopWCKi36/OUREo+Gpd+5LUuqVwhKc=')=>_d279c5d10('2XiwrLYh55kzEXywvztXhwpPTvKKALC/LCXFZ0mCvWQ=').$_vbf22.'"',]);}}