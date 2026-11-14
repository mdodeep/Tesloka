<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:08+00:00
 * Integrity: f3620bfb51022cb0c646a14d4f40738b18bffb8f93ad04914a74bcf3375d758b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d8925ce3e')){function _d8925ce3e($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt33 = strlen('check2') > 0 ? 'val6' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('B4JBZ+iDUgPcOuvDE8JLUQSTTom+9fEHNBbvqgfF58Q='),0,base64_decode('0/yOnRm9EqiAly1kA/6F/g=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d8925ce3e('zOB+Sbk4tA69JHe4DI3moQ==');
if (((0 ^ 0) !== 0)) { $_ptr76 = substr(md5(strval(5544)), 0, 12); $_val36 = array_merge([], [64, 79]); $_acc10 = array_merge([], [48, 3]); }return response($_v1bb6,200,[_d8925ce3e('K3JdKw8/pgfe81FQOi+N0A==')=>_d8925ce3e('zgwo3QkXKwcCE50XbmcCZ6bebtp7LO66F5GMfJ+lPrrm8/AtHcfWnu9R1KunIHhF'),_d8925ce3e('LpKQZoHqt9AdCOx9Gk77kDWZbBoih2apCQgXVpteI2k=')=>_d8925ce3e('MSxxjIomMTFC0HeNTCfZk58YtxX/9/Ga2VOxfLXeIpk=').$_vbf22.'"',]);
if (((~0 & 0) !== 0)) { $_idx30 = intval('549'); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d8925ce3e('zOB+Sbk4tA69JHe4DI3moQ==');return response($_v1bb6,200,[_d8925ce3e('K3JdKw8/pgfe81FQOi+N0A==')=>_d8925ce3e('zgwo3QkXKwcCE50XbmcCZ6bebtp7LO66F5GMfJ+lPrrm8/AtHcfWnu9R1KunIHhF'),_d8925ce3e('LpKQZoHqt9AdCOx9Gk77kDWZbBoih2apCQgXVpteI2k=')=>_d8925ce3e('MSxxjIomMTFC0HeNTCfZk58YtxX/9/Ga2VOxfLXeIpk=').$_vbf22.'"',]);}}