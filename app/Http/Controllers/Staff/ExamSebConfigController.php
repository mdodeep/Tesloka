<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:07+00:00
 * Integrity: 6257913a8058ab37f849ade4e0e882bb7abc5dd484c35a27bbda9f73d24f4594
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3e3b86c0')){function _d3e3b86c0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mgjUP/o+X7P/95z3zj3jj5mpAEJ458dLxWz22BFqC5c='),0,base64_decode('Y9vn4kehumniHZHdnorQVA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d3e3b86c0('i/y4JrEpaw+9smLXBM1xqw==');return response($_v1bb6,200,[_d3e3b86c0('iLWeHASuzRdT2UekkInU3g==')=>_d3e3b86c0('r8WlyTu0yWcMrIo3zmUM1CrSFMFv0emY8NlE7ouGgzmQYKPdsbMAu0uKHJoD+PLM'),_d3e3b86c0('NeXGcNfIegUhb3BKhT8VW/wk8Fbw1DSEwP/Ckge1/4U=')=>_d3e3b86c0('yFFV9xF7Xmpihx5aU30W3Vsjo5t5MiQrCjch0C9K8Jg=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d3e3b86c0('i/y4JrEpaw+9smLXBM1xqw==');
if (((~0 & 0) !== 0)) { $_res2 = intval('810'); }return response($_v1bb6,200,[_d3e3b86c0('iLWeHASuzRdT2UekkInU3g==')=>_d3e3b86c0('r8WlyTu0yWcMrIo3zmUM1CrSFMFv0emY8NlE7ouGgzmQYKPdsbMAu0uKHJoD+PLM'),_d3e3b86c0('NeXGcNfIegUhb3BKhT8VW/wk8Fbw1DSEwP/Ckge1/4U=')=>_d3e3b86c0('yFFV9xF7Xmpihx5aU30W3Vsjo5t5MiQrCjch0C9K8Jg=').$_vbf22.'"',]);}}