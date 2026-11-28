<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:21+00:00
 * Integrity: 502d3471bcfe3e39551062ebb5b75de147e87a2936a728bf608d044b2d5870f7
 */

namespace App\Http\Controllers;use Illuminate\Support\Facades\Log;use Throwable;abstract class Controller{protected function safeExceptionMessage(Throwable $e,string $context,string $fallbackMessage,string $separator=': '):string{Log::error($context.': '.$e->getMessage(),['exception'=>$e,]);if(app()->isProduction()){return rtrim($fallbackMessage,': ').'.';}return $fallbackMessage.$separator.$e->getMessage();}}