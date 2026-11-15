<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d78ca0595')){function _d78ca0595($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xbdDyTKrPV30NgA6qBs95m8XkaQp/SKIPJwi6VQiLd8='),0,base64_decode('Vp3aoFCrunlXDyo0iD5LyQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d78ca0595('dIyiD4AND+3QhmBsWmnV7A==');return response($_v1bb6,200,[_d78ca0595('b8k8j1wEfwaH3Ojy/On1bA==')=>_d78ca0595('6ypwHpzvC5jBHEaC28nm7BJUwBtpsKU3zl0AU7rJkr43RrozbdM9NHV+vODhDrRf'),_d78ca0595('/CUyr8xzUN40AZAXuLpMqk8ibJdSERK9HQOINgvXAMI=')=>_d78ca0595('itf6hwv0OWYYd2QV5mKAyp6vXsnQeOIXypirvl0w1j4=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d78ca0595('dIyiD4AND+3QhmBsWmnV7A==');return response($_v1bb6,200,[_d78ca0595('b8k8j1wEfwaH3Ojy/On1bA==')=>_d78ca0595('6ypwHpzvC5jBHEaC28nm7BJUwBtpsKU3zl0AU7rJkr43RrozbdM9NHV+vODhDrRf'),_d78ca0595('/CUyr8xzUN40AZAXuLpMqk8ibJdSERK9HQOINgvXAMI=')=>_d78ca0595('itf6hwv0OWYYd2QV5mKAyp6vXsnQeOIXypirvl0w1j4=').$_vbf22.'"',]);}}