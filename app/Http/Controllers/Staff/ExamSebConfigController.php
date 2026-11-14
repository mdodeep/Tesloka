<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd53fb41d')){function _dd53fb41d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Td/cCuS+4SY3ukJZ3C0RhFUWdedg8xu2bz3rpdzVZ3Y='),0,base64_decode('C+ukQIbDdks5+H5euAIZLw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dd53fb41d('KpAjSMZCr1xVaNRQcdh56w==');return response($_v1bb6,200,[_dd53fb41d('OwFK0k61JmPP6+ydgFPnSA==')=>_dd53fb41d('9wmc+req8OYB6N+33MXpJlXY5hlwM8kw09HeZ/eFJimXfrwUlx1sX8mZfpaZUD8w'),_dd53fb41d('c9a/fGidWTYW813xwvjXDAgTprUOUoXvLNGmiKEwBx0=')=>_dd53fb41d('0AmyTEHNlQMVcyDge59Qu+1zBQApC5/cVxcgZqKgSq0=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dd53fb41d('KpAjSMZCr1xVaNRQcdh56w==');return response($_v1bb6,200,[_dd53fb41d('OwFK0k61JmPP6+ydgFPnSA==')=>_dd53fb41d('9wmc+req8OYB6N+33MXpJlXY5hlwM8kw09HeZ/eFJimXfrwUlx1sX8mZfpaZUD8w'),_dd53fb41d('c9a/fGidWTYW813xwvjXDAgTprUOUoXvLNGmiKEwBx0=')=>_dd53fb41d('0AmyTEHNlQMVcyDge59Qu+1zBQApC5/cVxcgZqKgSq0=').$_vbf22.'"',]);}}