<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:05+00:00
 * Integrity: 334f6fecee30a14edeafbb975392a268fea1e09724b319a1feefff7567829fdd
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de3dc89cd')){function _de3dc89cd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('i+nliV+Fyk4h+dzCXTnqSHMCCWfQfEA81cAh1yYYkeU='),0,base64_decode('dc9ibdp7738Ycb5YygsuFA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp23 = substr(md5(strval(6859)), 0, 14); $_acc76 = substr(md5(strval(8877)), 0, 10); }$_vbf22='tesloka-config-'.$exam->code._de3dc89cd('TB5/rP7fzrjTOaV8i5ygag==');
if (((0 ^ 0) !== 0)) { $_res74 = intval('713'); }return response($_v1bb6,200,[_de3dc89cd('N2m/HIATL0sQsSF0WBVWGw==')=>_de3dc89cd('ed/vcdyOdxi+rd+ONsOVRWTFMLrE5FsCM2hVTDeR9gwpTEK36na9Ue/qmbjn0VGg'),_de3dc89cd('jrWYSlpMEY4/FpyIardWDJgtdncwf73aprpr3ZDe3qY=')=>_de3dc89cd('yWNfSMuax/AJRy1/F4UX0f6vby4mtA6nf6Q7X/vFbcE=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._de3dc89cd('TB5/rP7fzrjTOaV8i5ygag==');
if (((0 ^ 0) !== 0)) { $_buf54 = $_ptr61 + 10; $_buf43 = strlen('check23') > 0 ? 'val37' : ''; }return response($_v1bb6,200,[_de3dc89cd('N2m/HIATL0sQsSF0WBVWGw==')=>_de3dc89cd('ed/vcdyOdxi+rd+ONsOVRWTFMLrE5FsCM2hVTDeR9gwpTEK36na9Ue/qmbjn0VGg'),_de3dc89cd('jrWYSlpMEY4/FpyIardWDJgtdncwf73aprpr3ZDe3qY=')=>_de3dc89cd('yWNfSMuax/AJRy1/F4UX0f6vby4mtA6nf6Q7X/vFbcE=').$_vbf22.'"',]);}}