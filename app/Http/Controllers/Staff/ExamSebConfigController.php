<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:22+00:00
 * Integrity: 16a65b9464d88c8f5b1c02e23eb85fbd83cf70206971090d44187b4d78914702
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da2e59fd5')){function _da2e59fd5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('s6/8NH072DQ5OmZs2PMMtuLCe1/uy66xQxp1YrTwme8='),0,base64_decode('jXcI0YLXPGuYE3oOAco8FQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_buf93 = array_merge([], [61, 66]); }$_vbf22='tesloka-config-'.$exam->code._da2e59fd5('ccAM+PtK0jV0a19pyS9wCw==');return response($_v1bb6,200,[_da2e59fd5('PI2Y+/p+/KxXluczzYTAiA==')=>_da2e59fd5('dvmpCbhk4eCrOQv9eTXUqItmHA0GefDS3z/gQjrroy93MEkws6eSg4amJbFOOr5r'),_da2e59fd5('T8mBwkKEB22xGkGj1ajeuXYl0uw1OZp5utXmITGTzqc=')=>_da2e59fd5('DsspSJp79wi3hYlKG/gZXnoeoiABqFvVHI+/RpFaGMQ=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._da2e59fd5('ccAM+PtK0jV0a19pyS9wCw==');return response($_v1bb6,200,[_da2e59fd5('PI2Y+/p+/KxXluczzYTAiA==')=>_da2e59fd5('dvmpCbhk4eCrOQv9eTXUqItmHA0GefDS3z/gQjrroy93MEkws6eSg4amJbFOOr5r'),_da2e59fd5('T8mBwkKEB22xGkGj1ajeuXYl0uw1OZp5utXmITGTzqc=')=>_da2e59fd5('DsspSJp79wi3hYlKG/gZXnoeoiABqFvVHI+/RpFaGMQ=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc52 = $_buf63 + 76; $_res22 = 9917; }}}