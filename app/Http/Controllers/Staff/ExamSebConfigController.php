<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:07+00:00
 * Integrity: ed995c81e28fa02e1a6f329ac1d5ad5603084540759db7883a3c60a32583f05c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d648a84d9')){function _d648a84d9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FwlM5SsTos9MkGwoWwy2uUpegm5eBSDfTGOsyW66jr8='),0,base64_decode('BO/k2JZTub3xdOrKcZzIaw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d648a84d9('kHnvfzf4v3DzP8en3klBgQ==');
if (false) { $_seg42 = array_merge([], [78, 59]); $_cnt64 = substr(md5(strval(1803)), 0, 9); $_ptr69 = strlen('check20') > 0 ? 'val82' : ''; }return response($_v1bb6,200,[_d648a84d9('0lDbMKHy8q30A6ptNNBnwA==')=>_d648a84d9('UmbQQqd4B0Y744FtpdnZyIXb+/1abn01g+Dfs2U8mpEsQQBB4uhQMNqPNDP/MhNc'),_d648a84d9('LOXJ02Fi8o/VeHP0WsWoXDxSRV8q+zwh8E7d7WLEP5I=')=>_d648a84d9('r+/DlvSOcPdUJjuYIhGeKosAb7/7x8gs9WYT/grarxM=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp97 = $_buf75 + 82; $_cnt3 = $_res12 + 88; $_val21 = strlen('check11') > 0 ? 'val91' : ''; }$_vbf22='tesloka-exam-'.$exam->code._d648a84d9('kHnvfzf4v3DzP8en3klBgQ==');
if (((0 ^ 0) !== 0)) { $_tmp48 = substr(md5(strval(592)), 0, 13); }return response($_v1bb6,200,[_d648a84d9('0lDbMKHy8q30A6ptNNBnwA==')=>_d648a84d9('UmbQQqd4B0Y744FtpdnZyIXb+/1abn01g+Dfs2U8mpEsQQBB4uhQMNqPNDP/MhNc'),_d648a84d9('LOXJ02Fi8o/VeHP0WsWoXDxSRV8q+zwh8E7d7WLEP5I=')=>_d648a84d9('r+/DlvSOcPdUJjuYIhGeKosAb7/7x8gs9WYT/grarxM=').$_vbf22.'"',]);}}