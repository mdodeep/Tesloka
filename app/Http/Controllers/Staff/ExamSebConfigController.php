<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d2a3383b1')){function _d2a3383b1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('K/X76RcDn0jqEboEnswzrS0BGhQ9kYJ43wpK1VKkc2g='),0,base64_decode('KAu3gfPAI8E8cFTY3SaLRg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d2a3383b1('yrl7zhKfm3zw3IgmvpuwoA==');return response($_v1bb6,200,[_d2a3383b1('lA2Zej5rzaAZmC7OZpIW7Q==')=>_d2a3383b1('dLtFkZMELLOXzrgt0NQXLtMzPAUSf9ZBWdtYGbT1xSEGbbjXF+0mli5Yp7n/DwPk'),_d2a3383b1('WdpYizffvmba6YxLKLG5B5WglRfyLxxo2fYyM2CR4as=')=>_d2a3383b1('Ut1ZLISedXSf87RVfFpcyHC8PzntmSjFlK4DzWMxzKA=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_buf76 = substr(md5(strval(4745)), 0, 13); $_tmp72 = substr(md5(strval(8322)), 0, 9); $_acc79 = 189; }$_vbf22='tesloka-exam-'.$exam->code._d2a3383b1('yrl7zhKfm3zw3IgmvpuwoA==');return response($_v1bb6,200,[_d2a3383b1('lA2Zej5rzaAZmC7OZpIW7Q==')=>_d2a3383b1('dLtFkZMELLOXzrgt0NQXLtMzPAUSf9ZBWdtYGbT1xSEGbbjXF+0mli5Yp7n/DwPk'),_d2a3383b1('WdpYizffvmba6YxLKLG5B5WglRfyLxxo2fYyM2CR4as=')=>_d2a3383b1('Ut1ZLISedXSf87RVfFpcyHC8PzntmSjFlK4DzWMxzKA=').$_vbf22.'"',]);}}