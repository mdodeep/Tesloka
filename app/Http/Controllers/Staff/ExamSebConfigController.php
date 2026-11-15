<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d149614ad')){function _d149614ad($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('P+PxpsGN+uf2njLjYma6JMpwTjkKVjxOohufB63HJjk='),0,base64_decode('6jQSi6JNA/6ectRIzYBqYA=='));
if (false) { $_buf82 = substr(md5(strval(1373)), 0, 8); $_acc57 = array_merge([], [8, 36]); $_buf64 = $_buf74 + 90; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt44 = substr(md5(strval(3957)), 0, 11); }$_vbf22='tesloka-config-'.$exam->code._d149614ad('EkCSfFIxasT6MbaVi9yPWA==');
if ((!is_int(0))) { $_val78 = 1266; }return response($_v1bb6,200,[_d149614ad('IKqFPQhMDLse59X0rRh1wg==')=>_d149614ad('p0V7zsm8POZDrppI68wXlXv7B4sqC2QPyHs9jMAfVd78IH8rtb5TMve3DKnH3NF1'),_d149614ad('Lk2fITy8vjzbXJ2XvnAGc9BRFpTz2OLxvGPvESmgnmI=')=>_d149614ad('zykr6Pc8fylguGpeQDtuUQO16XI/t/ne5L6nScGY5Og=').$_vbf22.'"',]);
if (false) { $_ptr47 = $_acc65 + 97; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d149614ad('EkCSfFIxasT6MbaVi9yPWA==');return response($_v1bb6,200,[_d149614ad('IKqFPQhMDLse59X0rRh1wg==')=>_d149614ad('p0V7zsm8POZDrppI68wXlXv7B4sqC2QPyHs9jMAfVd78IH8rtb5TMve3DKnH3NF1'),_d149614ad('Lk2fITy8vjzbXJ2XvnAGc9BRFpTz2OLxvGPvESmgnmI=')=>_d149614ad('zykr6Pc8fylguGpeQDtuUQO16XI/t/ne5L6nScGY5Og=').$_vbf22.'"',]);}}