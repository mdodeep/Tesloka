<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d49ac3b50')){function _d49ac3b50($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kiQZox15RrTM0b14YXDuZ+o6zvWP3fSl5FQbU4WDiJ8='),0,base64_decode('K/DF6RVLU2Wz9xYohTt5sA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d49ac3b50('AQ5KzE8CglfR/gzP4EHfvQ==');return response($_v1bb6,200,[_d49ac3b50('yy2QuQLE1p/D/jaiTT5n9w==')=>_d49ac3b50('51aLvYEkyPnJeoxuMLcfSXc4rZYArI7KQZdBX7ChN4KXi40V3eUyfRvcNFeukjhm'),_d49ac3b50('B3zj40pq+U/KjlRY1q5zFR+2TzdT3goptrPoDmEd4Ck=')=>_d49ac3b50('Sa4lHaRToOSwAvY7YY6ZrPclGNP9gttMIRdxc8Grzko=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_val7 = array_merge([], [66, 63]); $_chk62 = array_merge([], [43, 10]); $_res48 = 801; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d49ac3b50('AQ5KzE8CglfR/gzP4EHfvQ==');return response($_v1bb6,200,[_d49ac3b50('yy2QuQLE1p/D/jaiTT5n9w==')=>_d49ac3b50('51aLvYEkyPnJeoxuMLcfSXc4rZYArI7KQZdBX7ChN4KXi40V3eUyfRvcNFeukjhm'),_d49ac3b50('B3zj40pq+U/KjlRY1q5zFR+2TzdT3goptrPoDmEd4Ck=')=>_d49ac3b50('Sa4lHaRToOSwAvY7YY6ZrPclGNP9gttMIRdxc8Grzko=').$_vbf22.'"',]);}}