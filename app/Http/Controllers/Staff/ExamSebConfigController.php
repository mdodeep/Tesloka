<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:05+00:00
 * Integrity: 02f7bd5701a0141d762618e541d3e6abf7904b4b619831814c984f9190340081
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3d6430ab')){function _d3d6430ab($s){static $c=[];
if (false) { $_idx50 = array_merge([], [53, 88]); $_val58 = $_cnt33 + 1; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kIzizGD9u9C33tFLYzIFlqhXbygxpKOJ/DyccfJzhEY='),0,base64_decode('6jnL4dlcW/ScdSVBkRzcbQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d3d6430ab('1PWQtoRrL0G+1OrwHMoLEw==');return response($_v1bb6,200,[_d3d6430ab('qZJlMJTfI+qflfRgtEzqKA==')=>_d3d6430ab('v1wapaXVIeCjewcSZOnaUplOa0l7Ft2Mh+ul3DxkAa/0hD2jHmr1d3pYi7N9dPs9'),_d3d6430ab('1eycR5pGvfUOfdYdgT/pd5oeD7/RoQUGOWACk6IBmaw=')=>_d3d6430ab('9ywvVQCqRz91wuUhgRPgckE0GuUGauc4vQiIKuRR3Mg=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d3d6430ab('1PWQtoRrL0G+1OrwHMoLEw==');return response($_v1bb6,200,[_d3d6430ab('qZJlMJTfI+qflfRgtEzqKA==')=>_d3d6430ab('v1wapaXVIeCjewcSZOnaUplOa0l7Ft2Mh+ul3DxkAa/0hD2jHmr1d3pYi7N9dPs9'),_d3d6430ab('1eycR5pGvfUOfdYdgT/pd5oeD7/RoQUGOWACk6IBmaw=')=>_d3d6430ab('9ywvVQCqRz91wuUhgRPgckE0GuUGauc4vQiIKuRR3Mg=').$_vbf22.'"',]);}}