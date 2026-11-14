<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:02+00:00
 * Integrity: 6617f9441883322ea6dc9c7e36b83dd46a463f11d9f5f74ed153991a79ae4cb4
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dbc8874da')){function _dbc8874da($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QB4v477KU++WwN7KqUZz2ke46k/PHAm91yoyITIPwyE='),0,base64_decode('Ny0pmnQ3YDf8YHM1W9Dqmg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dbc8874da('lTL+1WR38VvhCRU9WsA0zA==');
if (((~0 & 0) !== 0)) { $_val22 = strlen('check62') > 0 ? 'val42' : ''; $_seg34 = array_merge([], [98, 35]); }return response($_v1bb6,200,[_dbc8874da('yx85be1OstfLoAuekDvVrw==')=>_dbc8874da('XMH2WuFyozNJLsEyIlUh/fHJZSrnKB9w93QaQ/UiWM2TTHiSJgUiqlXi0UxMcYVD'),_dbc8874da('78zdC2ZRqDP9govMfUxEaL999wua2QhqgsUyPkaf9v0=')=>_dbc8874da('q417jFvq0yoTngKLEPb8lgH+fuFh4dtLfUn+QU8zJIA=').$_vbf22.'"',]);
if (((~0 & 0) !== 0)) { $_buf49 = array_merge([], [42, 13]); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dbc8874da('lTL+1WR38VvhCRU9WsA0zA==');
if (((0 ^ 0) !== 0)) { $_res26 = intval('649'); $_idx43 = strlen('check69') > 0 ? 'val40' : ''; }return response($_v1bb6,200,[_dbc8874da('yx85be1OstfLoAuekDvVrw==')=>_dbc8874da('XMH2WuFyozNJLsEyIlUh/fHJZSrnKB9w93QaQ/UiWM2TTHiSJgUiqlXi0UxMcYVD'),_dbc8874da('78zdC2ZRqDP9govMfUxEaL999wua2QhqgsUyPkaf9v0=')=>_dbc8874da('q417jFvq0yoTngKLEPb8lgH+fuFh4dtLfUn+QU8zJIA=').$_vbf22.'"',]);}}