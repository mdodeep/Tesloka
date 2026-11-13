<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:26+00:00
 * Integrity: cd8be384ef5d7e2791a14b630546036af13e5c05577adfc73c5e3a2f05880e85
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd013e5dd')){function _dd013e5dd($s){static $c=[];
if (((~0 & 0) !== 0)) { $_chk36 = intval('464'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('52egpGvJlJFeJTQ3G8DfTZyFn4KOfvZ0ub9SIx+Txt4='),0,base64_decode('JHg6dAO55UbTKPjpaQCYIg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dd013e5dd('/XaZ8MTkJU01E1yybe7ycQ==');return response($_v1bb6,200,[_dd013e5dd('fOYNZ5jpbekauD7uf8BNVA==')=>_dd013e5dd('WYr33MSJp8aq8wFtvKXljD4BfzmegRwunW4b8brVnb/NcEFrrYRnQRFN9ljuteoy'),_dd013e5dd('CTqCAMQHXr7b1axX2Ccawn04BT4fKaHpHkSHzohpTOs=')=>_dd013e5dd('PMH4lktSNY1qWzcg1CLuvu9BFHLXSpQv8L72kpMt3xE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_res80 = 679; $_seg62 = strlen('check64') > 0 ? 'val76' : ''; $_cnt89 = 5572; }$_vbf22='tesloka-exam-'.$exam->code._dd013e5dd('/XaZ8MTkJU01E1yybe7ycQ==');return response($_v1bb6,200,[_dd013e5dd('fOYNZ5jpbekauD7uf8BNVA==')=>_dd013e5dd('WYr33MSJp8aq8wFtvKXljD4BfzmegRwunW4b8brVnb/NcEFrrYRnQRFN9ljuteoy'),_dd013e5dd('CTqCAMQHXr7b1axX2Ccawn04BT4fKaHpHkSHzohpTOs=')=>_dd013e5dd('PMH4lktSNY1qWzcg1CLuvu9BFHLXSpQv8L72kpMt3xE=').$_vbf22.'"',]);}}