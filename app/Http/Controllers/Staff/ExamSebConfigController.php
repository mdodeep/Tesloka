<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:35+00:00
 * Integrity: 69b74c8df5e2d7f84de56b8d8d7f2eda1be3097f03f46835be15cdb36f813c70
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d940f9f1e')){function _d940f9f1e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+rbWXWobjNQQ2PYuPWd+DMv3RyLgepArbe6RsxlLBmo='),0,base64_decode('P3KRUxUr3o3G4ulmlWVZDQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d940f9f1e('0FxB7nWZcNo67HSxHQkFYA==');return response($_v1bb6,200,[_d940f9f1e('HkFaSuSqNCwbt9nomfwSwA==')=>_d940f9f1e('1RDU2MgC3ELx+p4IT2eZslgXW3Wx4rr5jGdCL4WypEwdf4jYGrkxbI8guWvX6hmP'),_d940f9f1e('9lUvz7SHgta6nZ52/yBbuSDT1oitJSU/JqC3NEe7b3w=')=>_d940f9f1e('OwSDgAwoW87Iar35L49TKbI8gdaHDOaSHNWdTGyFCkM=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d940f9f1e('0FxB7nWZcNo67HSxHQkFYA==');return response($_v1bb6,200,[_d940f9f1e('HkFaSuSqNCwbt9nomfwSwA==')=>_d940f9f1e('1RDU2MgC3ELx+p4IT2eZslgXW3Wx4rr5jGdCL4WypEwdf4jYGrkxbI8guWvX6hmP'),_d940f9f1e('9lUvz7SHgta6nZ52/yBbuSDT1oitJSU/JqC3NEe7b3w=')=>_d940f9f1e('OwSDgAwoW87Iar35L49TKbI8gdaHDOaSHNWdTGyFCkM=').$_vbf22.'"',]);}}