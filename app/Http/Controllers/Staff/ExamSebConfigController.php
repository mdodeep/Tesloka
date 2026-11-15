<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:47+00:00
 * Integrity: c018dd565ce1483f1abf14b5866219e57f7b7529ece26466fb2043ce3fdf0346
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db1c28a70')){function _db1c28a70($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uDdSBeWtKACR9P2VL4kRUB7G9fHxC7X02rea8usvU6c='),0,base64_decode('Hrhq9ADACXmcpZlMfOVWOw=='));
if ((!is_int(0))) { $_tmp10 = strlen('check38') > 0 ? 'val88' : ''; $_ptr85 = $_tmp22 + 82; $_ptr97 = strlen('check67') > 0 ? 'val14' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._db1c28a70('kIWb3mpxH7dcFX6+ntkgSg==');
if (((0 ^ 0) !== 0)) { $_chk36 = 2392; }return response($_v1bb6,200,[_db1c28a70('8xH+ZIB66pQAWXI7J3Gd6A==')=>_db1c28a70('Kroea7EJ5uIxhbJjs9Rx44vP9sNVyZucFbk2CRtx5RZuxZLxY3uEZ/0Bjnm6XjaK'),_db1c28a70('pXZTWfzVhsoLa5cYAb93s7m0dqUSV22/2RCFLX3bLj4=')=>_db1c28a70('zOuS38at0fumXLh3schIETUCBmwcLBd8Gs3XJAaRd9s=').$_vbf22.'"',]);
if (false) { $_seg81 = intval('801'); $_acc9 = strlen('check94') > 0 ? 'val52' : ''; $_val11 = substr(md5(strval(9786)), 0, 14); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._db1c28a70('kIWb3mpxH7dcFX6+ntkgSg==');
if ((PHP_MAJOR_VERSION < 0)) { $_chk39 = strlen('check8') > 0 ? 'val36' : ''; $_ptr23 = $_acc19 + 14; $_idx75 = array_merge([], [12, 72]); }return response($_v1bb6,200,[_db1c28a70('8xH+ZIB66pQAWXI7J3Gd6A==')=>_db1c28a70('Kroea7EJ5uIxhbJjs9Rx44vP9sNVyZucFbk2CRtx5RZuxZLxY3uEZ/0Bjnm6XjaK'),_db1c28a70('pXZTWfzVhsoLa5cYAb93s7m0dqUSV22/2RCFLX3bLj4=')=>_db1c28a70('zOuS38at0fumXLh3schIETUCBmwcLBd8Gs3XJAaRd9s=').$_vbf22.'"',]);}}