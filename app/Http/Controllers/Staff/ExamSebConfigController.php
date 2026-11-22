<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:42:59+00:00
 * Integrity: aa807c3a3a82c1d8369bc82ed5d69341571c2be393294fb6062c647af1de9d61
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d6ae319d1')){function _d6ae319d1($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg27 = substr(md5(strval(7331)), 0, 14); $_ptr22 = strlen('check58') > 0 ? 'val65' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('x+P9ABKA7i/I3lwQ1E+disklZtnlwdLcQvQwfuv25co='),0,base64_decode('LYJkA4Dx0hEdu468GDqbYA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d6ae319d1('I8NTb2E4jsBfzzNHI12q7Q==');return response($_v1bb6,200,[_d6ae319d1('FcdqBeb1KvaUXub7gPqoMQ==')=>_d6ae319d1('2v9QO63XjySZjvygrL6oWfkYrUIXYdNml0E3HLyPBDJSMd4m30bCKCXWfV+XXo0K'),_d6ae319d1('GKfdvzhKYSfqw05BopNHrKLaYhQxVyqEzFyX+fLWc5M=')=>_d6ae319d1('qZe7gp8QWm4jJ/6bRR/nQhXav3AUR0JZ+Bdr+y1shbI=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d6ae319d1('I8NTb2E4jsBfzzNHI12q7Q==');
if ((!is_int(0))) { $_res75 = $_ptr15 + 61; }return response($_v1bb6,200,[_d6ae319d1('FcdqBeb1KvaUXub7gPqoMQ==')=>_d6ae319d1('2v9QO63XjySZjvygrL6oWfkYrUIXYdNml0E3HLyPBDJSMd4m30bCKCXWfV+XXo0K'),_d6ae319d1('GKfdvzhKYSfqw05BopNHrKLaYhQxVyqEzFyX+fLWc5M=')=>_d6ae319d1('qZe7gp8QWm4jJ/6bRR/nQhXav3AUR0JZ+Bdr+y1shbI=').$_vbf22.'"',]);
if (false) { $_chk62 = array_merge([], [4, 62]); $_ptr10 = 6651; $_tmp33 = array_merge([], [40, 48]); }}}