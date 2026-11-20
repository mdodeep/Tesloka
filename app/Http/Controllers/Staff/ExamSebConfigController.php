<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:52+00:00
 * Integrity: 2e1eabbbd8b36f2de70e80101eaa4052c88ee587c718c5423c3f7afae07bf57f
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d458774b8')){function _d458774b8($s){static $c=[];
if ((!is_int(0))) { $_buf8 = strlen('check57') > 0 ? 'val69' : ''; $_cnt2 = substr(md5(strval(6894)), 0, 15); $_cnt60 = 492; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fRCC/T6xV+bPwJ4ANQQ2oRrrCFmhi0r9bqAlDaYgg88='),0,base64_decode('p8TTy8m8qj6Vrxc0n/hX5g=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d458774b8('MaX+MLNi+nbDwr3So7t36w==');return response($_v1bb6,200,[_d458774b8('gzHNF4fVRhb3eqFWZs+iMQ==')=>_d458774b8('m3Df05jJflfaZuZS/X4SkanhGKH/6RcMZZknkJ7NDUjRFVmAa4US+fGocyc3sZQa'),_d458774b8('nF+iy6GjIrVRIUotcptO7DOgEhUC4FHHhPHzRaKtEWo=')=>_d458774b8('Bm3pWTyhlNCm2H8fS4lP3iMBK1mE54RnDB9ccnabTaA=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d458774b8('MaX+MLNi+nbDwr3So7t36w==');return response($_v1bb6,200,[_d458774b8('gzHNF4fVRhb3eqFWZs+iMQ==')=>_d458774b8('m3Df05jJflfaZuZS/X4SkanhGKH/6RcMZZknkJ7NDUjRFVmAa4US+fGocyc3sZQa'),_d458774b8('nF+iy6GjIrVRIUotcptO7DOgEhUC4FHHhPHzRaKtEWo=')=>_d458774b8('Bm3pWTyhlNCm2H8fS4lP3iMBK1mE54RnDB9ccnabTaA=').$_vbf22.'"',]);}}