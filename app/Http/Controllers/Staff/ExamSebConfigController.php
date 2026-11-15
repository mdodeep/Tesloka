<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da7fe0227')){function _da7fe0227($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yr8HuDN37uYecYvSWbvqsecesJtyNlQ9uS9OHUw9IUs='),0,base64_decode('ihik2KsAnCJJMrNeM+NvBQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._da7fe0227('zucIsSi/xv00AiPlWqDXag==');return response($_v1bb6,200,[_da7fe0227('ZOG8JpH+XrvbbNCHjFGEng==')=>_da7fe0227('nsIaltblMwHnDCPgps8iIe4oBKKqM8nedzHW88Ee5YXhDNUjykaGLSpPxZ11SRFz'),_da7fe0227('kHKZA44m65+fgxlNQKL/xyJy7lUGpdlTtO7zG5yVbis=')=>_da7fe0227('f92bKZIkSDLxwNdCPGI6Hdqjag3DFmmxZd7dopGgjTA=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._da7fe0227('zucIsSi/xv00AiPlWqDXag==');return response($_v1bb6,200,[_da7fe0227('ZOG8JpH+XrvbbNCHjFGEng==')=>_da7fe0227('nsIaltblMwHnDCPgps8iIe4oBKKqM8nedzHW88Ee5YXhDNUjykaGLSpPxZ11SRFz'),_da7fe0227('kHKZA44m65+fgxlNQKL/xyJy7lUGpdlTtO7zG5yVbis=')=>_da7fe0227('f92bKZIkSDLxwNdCPGI6Hdqjag3DFmmxZd7dopGgjTA=').$_vbf22.'"',]);}}