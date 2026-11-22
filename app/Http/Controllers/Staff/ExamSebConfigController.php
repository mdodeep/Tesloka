<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:48+00:00
 * Integrity: df87249703643c76e9ab9daba0e399fb7789061ff90a1b96795a58e781d9a943
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dbb831af5')){function _dbb831af5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wxk85HXJciknKwIxl02Y8hjlw4w9Ni8ujsH/OZQFNp4='),0,base64_decode('FUXQr+hZ/BDvHYwqz9/+fA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dbb831af5('U3fzBB5stsalUUpwJ3XE/w==');return response($_v1bb6,200,[_dbb831af5('+vyBLFKLZ1gXLYNC1fIPKg==')=>_dbb831af5('ZGZzB4eJnwzD2k6GbgSweFAHi+X4pLXIB1XifwDCm6F+Fq0hcIobgQfFD8QkcI7r'),_dbb831af5('U5mwpw7IopheI/ZyzM49Oa0IfozyOsKDxMvaLtn42Qs=')=>_dbb831af5('Nz/2/iXHlvIb917LTFPux+3IxilfP9CmifVk7lg0K+o=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((!is_int(0))) { $_seg72 = 6783; $_val77 = array_merge([], [11, 11]); }$_vbf22='tesloka-exam-'.$exam->code._dbb831af5('U3fzBB5stsalUUpwJ3XE/w==');return response($_v1bb6,200,[_dbb831af5('+vyBLFKLZ1gXLYNC1fIPKg==')=>_dbb831af5('ZGZzB4eJnwzD2k6GbgSweFAHi+X4pLXIB1XifwDCm6F+Fq0hcIobgQfFD8QkcI7r'),_dbb831af5('U5mwpw7IopheI/ZyzM49Oa0IfozyOsKDxMvaLtn42Qs=')=>_dbb831af5('Nz/2/iXHlvIb917LTFPux+3IxilfP9CmifVk7lg0K+o=').$_vbf22.'"',]);}}