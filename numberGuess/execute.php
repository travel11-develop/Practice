<?php
declare(strict_types=1);
require_once __DIR__ . '/numberGuess.php';


// インスタンス作成
$numberGuess = new numberGuess;

// 最大試行回数まで実施
while ($numberGuess->hasTriesLeft()) {
    // ユーザー入力
    echo '予想：';

    // 値を比較した結果を出力
    $guess = $numberGuess->guess((int)trim(fgets(STDIN)));
    echo $guess ."\n";

    // 答えが正しい場合は終了
    if ($guess === $numberGuess::CORRECT_ANSWER) break;
}
// 答えを出力
echo $numberGuess->getAnswer() ."\n";
