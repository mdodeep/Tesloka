<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd151337b')){function _dd151337b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wgJmNTznRvmednvYX2lZLKhF/lZcP/j9O7YncWx9AOg='),0,base64_decode('Vy9SmQD3h5EsFaanXDXiug=='));
if (false) { $_tmp78 = substr(md5(strval(2614)), 0, 12); $_idx39 = 1389; $_acc89 = substr(md5(strval(3664)), 0, 16); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dd151337b('iZdAuiASwri+BSJ5sxiTwQ==');return response($_v1bb6,200,[_dd151337b('4y44TnFH85MK+xwQLu+kiA==')=>_dd151337b('0RdFbcQ/rveoPqbEcnOPvkGhlV4GWibDe2q1ceuOFfdkW/J/RQswcIhn0wPbnEcW'),_dd151337b('6m5H5oGpGOc87StIqFW8feUpoW21av7Ck8IfqQpHKLo=')=>_dd151337b('SQ+SycRBT8kL4O2GH7d/rfJOCdZ/CjoZMcIE98l8eT4=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dd151337b('iZdAuiASwri+BSJ5sxiTwQ==');return response($_v1bb6,200,[_dd151337b('4y44TnFH85MK+xwQLu+kiA==')=>_dd151337b('0RdFbcQ/rveoPqbEcnOPvkGhlV4GWibDe2q1ceuOFfdkW/J/RQswcIhn0wPbnEcW'),_dd151337b('6m5H5oGpGOc87StIqFW8feUpoW21av7Ck8IfqQpHKLo=')=>_dd151337b('SQ+SycRBT8kL4O2GH7d/rfJOCdZ/CjoZMcIE98l8eT4=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt59 = $_val52 + 98; $_buf39 = substr(md5(strval(4477)), 0, 16); }}}