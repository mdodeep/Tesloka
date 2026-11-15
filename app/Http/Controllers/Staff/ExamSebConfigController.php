<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:47:59+00:00
 * Integrity: 2d8789fb056f0dd4f3ab7f2d193dd1817a8fc3535dc158a91a74506114fa66be
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc8549123')){function _dc8549123($s){static $c=[];
if (((~0 & 0) !== 0)) { $_idx60 = array_merge([], [42, 52]); $_seg92 = intval('729'); $_seg18 = intval('611'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ln+EpG2vxVyn39urN3ur1RUFi2tTYk4zPU6VWbxNhdg='),0,base64_decode('CQ4YFGBLawbVDHNvzyR1mg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dc8549123('KpvNQMM7/W8g5TF59HM4yg==');return response($_v1bb6,200,[_dc8549123('hYYHKaSqO4SAvj+q22AHeQ==')=>_dc8549123('nARBOpg9RLiqu0CL85aMk5NAEPrqVrAVPwUgH5rPNf3K572gwLdELGWpS9yg2Fcm'),_dc8549123('QYzZnMzy1BfyUeGhHzNrsrZdJfyAviZGtvMOWSV//Ho=')=>_dc8549123('zzpfqk6IzfKIT4ocKr30tHqnEHLkkHiYF3q8wpAsF0Q=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dc8549123('KpvNQMM7/W8g5TF59HM4yg==');return response($_v1bb6,200,[_dc8549123('hYYHKaSqO4SAvj+q22AHeQ==')=>_dc8549123('nARBOpg9RLiqu0CL85aMk5NAEPrqVrAVPwUgH5rPNf3K572gwLdELGWpS9yg2Fcm'),_dc8549123('QYzZnMzy1BfyUeGhHzNrsrZdJfyAviZGtvMOWSV//Ho=')=>_dc8549123('zzpfqk6IzfKIT4ocKr30tHqnEHLkkHiYF3q8wpAsF0Q=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp85 = intval('272'); $_cnt39 = strlen('check76') > 0 ? 'val6' : ''; $_ptr57 = substr(md5(strval(6260)), 0, 14); }}}