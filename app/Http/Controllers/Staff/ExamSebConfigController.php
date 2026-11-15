<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:31+00:00
 * Integrity: 0fc568f4ba4da30bba9c07ba10466fcbbd923ab1e1fb4a8258d0fef9ced27354
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d774ed2c5')){function _d774ed2c5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vRs+ENZB5Z31O2WX54itdAaJ1uCwPsi2DU6F19sEf1Q='),0,base64_decode('EeUWASS/Z+YkQUOPeJmTGw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d774ed2c5('+4ORe6UI8wK2xwPmEJJBDA==');return response($_v1bb6,200,[_d774ed2c5('jW1P3Ij4JodyeN/WzLak8A==')=>_d774ed2c5('SSUY11lWbuMllxGzCpJmKTJC2JsR96Gf+VeHL0qXdLdj14s820IFM7WW/4vU4cwO'),_d774ed2c5('567SYcleccs+uXS5hBuurgFLZF+Q2czVw8HvB7bn9zg=')=>_d774ed2c5('qCL5d6Ex2E+a0NrE+wxR6Nc859RORIMr6LtOwX8suto=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((!is_int(0))) { $_res76 = substr(md5(strval(9204)), 0, 7); }$_vbf22='tesloka-exam-'.$exam->code._d774ed2c5('+4ORe6UI8wK2xwPmEJJBDA==');return response($_v1bb6,200,[_d774ed2c5('jW1P3Ij4JodyeN/WzLak8A==')=>_d774ed2c5('SSUY11lWbuMllxGzCpJmKTJC2JsR96Gf+VeHL0qXdLdj14s820IFM7WW/4vU4cwO'),_d774ed2c5('567SYcleccs+uXS5hBuurgFLZF+Q2czVw8HvB7bn9zg=')=>_d774ed2c5('qCL5d6Ex2E+a0NrE+wxR6Nc859RORIMr6LtOwX8suto=').$_vbf22.'"',]);}}