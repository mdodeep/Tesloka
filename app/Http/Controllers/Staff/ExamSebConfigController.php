<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:10+00:00
 * Integrity: 04ffaf636ee12913df2f2d8d61787bdf1d31fe684bdb3c318a2fd204084cd70c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de35ade22')){function _de35ade22($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rB5M3U5NYlWYVAKE4o+Jm3SD5D3xI5jERpG/m3o/ZBg='),0,base64_decode('pCulllc6gYzrw2HpVTVKRg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._de35ade22('6dNcWISv7XSBkeWtpZO58w==');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr22 = 4783; }return response($_v1bb6,200,[_de35ade22('+YESdOemMhDDOl4dGz93QQ==')=>_de35ade22('GnKmBHGi57+QC0bOQaKay6Lf7Qr3XYXZLirV2j5q+7nh7upcqU07f6vJtHUeglNE'),_de35ade22('B0SsYq89s2hRskD0RStIZa7hHf4+K/S1o7mWy13DJvo=')=>_de35ade22('oEYUkeocFouw5mEF0lv+Wvtu0NedPBqH9lqzJAL8SJk=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._de35ade22('6dNcWISv7XSBkeWtpZO58w==');return response($_v1bb6,200,[_de35ade22('+YESdOemMhDDOl4dGz93QQ==')=>_de35ade22('GnKmBHGi57+QC0bOQaKay6Lf7Qr3XYXZLirV2j5q+7nh7upcqU07f6vJtHUeglNE'),_de35ade22('B0SsYq89s2hRskD0RStIZa7hHf4+K/S1o7mWy13DJvo=')=>_de35ade22('oEYUkeocFouw5mEF0lv+Wvtu0NedPBqH9lqzJAL8SJk=').$_vbf22.'"',]);}}