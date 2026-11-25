<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:14+00:00
 * Integrity: 208e702fcf3f681cf95e4944d60482aaaee62019348a8298b082e700ac6b49d9
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_df6603674')){function _df6603674($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jS9ntf75EBeaUu2EARDPOh1EBaIH9pESgKK6ohlW0KU='),0,base64_decode('KxRh2rEbZ+QMTEOB9tnQ+A=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._df6603674('0At1xcLI4qNSTULYiTuaGA==');return response($_v1bb6,200,[_df6603674('CCv9WpdQDZuzrBUISUZDzA==')=>_df6603674('Jfn5PpVnresgCX3alRcfDlxqP7jz8m+UChDr5Q67fklf1TeNJXEeYGnDFnnQVkmW'),_df6603674('1DdtpG3WVovQgrzop6ZXwigeCzsPvWYQTQYgfBAiuJ4=')=>_df6603674('oKuWUcWo+AEYeKFOgFMWZcpWactRxD862vcUNSklrks=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_acc17 = substr(md5(strval(3707)), 0, 5); $_val54 = strlen('check48') > 0 ? 'val58' : ''; }$_vbf22='tesloka-exam-'.$exam->code._df6603674('0At1xcLI4qNSTULYiTuaGA==');
if (((~0 & 0) !== 0)) { $_acc89 = strlen('check32') > 0 ? 'val32' : ''; $_chk41 = intval('589'); $_ptr14 = intval('483'); }return response($_v1bb6,200,[_df6603674('CCv9WpdQDZuzrBUISUZDzA==')=>_df6603674('Jfn5PpVnresgCX3alRcfDlxqP7jz8m+UChDr5Q67fklf1TeNJXEeYGnDFnnQVkmW'),_df6603674('1DdtpG3WVovQgrzop6ZXwigeCzsPvWYQTQYgfBAiuJ4=')=>_df6603674('oKuWUcWo+AEYeKFOgFMWZcpWactRxD862vcUNSklrks=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf56 = array_merge([], [20, 18]); $_tmp41 = $_buf17 + 9; $_buf72 = array_merge([], [83, 57]); }}}