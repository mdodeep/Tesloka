<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:41+00:00
 * Integrity: 06fe3ceaa52ad5c24139266f28cd1a5f0d32ff6e436dbf7c9c8fe44ba35dd22b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d80a32f7a')){function _d80a32f7a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0D9LxX9bk0Jw2AubwDcTmqeUBoTVvId47vCdtJCvZbM='),0,base64_decode('bcp8vt67QF2g+VYhrE9X3A=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d80a32f7a('lACBbvy1Ew131GkKUnpFIQ==');return response($_v1bb6,200,[_d80a32f7a('S0OFg6M9OD+ild4BZ5FIFg==')=>_d80a32f7a('1kn2oicOBbOZuHIdDCoupHB5CxMD4fexI8DVM0vwcvpMnc3HfVFALHb6gyXu2mja'),_d80a32f7a('2tdqIrA8xwhpN/UzQkOXhiJcT8itFMvhslsoa4Pr9Us=')=>_d80a32f7a('YGvxODMkSobFM5RM7ZdlUddu++j9sHFCxcNpawLRaOU=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d80a32f7a('lACBbvy1Ew131GkKUnpFIQ==');return response($_v1bb6,200,[_d80a32f7a('S0OFg6M9OD+ild4BZ5FIFg==')=>_d80a32f7a('1kn2oicOBbOZuHIdDCoupHB5CxMD4fexI8DVM0vwcvpMnc3HfVFALHb6gyXu2mja'),_d80a32f7a('2tdqIrA8xwhpN/UzQkOXhiJcT8itFMvhslsoa4Pr9Us=')=>_d80a32f7a('YGvxODMkSobFM5RM7ZdlUddu++j9sHFCxcNpawLRaOU=').$_vbf22.'"',]);}}