<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__) // このディレクトリから再帰的に探索
    ->name('*.php') // PHP ファイルのみ対象
    ->exclude('vendor') // vendorディレクトリを除外
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        // その他のルールや好みの設定を追加
    ])
    ->setFinder($finder);
