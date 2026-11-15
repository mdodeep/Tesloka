<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:36+00:00
 * Integrity: 342c41507e746c4a730c8815f19f7a503aa5dead5c664b1886383b18ff3c978a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d854c92aa')){function _d854c92aa($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('H5dpcdpCYiLjyZ3dRd/kQM9KsuSjoL7KLeWUVhnkXRI='),0,base64_decode('iWmwXkv4T0jBm1pGO431ew=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d854c92aa('+ZSiC3v0l7mPnXrD+1a0aQ==');return response($_v1bb6,200,[_d854c92aa('SxWoC/fDLZNJfabTyF+zzQ==')=>_d854c92aa('lQx5bw3EMsmwnAKeALtml/RycF1SwPzsRCYrkHBjUY7L/D9qOznW9PWLACb1DT1u'),_d854c92aa('Yd31HtDxWt3fhGgjUdqRZWuaX6NpWDOh46YPQ9Bats8=')=>_d854c92aa('EToUhjXXVroF9XoSDqfLejI9398/n37BlJzkDf6Y51M=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_tmp40 = substr(md5(strval(6296)), 0, 13); }$_vbf22='tesloka-exam-'.$exam->code._d854c92aa('+ZSiC3v0l7mPnXrD+1a0aQ==');return response($_v1bb6,200,[_d854c92aa('SxWoC/fDLZNJfabTyF+zzQ==')=>_d854c92aa('lQx5bw3EMsmwnAKeALtml/RycF1SwPzsRCYrkHBjUY7L/D9qOznW9PWLACb1DT1u'),_d854c92aa('Yd31HtDxWt3fhGgjUdqRZWuaX6NpWDOh46YPQ9Bats8=')=>_d854c92aa('EToUhjXXVroF9XoSDqfLejI9398/n37BlJzkDf6Y51M=').$_vbf22.'"',]);}}