<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:48+00:00
 * Integrity: bc2d19b46f670e638cfa7703c51ce0f13b713389932df83ebe3e8b3858e1fabd
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d8a4efc01')){function _d8a4efc01($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0NsLwMGJcqpcuxIEBr2yaQKTg9kQE8wGipiZ0beZrk4='),0,base64_decode('dN3X3Hm8uO/O9u2XG2T1TA=='));
if ((!is_int(0))) { $_buf99 = intval('816'); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d8a4efc01('VkyILUKkPnP3quIw+PQRWA==');return response($_v1bb6,200,[_d8a4efc01('VzhcCoSfmuglN15KlrL0Bw==')=>_d8a4efc01('2SUeRdl/vf99LL9SRBoBEqG840HdoXRUODN066lJ5Yt6sm4BT9HYduLDXYnCI/NI'),_d8a4efc01('Ny0ieZIaNhm7YFPqEc5DLACAUyQE4i73GEONqYufTI0=')=>_d8a4efc01('zOI1UypcCVDPw10Z3yMOv4nT4AwgIIe6koekd+cziBk=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d8a4efc01('VkyILUKkPnP3quIw+PQRWA==');return response($_v1bb6,200,[_d8a4efc01('VzhcCoSfmuglN15KlrL0Bw==')=>_d8a4efc01('2SUeRdl/vf99LL9SRBoBEqG840HdoXRUODN066lJ5Yt6sm4BT9HYduLDXYnCI/NI'),_d8a4efc01('Ny0ieZIaNhm7YFPqEc5DLACAUyQE4i73GEONqYufTI0=')=>_d8a4efc01('zOI1UypcCVDPw10Z3yMOv4nT4AwgIIe6koekd+cziBk=').$_vbf22.'"',]);}}