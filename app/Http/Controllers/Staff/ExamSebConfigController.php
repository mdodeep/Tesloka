<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:09+00:00
 * Integrity: bc7f5b3c74d51b63901f4967a2adc5558fd3cec333bf300f09ffd1de449a27e9
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d930e8d8c')){function _d930e8d8c($s){static $c=[];
if ((!is_int(0))) { $_acc66 = substr(md5(strval(8873)), 0, 5); $_seg39 = strlen('check44') > 0 ? 'val27' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9+rD3QK6uwHD1lkIwaoe83NUKQIy91fuC2Z9wyTQne0='),0,base64_decode('b0c0qAqSuK2ySRvQ7rMoyQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d930e8d8c('be57aybl0hAKjM933u4avA==');return response($_v1bb6,200,[_d930e8d8c('zMHM2MIvTRr3njsjnB7ySA==')=>_d930e8d8c('ewdScmrUoWShxJqUim3gb2gxRl5Z+m18GSjgQV8JOFnafWZ6QPImBvc/NgAlWFaZ'),_d930e8d8c('Q4Y5kWkUDUPApBagOVMmFfBT1KcturtXTAeA0A5XbHk=')=>_d930e8d8c('vpGDbNYGLLXqOFJoUfmql2O38365mz1o+Bb1F/jNKeY=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d930e8d8c('be57aybl0hAKjM933u4avA==');return response($_v1bb6,200,[_d930e8d8c('zMHM2MIvTRr3njsjnB7ySA==')=>_d930e8d8c('ewdScmrUoWShxJqUim3gb2gxRl5Z+m18GSjgQV8JOFnafWZ6QPImBvc/NgAlWFaZ'),_d930e8d8c('Q4Y5kWkUDUPApBagOVMmFfBT1KcturtXTAeA0A5XbHk=')=>_d930e8d8c('vpGDbNYGLLXqOFJoUfmql2O38365mz1o+Bb1F/jNKeY=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_val71 = intval('66'); $_ptr87 = substr(md5(strval(4443)), 0, 9); $_res51 = array_merge([], [60, 22]); }}}