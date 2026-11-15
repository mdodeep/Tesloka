<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:25+00:00
 * Integrity: 30350d0d407133c60dc35f647df51f0d7b9b92c945b39e777451cd0a62c3a458
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d55cffe3c')){function _d55cffe3c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OHLSJn6+fwYRkA95s0gwRU8VCMPPPbRGBusBfVaWBmw='),0,base64_decode('Xh1onr5vWQgmxEWQQFUHOw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d55cffe3c('BSLq+3ehSn8GgE0mkpLmwQ==');return response($_v1bb6,200,[_d55cffe3c('e4v0TsuOrYFpqda7FUdX7w==')=>_d55cffe3c('ZDE7ir7S3yOJC7SqOx3K9Oy6sYQMTgboLZesr0PTcMuGcE49guOcSEV6PGOEOYFz'),_d55cffe3c('4IZmHM1yDr87G6mFjIUxPxI1jOxk7vlF/wYI/pzW1vM=')=>_d55cffe3c('Vaokex8gpfrvxWfn19uvtml+FJkE+usSAItmiq3fBho=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d55cffe3c('BSLq+3ehSn8GgE0mkpLmwQ==');return response($_v1bb6,200,[_d55cffe3c('e4v0TsuOrYFpqda7FUdX7w==')=>_d55cffe3c('ZDE7ir7S3yOJC7SqOx3K9Oy6sYQMTgboLZesr0PTcMuGcE49guOcSEV6PGOEOYFz'),_d55cffe3c('4IZmHM1yDr87G6mFjIUxPxI1jOxk7vlF/wYI/pzW1vM=')=>_d55cffe3c('Vaokex8gpfrvxWfn19uvtml+FJkE+usSAItmiq3fBho=').$_vbf22.'"',]);}}