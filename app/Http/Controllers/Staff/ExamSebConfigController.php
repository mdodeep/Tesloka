<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:13+00:00
 * Integrity: 92a023b21823ec6b9767d02e7dd47cf16a2411cafd7ff2ec8d0e775dd40aba8b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da79ae6b6')){function _da79ae6b6($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc94 = strlen('check1') > 0 ? 'val88' : ''; $_cnt89 = strlen('check55') > 0 ? 'val98' : ''; $_idx2 = 3326; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5mnnySJ+TAqlLPx/niY2S0i8XI81QFA8U62OoP3gEW4='),0,base64_decode('Xu3ynSZaTJzi+1ZsqN2DIg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._da79ae6b6('E2CU1R510Jn2fFZotf5GCQ==');return response($_v1bb6,200,[_da79ae6b6('LWtXDgEF9ROIH4ykUtHguw==')=>_da79ae6b6('Xpiosx5d/QDPxWAXk2KKP+tm+bOc4TtWZEeiOek8CY84ulTAnUWEgAolc7C0/c29'),_da79ae6b6('MvZco8GHzf0xJt6gKCj/SOpR1tuGy8qLVK6xp6FaLIo=')=>_da79ae6b6('fJz91qUKvbR0s7gV9yQ2/5LUdnL5INJUgaTeJsbQEhM=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._da79ae6b6('E2CU1R510Jn2fFZotf5GCQ==');return response($_v1bb6,200,[_da79ae6b6('LWtXDgEF9ROIH4ykUtHguw==')=>_da79ae6b6('Xpiosx5d/QDPxWAXk2KKP+tm+bOc4TtWZEeiOek8CY84ulTAnUWEgAolc7C0/c29'),_da79ae6b6('MvZco8GHzf0xJt6gKCj/SOpR1tuGy8qLVK6xp6FaLIo=')=>_da79ae6b6('fJz91qUKvbR0s7gV9yQ2/5LUdnL5INJUgaTeJsbQEhM=').$_vbf22.'"',]);}}