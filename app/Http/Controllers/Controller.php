<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:07+00:00
 * Integrity: 92a6c2404dddf8851d3fad51559eb477b9eff4b9e31b596906256fb72f03074d
 */

namespace App\Http\Controllers;use Illuminate\Support\Facades\Log;use Throwable;abstract class Controller{protected function safeExceptionMessage(Throwable $e,string $context,string $fallbackMessage,string $separator=': '):string{Log::error($context.': '.$e->getMessage(),['exception'=>$e,]);if(app()->isProduction()){return rtrim($fallbackMessage,': ').'.';}return $fallbackMessage.$separator.$e->getMessage();}}