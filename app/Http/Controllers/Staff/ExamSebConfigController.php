<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:42+00:00
 * Integrity: d7d8d01c131c00a53f72fe8bb2ea935fcc0728784ca100e5c05cddf60a964ca2
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da4c49c5a')){function _da4c49c5a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZyKTL9qMiDIqo1ja1muOAhHGIe43pP2iRlzsRebsgzQ='),0,base64_decode('W3yFwcS73PjvmvVvy+8TOg=='));
if (((~0 & 0) !== 0)) { $_acc41 = strlen('check24') > 0 ? 'val89' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._da4c49c5a('jtrab8nMF85nLqPVKL2UuA==');return response($_v1bb6,200,[_da4c49c5a('yUERNujKYub1jgspZy/0DQ==')=>_da4c49c5a('TE4O2jA5rvw/UnXxHRxCcutOkBC88awXyZchNrSE6kD13MaaTPqmT18jjT/J/OmC'),_da4c49c5a('gqqSt8DtUr+FDaJGajHL5C2fkijd3aylaIfWhfeUPJE=')=>_da4c49c5a('wtYI9TmEJK074Me0dD+4rT3rG1nPfptKw88ne0LAMlg=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._da4c49c5a('jtrab8nMF85nLqPVKL2UuA==');return response($_v1bb6,200,[_da4c49c5a('yUERNujKYub1jgspZy/0DQ==')=>_da4c49c5a('TE4O2jA5rvw/UnXxHRxCcutOkBC88awXyZchNrSE6kD13MaaTPqmT18jjT/J/OmC'),_da4c49c5a('gqqSt8DtUr+FDaJGajHL5C2fkijd3aylaIfWhfeUPJE=')=>_da4c49c5a('wtYI9TmEJK074Me0dD+4rT3rG1nPfptKw88ne0LAMlg=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_val99 = substr(md5(strval(6080)), 0, 12); $_seg11 = array_merge([], [21, 7]); $_res21 = intval('807'); }}}