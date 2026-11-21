<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:22+00:00
 * Integrity: 960c70a1e7cf94b1588365231191a61d56d4ab7f78261933e335dba285b1de5c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5965f484')){function _d5965f484($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+giqybH7dU/xdjqT2+hl+NMrya2hiMHiQSXHxsGJE1s='),0,base64_decode('a3+shfH5CvCPXB5mvk5+zw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d5965f484('CpE8hLAgRKFTFAW0+E1Wfg==');return response($_v1bb6,200,[_d5965f484('w+SthtysihgEJhWnp7x3yA==')=>_d5965f484('d7u4+d2Yc3OrMthczVnDm9xZVfP+qJjtMD7W06TcLdbyKXjm4HzEirRoysfi8Taz'),_d5965f484('9oAYFmVCiaj93gfCLmuqbETjzy+n4UwJxam3hCPK3Co=')=>_d5965f484('9MRnHnrG5l3kLaKbHUwXyz8LYfUqz/r5PUii9TcS+/M=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d5965f484('CpE8hLAgRKFTFAW0+E1Wfg==');return response($_v1bb6,200,[_d5965f484('w+SthtysihgEJhWnp7x3yA==')=>_d5965f484('d7u4+d2Yc3OrMthczVnDm9xZVfP+qJjtMD7W06TcLdbyKXjm4HzEirRoysfi8Taz'),_d5965f484('9oAYFmVCiaj93gfCLmuqbETjzy+n4UwJxam3hCPK3Co=')=>_d5965f484('9MRnHnrG5l3kLaKbHUwXyz8LYfUqz/r5PUii9TcS+/M=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_chk9 = array_merge([], [85, 49]); $_res87 = array_merge([], [69, 1]); }}}