<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:02+00:00
 * Integrity: 3fdd4e81275382375f811facecf8d5cef5cda7157404fa8661a4104594859a25
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db5fb9522')){function _db5fb9522($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bWco7JICdjDCbolfp54etyCywWRHxMlTZh9NC0DFPtM='),0,base64_decode('ie90uxbrtbe713kuJNh7jw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._db5fb9522('hCzQjASku+fiPuTeyrq3QA==');return response($_v1bb6,200,[_db5fb9522('2TX739QXWi3ibKU16sDchw==')=>_db5fb9522('hBAFHhvkKM0sZ9G2Hy2gKmbRhZ9kJTjz2F4wN6CsxoVf1Apr3NDCwpzRnlbJUOm1'),_db5fb9522('d0ZxHYVYTm56QK26mymNimYDyfrPNColKbMDeT+sWo4=')=>_db5fb9522('Q7YbYpgnRtoEGQst6PjnxJ+8PoxIGIRPHhtNvqhpr/s=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._db5fb9522('hCzQjASku+fiPuTeyrq3QA==');return response($_v1bb6,200,[_db5fb9522('2TX739QXWi3ibKU16sDchw==')=>_db5fb9522('hBAFHhvkKM0sZ9G2Hy2gKmbRhZ9kJTjz2F4wN6CsxoVf1Apr3NDCwpzRnlbJUOm1'),_db5fb9522('d0ZxHYVYTm56QK26mymNimYDyfrPNColKbMDeT+sWo4=')=>_db5fb9522('Q7YbYpgnRtoEGQst6PjnxJ+8PoxIGIRPHhtNvqhpr/s=').$_vbf22.'"',]);}}