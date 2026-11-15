<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:31+00:00
 * Integrity: ebf1f91866326a3c04ab24e991b93ed175f3712abe0a3347f1a4689aaae07202
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd7927815')){function _dd7927815($s){static $c=[];
if ((!is_int(0))) { $_chk99 = 29; $_ptr20 = 9220; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('j11absbHfJVRELwKnTDaEu+ftxzvl6aCGQki87eAVH4='),0,base64_decode('ARriFMltVV9RmRLPk2JsyQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dd7927815('13DVzaSJHRJL8wD0r23+aA==');return response($_v1bb6,200,[_dd7927815('ZKg9dDvcibEqRcrtEKTd1g==')=>_dd7927815('eAVlHwLUEnRoO7XaNwhgk7OQ/Dmdbm9yyVPXO30bIEi7rFgXi0KgO4tKCGIrxEJt'),_dd7927815('wyLo1804oFyfdMMcjBPda0xWfEd4YeNwt+Xx/s3fR+4=')=>_dd7927815('GzV0Ruvu5SPldCx9atpBQQwl2cl02eA2xI3Pii800Pc=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dd7927815('13DVzaSJHRJL8wD0r23+aA==');return response($_v1bb6,200,[_dd7927815('ZKg9dDvcibEqRcrtEKTd1g==')=>_dd7927815('eAVlHwLUEnRoO7XaNwhgk7OQ/Dmdbm9yyVPXO30bIEi7rFgXi0KgO4tKCGIrxEJt'),_dd7927815('wyLo1804oFyfdMMcjBPda0xWfEd4YeNwt+Xx/s3fR+4=')=>_dd7927815('GzV0Ruvu5SPldCx9atpBQQwl2cl02eA2xI3Pii800Pc=').$_vbf22.'"',]);}}