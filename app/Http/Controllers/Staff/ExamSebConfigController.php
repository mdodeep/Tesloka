<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:42+00:00
 * Integrity: 53bc74327c18e765d74c6475f6b850465c9378654adb7b23448a7ac1e9cf25b0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd1a475f7')){function _dd1a475f7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3XU91sFdg5XeM5bkRqjAgTQbtijgfu3y7lOVqskwJ3c='),0,base64_decode('TC4weux9AXtchmMCHmXItw=='));
if (false) { $_res85 = array_merge([], [56, 48]); $_acc92 = array_merge([], [13, 12]); $_res43 = intval('829'); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_buf91 = array_merge([], [99, 47]); $_val15 = intval('183'); $_cnt8 = intval('296'); }$_vbf22='tesloka-config-'.$exam->code._dd1a475f7('0ETVgfQozmD1HwS/006F9g==');return response($_v1bb6,200,[_dd1a475f7('yanQgUA6ZEHjIoAEUMdZLA==')=>_dd1a475f7('Z0FWvPEolOresM71E0mXpWTc2sL6X70R7861iKmwr7DndapA5jfnl6r0vXkFScuz'),_dd1a475f7('sbHJ2K/tec5LuWxtwv9Z3bv31WdHNdD5BmWaniBGMDk=')=>_dd1a475f7('hH6HGK85lqJmKJyHiRXL+/w8qaePDjd6QKcYmhCVeJ4=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dd1a475f7('0ETVgfQozmD1HwS/006F9g==');
if (((0 ^ 0) !== 0)) { $_res99 = strlen('check62') > 0 ? 'val61' : ''; $_seg1 = substr(md5(strval(6245)), 0, 13); $_res22 = intval('177'); }return response($_v1bb6,200,[_dd1a475f7('yanQgUA6ZEHjIoAEUMdZLA==')=>_dd1a475f7('Z0FWvPEolOresM71E0mXpWTc2sL6X70R7861iKmwr7DndapA5jfnl6r0vXkFScuz'),_dd1a475f7('sbHJ2K/tec5LuWxtwv9Z3bv31WdHNdD5BmWaniBGMDk=')=>_dd1a475f7('hH6HGK85lqJmKJyHiRXL+/w8qaePDjd6QKcYmhCVeJ4=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_val81 = strlen('check80') > 0 ? 'val26' : ''; $_ptr46 = substr(md5(strval(1552)), 0, 9); $_cnt22 = 9018; }}}