<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d407aa80c')){function _d407aa80c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yuR0bAo0J11u4Zi66JbNAqGSnfs+6guCZAxdaKG4YNQ='),0,base64_decode('H+b6dpScpvyLm6hWnBwq9g=='));
if ((!is_int(0))) { $_buf95 = array_merge([], [39, 78]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d407aa80c('zaS8Epn3f+keqoOgo0PssA==');return response($_v1bb6,200,[_d407aa80c('u0b4eWVlFebuKQn70FHX3w==')=>_d407aa80c('x5folEmwnNvWJ8Zv09oUQvogW0anddzOOID/DrOG8KY9U02DwzgmbD6S75ukMaL+'),_d407aa80c('is96kHxPNkDliRHXF5uaBTSxm9I7A/Ar8lnGWTgkqx4=')=>_d407aa80c('uAoW8FbNUnfZADqI4vsSeikVX/eYHh6aAfGZMbRD2FE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d407aa80c('zaS8Epn3f+keqoOgo0PssA==');return response($_v1bb6,200,[_d407aa80c('u0b4eWVlFebuKQn70FHX3w==')=>_d407aa80c('x5folEmwnNvWJ8Zv09oUQvogW0anddzOOID/DrOG8KY9U02DwzgmbD6S75ukMaL+'),_d407aa80c('is96kHxPNkDliRHXF5uaBTSxm9I7A/Ar8lnGWTgkqx4=')=>_d407aa80c('uAoW8FbNUnfZADqI4vsSeikVX/eYHh6aAfGZMbRD2FE=').$_vbf22.'"',]);}}