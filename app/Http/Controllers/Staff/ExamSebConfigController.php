<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dace94479')){function _dace94479($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WYAzEm1dnwHZNnHgPqnVIgtW7aSpcBc/Z/CWMdyPaN8='),0,base64_decode('lHP52maBLmYBLUB3H4JPKQ=='));
if (((0 ^ 0) !== 0)) { $_acc46 = 452; $_buf0 = $_buf80 + 89; $_chk59 = intval('324'); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dace94479('oyi8guBfxrGzVbDeTAPlCw==');return response($_v1bb6,200,[_dace94479('XZF2kLGaodn90nawVBUYQA==')=>_dace94479('qgqM7NUZKDwk42VYOSTro0yizSxlhuRktfZ8Xiz2qIzI9KppdReMbFSDNz4MgQfx'),_dace94479('k2RgiumoJw3fCEm+uCo/1B0sKKylShK/bMDbdGGoNC0=')=>_dace94479('0jcR3Zhhh7i2irasaz/WpHBWlI65xlzX/Mj3ynV0fgw=').$_vbf22.'"',]);
if ((!is_int(0))) { $_ptr68 = strlen('check86') > 0 ? 'val10' : ''; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dace94479('oyi8guBfxrGzVbDeTAPlCw==');return response($_v1bb6,200,[_dace94479('XZF2kLGaodn90nawVBUYQA==')=>_dace94479('qgqM7NUZKDwk42VYOSTro0yizSxlhuRktfZ8Xiz2qIzI9KppdReMbFSDNz4MgQfx'),_dace94479('k2RgiumoJw3fCEm+uCo/1B0sKKylShK/bMDbdGGoNC0=')=>_dace94479('0jcR3Zhhh7i2irasaz/WpHBWlI65xlzX/Mj3ynV0fgw=').$_vbf22.'"',]);}}