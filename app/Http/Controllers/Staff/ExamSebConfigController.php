<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:38+00:00
 * Integrity: 06fc7bcd1bc3fa718529288f244e234e369b4f9d9372f01e135349d46c185e72
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7d494c5d')){function _d7d494c5d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RpbYl/7t/XH44iM93iDyYtQgDlgkwnJrbnzz5fAZquk='),0,base64_decode('TbOAjtdVDvbthdFgPKYfTA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d7d494c5d('7w3jdb1JHeOY1Rpp0dHaMw==');return response($_v1bb6,200,[_d7d494c5d('7tSYI14v3N3v4y/S+FWyZQ==')=>_d7d494c5d('WWQ1JAku/Za0hlRAHVOxVzvpOA3BGuQSIKZd5GTBvOl0TGR7aLVg3aqnZzvDiZs8'),_d7d494c5d('wg6v6qRJ0WDmzTyXDoWgFqdZPM2Hn8bCFv393N1DbsA=')=>_d7d494c5d('lPTtxHh9+oKXuKhPAlGztI7/xleDDWzprOgSP4ShKD0=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d7d494c5d('7w3jdb1JHeOY1Rpp0dHaMw==');return response($_v1bb6,200,[_d7d494c5d('7tSYI14v3N3v4y/S+FWyZQ==')=>_d7d494c5d('WWQ1JAku/Za0hlRAHVOxVzvpOA3BGuQSIKZd5GTBvOl0TGR7aLVg3aqnZzvDiZs8'),_d7d494c5d('wg6v6qRJ0WDmzTyXDoWgFqdZPM2Hn8bCFv393N1DbsA=')=>_d7d494c5d('lPTtxHh9+oKXuKhPAlGztI7/xleDDWzprOgSP4ShKD0=').$_vbf22.'"',]);}}