<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:12+00:00
 * Integrity: 8d5d3ab1565a1c6004d77e7088567cfcd0361811034be58a4cca461c7134cb7d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d1952e5ec')){function _d1952e5ec($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GPUC/51bhV+L/0t7ErvaeWnEBwH+DW6zoVLbvmfRwJE='),0,base64_decode('qKdL588TrHLKCzCsFV14cA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx56 = intval('74'); $_chk36 = 2595; $_tmp13 = array_merge([], [38, 74]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_seg11 = substr(md5(strval(597)), 0, 4); }$_vbf22='tesloka-config-'.$exam->code._d1952e5ec('sM/9qxYx084XMkXI8VXA7g==');return response($_v1bb6,200,[_d1952e5ec('ngwf6YpOhtYLqLiIDz+JNQ==')=>_d1952e5ec('dHD0TP5Thoc9Tz7VuynxQTyQR0zV9tUEA7Z8zOof3E4WuL4L+lUGMtxF9VFXOB3m'),_d1952e5ec('eh+oATgy6f9ecDblPrS66mgr1MPGMtJDTl/87BDGPtA=')=>_d1952e5ec('d4mbjoFeP1bbzaba6MCt9oE3ndSPL/wgVi9OuxueabE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d1952e5ec('sM/9qxYx084XMkXI8VXA7g==');return response($_v1bb6,200,[_d1952e5ec('ngwf6YpOhtYLqLiIDz+JNQ==')=>_d1952e5ec('dHD0TP5Thoc9Tz7VuynxQTyQR0zV9tUEA7Z8zOof3E4WuL4L+lUGMtxF9VFXOB3m'),_d1952e5ec('eh+oATgy6f9ecDblPrS66mgr1MPGMtJDTl/87BDGPtA=')=>_d1952e5ec('d4mbjoFeP1bbzaba6MCt9oE3ndSPL/wgVi9OuxueabE=').$_vbf22.'"',]);}}