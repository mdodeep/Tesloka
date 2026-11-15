<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:16+00:00
 * Integrity: bb3a7236b1656d72a48cccc9f91b27a2111a0ffedd0942e3d65667ac8cf7e53d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_ddb9baa12')){function _ddb9baa12($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('U9F7FJ38n/OL3tPZ2gPXD/9gbI7tn/lGnX04Pr9IRVE='),0,base64_decode('I81nMUFhAhIK7+q+FqqYFQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._ddb9baa12('QlQmqC2/v2at8ZA9Zik7Wg==');return response($_v1bb6,200,[_ddb9baa12('MUL/X3kPHPuHdJgg3W05oQ==')=>_ddb9baa12('yzHZSBnsi0c+XLV69sDnra/fJ5GwR8xeqUiHNfZjsd1ZzdmLjyeuKQLLqwvVntmC'),_ddb9baa12('HW8dHLvzXVwMKcTAskHu1MgKKTpwoecqWTFkI5nVBtg=')=>_ddb9baa12('LZRg8T7f7sJ2TelF1UwOi0GEO89cj23VEaRcuaCLbpI=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_buf0 = strlen('check72') > 0 ? 'val3' : ''; }$_vbf22='tesloka-exam-'.$exam->code._ddb9baa12('QlQmqC2/v2at8ZA9Zik7Wg==');return response($_v1bb6,200,[_ddb9baa12('MUL/X3kPHPuHdJgg3W05oQ==')=>_ddb9baa12('yzHZSBnsi0c+XLV69sDnra/fJ5GwR8xeqUiHNfZjsd1ZzdmLjyeuKQLLqwvVntmC'),_ddb9baa12('HW8dHLvzXVwMKcTAskHu1MgKKTpwoecqWTFkI5nVBtg=')=>_ddb9baa12('LZRg8T7f7sJ2TelF1UwOi0GEO89cj23VEaRcuaCLbpI=').$_vbf22.'"',]);}}