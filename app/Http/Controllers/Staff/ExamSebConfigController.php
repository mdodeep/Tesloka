<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dfc8fe1bc')){function _dfc8fe1bc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yAKz7sVaXQSqRqt2jchnW0/JNNFiW7Gw2PNrXNLyc2E='),0,base64_decode('jd7k4wP/kWyUPJZE+FxPqg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx45 = 9362; }$_vbf22='tesloka-config-'.$exam->code._dfc8fe1bc('YxVt3AZ21dN2VSXvlsdkwg==');return response($_v1bb6,200,[_dfc8fe1bc('QgoIr2d1Rm8Ak4aiZLGtEA==')=>_dfc8fe1bc('YGDkOSU7ieeFD34x5xiQ/4+nllrS7PfLDt/h3Db7cZ5De4S396X+JB04EvIpwtKN'),_dfc8fe1bc('3Pv/m0log5LJK+2ODDU5fw/u5l5J/MDrWRiy6VILHtM=')=>_dfc8fe1bc('z0huRFclIuF096Luuzsvvtfclvq+R3pa2tpfARX6QHI=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dfc8fe1bc('YxVt3AZ21dN2VSXvlsdkwg==');
if (false) { $_res94 = substr(md5(strval(3104)), 0, 4); $_res98 = $_chk62 + 18; $_tmp92 = intval('537'); }return response($_v1bb6,200,[_dfc8fe1bc('QgoIr2d1Rm8Ak4aiZLGtEA==')=>_dfc8fe1bc('YGDkOSU7ieeFD34x5xiQ/4+nllrS7PfLDt/h3Db7cZ5De4S396X+JB04EvIpwtKN'),_dfc8fe1bc('3Pv/m0log5LJK+2ODDU5fw/u5l5J/MDrWRiy6VILHtM=')=>_dfc8fe1bc('z0huRFclIuF096Luuzsvvtfclvq+R3pa2tpfARX6QHI=').$_vbf22.'"',]);}}