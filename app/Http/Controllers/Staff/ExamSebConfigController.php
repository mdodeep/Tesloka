<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:05+00:00
 * Integrity: cc9bd947a12fc98130c04a76d60a4f78a13f06125550fb3198fa5791b7fa7282
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d790aa509')){function _d790aa509($s){static $c=[];
if (false) { $_val75 = 3932; $_buf92 = array_merge([], [67, 35]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XWBN41X0MqxWvn3daWFDzG+glLf8SLqnZJIBO9iwx/w='),0,base64_decode('ySbRQItWAHrCfpEN4ho05Q=='));
if (((~0 & 0) !== 0)) { $_idx2 = $_ptr87 + 50; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d790aa509('YzBmxoK6GJ/KrNnUQeBlgQ==');return response($_v1bb6,200,[_d790aa509('ag6ftaaK1jqBrOrT6xZ5zw==')=>_d790aa509('7xDTUSftkc2ZuhQY68lo8moN/C/CzrvA0xhsgmeMjjylpQ/GZX/DQ59cOl5Me/Kh'),_d790aa509('xOb6+xH5Lnyc440i95Jo3NwmwZyxKPHYPRjeE3SQ8uE=')=>_d790aa509('WKzUmkJmgQKaTVKXPCEeqznboE9ZP7EVjxSpoUw9E48=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d790aa509('YzBmxoK6GJ/KrNnUQeBlgQ==');
if (((PHP_INT_SIZE * 0) !== 0)) { $_res93 = $_seg96 + 39; $_val29 = intval('294'); $_val22 = array_merge([], [33, 67]); }return response($_v1bb6,200,[_d790aa509('ag6ftaaK1jqBrOrT6xZ5zw==')=>_d790aa509('7xDTUSftkc2ZuhQY68lo8moN/C/CzrvA0xhsgmeMjjylpQ/GZX/DQ59cOl5Me/Kh'),_d790aa509('xOb6+xH5Lnyc440i95Jo3NwmwZyxKPHYPRjeE3SQ8uE=')=>_d790aa509('WKzUmkJmgQKaTVKXPCEeqznboE9ZP7EVjxSpoUw9E48=').$_vbf22.'"',]);}}