<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:40+00:00
 * Integrity: 5766bafccc80b875b8e59e768211fee2150fea58672e4e9274628cf8f7165486
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5f86bb5f')){function _d5f86bb5f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('A5Y1aLFCIVK7QQWQxWkis13qdbzVwKqGFnO3/TMGELs='),0,base64_decode('qbtEJoZbgwTqZp3qHdW1rg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_acc71 = intval('502'); }$_vbf22='tesloka-config-'.$exam->code._d5f86bb5f('6thsMmZExdZNIvc+yNBxOQ==');return response($_v1bb6,200,[_d5f86bb5f('vrLMZ5qSk7eETMPoaPcOxg==')=>_d5f86bb5f('YME92iuKdOkazCdWu0qvD3zIUplTGr6pk5WHTi8zzUBLkqvl3rl88ECL1AdJ4IJ+'),_d5f86bb5f('GcaBJEI3LgpO1mKzibhTCb+Keiq6OjDQIoYS0Hq5V+U=')=>_d5f86bb5f('LBzI20PXqBYjDUkQJC0QQK48IO4fqEN1DLom/7yZpvs=').$_vbf22.'"',]);
if (((~0 & 0) !== 0)) { $_ptr21 = 611; $_idx28 = $_tmp50 + 59; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d5f86bb5f('6thsMmZExdZNIvc+yNBxOQ==');
if ((!is_int(0))) { $_seg57 = $_cnt99 + 48; }return response($_v1bb6,200,[_d5f86bb5f('vrLMZ5qSk7eETMPoaPcOxg==')=>_d5f86bb5f('YME92iuKdOkazCdWu0qvD3zIUplTGr6pk5WHTi8zzUBLkqvl3rl88ECL1AdJ4IJ+'),_d5f86bb5f('GcaBJEI3LgpO1mKzibhTCb+Keiq6OjDQIoYS0Hq5V+U=')=>_d5f86bb5f('LBzI20PXqBYjDUkQJC0QQK48IO4fqEN1DLom/7yZpvs=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_idx82 = substr(md5(strval(237)), 0, 14); }}}