<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:15+00:00
 * Integrity: 6d61329537e391e5ad76dd64a004a1d7f98b5ad76fcda3ec4b3e470c9334a10a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de94e9913')){function _de94e9913($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rZBziJ55bfupm2nQavZNZxASgCCwfPuCzDXGdLUUeuc='),0,base64_decode('foqxAegEo+ig9dqG4mCS/g=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._de94e9913('26SulUjGjugLl3cSicYyQg==');return response($_v1bb6,200,[_de94e9913('XsvoC5ZLSl2MxTD6QkzBMQ==')=>_de94e9913('fiR0zod3zU0uRdUmfPd24+acP6qPB0GHv4+a4SPZB3HWWwaizxRo2WobRAsPwS87'),_de94e9913('+jRO6Y603cMXTDOSL3RwH6gVVq+P/+tf5fyb2X4X9IQ=')=>_de94e9913('K9Clg7mYDf2BgpD6KV39lksZmLoRb6z9M2xqPRZG6l8=').$_vbf22.'"',]);
if (false) { $_tmp70 = $_chk52 + 40; $_buf3 = substr(md5(strval(4301)), 0, 16); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._de94e9913('26SulUjGjugLl3cSicYyQg==');return response($_v1bb6,200,[_de94e9913('XsvoC5ZLSl2MxTD6QkzBMQ==')=>_de94e9913('fiR0zod3zU0uRdUmfPd24+acP6qPB0GHv4+a4SPZB3HWWwaizxRo2WobRAsPwS87'),_de94e9913('+jRO6Y603cMXTDOSL3RwH6gVVq+P/+tf5fyb2X4X9IQ=')=>_de94e9913('K9Clg7mYDf2BgpD6KV39lksZmLoRb6z9M2xqPRZG6l8=').$_vbf22.'"',]);
if (false) { $_idx97 = $_seg17 + 21; $_res57 = array_merge([], [36, 69]); }}}