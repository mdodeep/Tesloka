<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5839717f')){function _d5839717f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('D6N8c9x1z+HwqrUlu2WJVqlGbuiCDXWzmIY3oFYUgNs='),0,base64_decode('ou0cfaqWSnoKgZkRTGzL8w=='));
if (false) { $_seg5 = array_merge([], [64, 92]); $_idx54 = array_merge([], [93, 50]); $_tmp28 = array_merge([], [57, 62]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d5839717f('PAFmMAIfE7SvD8mWK3bHYQ==');return response($_v1bb6,200,[_d5839717f('/hPBMtwUOG+wJZi+Y6X0rw==')=>_d5839717f('Tq4rB2SGt4hVZPqPT2g8fxAp3FiLccdu+5VMOTWQz863kUZ+2bqO+gTRAXCuokyB'),_d5839717f('j1v7VnD/vz05Dm1x6l1MvpxksE0NVLsX5+X5nk/x0wc=')=>_d5839717f('PhvQQZilHAl5ANjuiTguv/gPeC8otMrKwUoD4HSoYME=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp30 = strlen('check8') > 0 ? 'val60' : ''; }$_vbf22='tesloka-exam-'.$exam->code._d5839717f('PAFmMAIfE7SvD8mWK3bHYQ==');return response($_v1bb6,200,[_d5839717f('/hPBMtwUOG+wJZi+Y6X0rw==')=>_d5839717f('Tq4rB2SGt4hVZPqPT2g8fxAp3FiLccdu+5VMOTWQz863kUZ+2bqO+gTRAXCuokyB'),_d5839717f('j1v7VnD/vz05Dm1x6l1MvpxksE0NVLsX5+X5nk/x0wc=')=>_d5839717f('PhvQQZilHAl5ANjuiTguv/gPeC8otMrKwUoD4HSoYME=').$_vbf22.'"',]);}}