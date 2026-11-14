<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:58+00:00
 * Integrity: f94b0dde50cb65dbd2252bf4c438dd8458a9cee3bb831f17a53cae612a792a21
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_def3a8306')){function _def3a8306($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('AsOnvBmPHNIDnXaa/zXU6diPd7bJe0DXrDaTVZncC8M='),0,base64_decode('MEpQmiEA44YN/NPPkE2BjQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._def3a8306('pex1kcbhaCdL7Jy6H3xx3w==');return response($_v1bb6,200,[_def3a8306('8AKCXiPA6yYSzLMHgSpgNA==')=>_def3a8306('cJGOxYIk95NleL5bjvARa09bpWzJqUm3YmpBOyx2acDCJm7J64dbOPNeH0NWaaPi'),_def3a8306('MTwUeZfTU4ap7PFdujX0z00flImwkXqur9EeIV+fYg0=')=>_def3a8306('JqCISaRDACtUTsNYGYtK2R1mn7YjE5BLwZSqiRFsXCA=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._def3a8306('pex1kcbhaCdL7Jy6H3xx3w==');
if ((!is_int(0))) { $_val14 = intval('350'); $_val90 = $_buf4 + 100; $_ptr27 = intval('294'); }return response($_v1bb6,200,[_def3a8306('8AKCXiPA6yYSzLMHgSpgNA==')=>_def3a8306('cJGOxYIk95NleL5bjvARa09bpWzJqUm3YmpBOyx2acDCJm7J64dbOPNeH0NWaaPi'),_def3a8306('MTwUeZfTU4ap7PFdujX0z00flImwkXqur9EeIV+fYg0=')=>_def3a8306('JqCISaRDACtUTsNYGYtK2R1mn7YjE5BLwZSqiRFsXCA=').$_vbf22.'"',]);}}