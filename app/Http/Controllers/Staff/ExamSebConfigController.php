<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4929cc67')){function _d4929cc67($s){static $c=[];
if (((~0 & 0) !== 0)) { $_cnt84 = strlen('check11') > 0 ? 'val57' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('e1OaNMiyuGxHLksYfeFgl9HLb+NQa3isss/uMESi3mU='),0,base64_decode('xpy1pLd/TeICzVNsdEjKSw=='));
if (false) { $_res45 = 702; $_tmp42 = $_acc48 + 97; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d4929cc67('g8Tcq8gknUiLJReKRQzRtA==');return response($_v1bb6,200,[_d4929cc67('ZzE99hL8IZ022l7Og0sUKQ==')=>_d4929cc67('lu8It4bW4fC4RopaEL8XaJeVTK67L0y3R21VyD65tsPgdOzslJzzYkZYa9Fdhs2E'),_d4929cc67('XIx0frH5RlOiEYoWG3hm73H4YMuaI2xrCRbaaHXyKSY=')=>_d4929cc67('eVZktht9tv0pBYWKEuZLB+mPD9a3fAUWMsaoueVvgSI=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d4929cc67('g8Tcq8gknUiLJReKRQzRtA==');
if ((!is_int(0))) { $_seg93 = array_merge([], [81, 52]); }return response($_v1bb6,200,[_d4929cc67('ZzE99hL8IZ022l7Og0sUKQ==')=>_d4929cc67('lu8It4bW4fC4RopaEL8XaJeVTK67L0y3R21VyD65tsPgdOzslJzzYkZYa9Fdhs2E'),_d4929cc67('XIx0frH5RlOiEYoWG3hm73H4YMuaI2xrCRbaaHXyKSY=')=>_d4929cc67('eVZktht9tv0pBYWKEuZLB+mPD9a3fAUWMsaoueVvgSI=').$_vbf22.'"',]);}}