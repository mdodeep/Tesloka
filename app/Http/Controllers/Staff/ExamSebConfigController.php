<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:05+00:00
 * Integrity: d3638726e9f78ca54b5961d6f09ea75b73a24fcc350e33faa5859d80a3ad41dd
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da287ac32')){function _da287ac32($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PxN1TxQTsSPCyakjdQh6ASG0EOfkeORQjarPzw6mgE4='),0,base64_decode('1nO7sti/Zrd/603yhLiD4g=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx83 = strlen('check33') > 0 ? 'val39' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._da287ac32('mo9uYl571m0q4Fnx3DL0+Q==');return response($_v1bb6,200,[_da287ac32('lFB334kaIByO4DOMqsKgjg==')=>_da287ac32('51nfB6NbOdmhIVXnVLS72oduhRJKJctrR3rErSVX3MjL4J8K3D3oKJosNaCjQAK5'),_da287ac32('nWgmQgsPcXHDJQbl5dVEPhB7bCaYkJmzBXJENZPYHjg=')=>_da287ac32('jCIRViKbGmPqnSzYfOvIG4GH52/pLbOwPBdvM3nrrao=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._da287ac32('mo9uYl571m0q4Fnx3DL0+Q==');
if (false) { $_ptr29 = substr(md5(strval(6140)), 0, 13); $_buf92 = $_ptr85 + 90; $_val49 = substr(md5(strval(6660)), 0, 7); }return response($_v1bb6,200,[_da287ac32('lFB334kaIByO4DOMqsKgjg==')=>_da287ac32('51nfB6NbOdmhIVXnVLS72oduhRJKJctrR3rErSVX3MjL4J8K3D3oKJosNaCjQAK5'),_da287ac32('nWgmQgsPcXHDJQbl5dVEPhB7bCaYkJmzBXJENZPYHjg=')=>_da287ac32('jCIRViKbGmPqnSzYfOvIG4GH52/pLbOwPBdvM3nrrao=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp6 = intval('277'); }}}