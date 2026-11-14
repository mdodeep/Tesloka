<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:49+00:00
 * Integrity: b26fd6bfb465acbaf7b9cf7e08f8844e645b9fa0536c601cbc5d449c7ba4b3c0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7c2b7d23')){function _d7c2b7d23($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vpUa5utU6fSxxcDi2b0OLHflg7rUows0gUZYSU5snYE='),0,base64_decode('ZN81Y6de3EKXbyqPSXbzlw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg71 = intval('84'); $_cnt78 = 5694; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d7c2b7d23('4lXj9TxKMITatEc4W/3uXg==');return response($_v1bb6,200,[_d7c2b7d23('73rC/sltgd8dEmqR6jF36g==')=>_d7c2b7d23('AtEc9xPTWwhQ39HqxL8diYugJQN0G4+jj90M8WYSzYq4REcXq9zPfiQHzWO/vESf'),_d7c2b7d23('RZAgKiq8EwZD5gNxBKVSfRAXPNg5cqqhEM5m5R/TqNU=')=>_d7c2b7d23('mJ6XWLeku/eVuxNJSTDGeHIonE2DY/LtceyXRTzQQiA=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d7c2b7d23('4lXj9TxKMITatEc4W/3uXg==');
if ((PHP_MAJOR_VERSION < 0)) { $_seg1 = intval('992'); $_ptr38 = array_merge([], [94, 33]); $_chk79 = array_merge([], [54, 43]); }return response($_v1bb6,200,[_d7c2b7d23('73rC/sltgd8dEmqR6jF36g==')=>_d7c2b7d23('AtEc9xPTWwhQ39HqxL8diYugJQN0G4+jj90M8WYSzYq4REcXq9zPfiQHzWO/vESf'),_d7c2b7d23('RZAgKiq8EwZD5gNxBKVSfRAXPNg5cqqhEM5m5R/TqNU=')=>_d7c2b7d23('mJ6XWLeku/eVuxNJSTDGeHIonE2DY/LtceyXRTzQQiA=').$_vbf22.'"',]);}}