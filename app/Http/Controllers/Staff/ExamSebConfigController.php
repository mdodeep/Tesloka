<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:56+00:00
 * Integrity: 4072f5c2ed854a61a3d5cfbfee6bb8b9fecbf87bc540634ca6bab2ee1156cd57
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d30f4181e')){function _d30f4181e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Y9aAR8yQ1FKF5yYcLNfD7gcurGXEig2aGuKyPQRV2PY='),0,base64_decode('EctE9YqL4xH5ifnWi6rysA=='));
if (((0 ^ 0) !== 0)) { $_chk93 = strlen('check62') > 0 ? 'val85' : ''; $_acc30 = array_merge([], [71, 6]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d30f4181e('Q/pC+DrHgorwyOES80JNLg==');return response($_v1bb6,200,[_d30f4181e('VFJMAQbdYZ3qa1XhwGo+sw==')=>_d30f4181e('X2N8PaljEaNiUVwPXS517qGQStYf4m/xZnvDVw9jkNPmLaiy5zt27ITQlDl8degf'),_d30f4181e('BXiZcrJJU1X+vYf4h7AQIy0bDLgQjn2rtNOAaXpkGjE=')=>_d30f4181e('cr3j8B3fyNsziVS1/Ux6/TXoV5dpa+5nwbZAp5LhaUA=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d30f4181e('Q/pC+DrHgorwyOES80JNLg==');return response($_v1bb6,200,[_d30f4181e('VFJMAQbdYZ3qa1XhwGo+sw==')=>_d30f4181e('X2N8PaljEaNiUVwPXS517qGQStYf4m/xZnvDVw9jkNPmLaiy5zt27ITQlDl8degf'),_d30f4181e('BXiZcrJJU1X+vYf4h7AQIy0bDLgQjn2rtNOAaXpkGjE=')=>_d30f4181e('cr3j8B3fyNsziVS1/Ux6/TXoV5dpa+5nwbZAp5LhaUA=').$_vbf22.'"',]);}}