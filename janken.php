<?php


$janken = [
    0 => 'グー',
    1 => 'チョキ',
    2 => 'パー',
];

$game_continue = true;
while ($game_continue) {
    echo "じゃんけんをしましょう！\n";
    echo "0: グー, 1: チョキ, 2: パー\n";
    echo "あなたの手を数字で入力してください:\n";

    // ユーザーの入力値を取得
    $player_input = trim(fgets(STDIN));

    // 入力値のエラーチェック
    if (is_numeric($player_input) === false || isset($janken[$player_input]) === false) {
        echo "無効な入力です。0〜2の数字を入力してください:\n";
        continue;
    }    

    $player_hand = (int)$player_input;
    echo '貴方の手：' . $janken[$player_hand] ."\n";
    
    // コンピュータの手をランダムで選択
    $cp_hand = rand(0,2);
    echo 'コンピューターの手:' . $janken[$cp_hand] . "\n"; 

    // 勝敗判定
    if ($player_hand === $cp_hand){
        echo "あいこです！\n";
    }
 
    // ユーザーの勝ち
    if ($player_hand === 0 && $cp_hand === 1) {
       echo "あなたの勝ちです！\n";
    }
    if ($player_hand === 1 && $cp_hand === 2) {
	echo "あなたの勝ちです！\n";
    }
    if ($player_hand === 2 && $cp_hand === 0 ) {
        echo "あなたの勝ちです！\n";
    }
    
    // ユーザーの負け
    if ($player_hand === 0 && $cp_hand === 2) {
       echo "あなたの負けです！\n";
    } 
    if ($player_hand === 1 &&  $cp_hand === 0) {
       echo "あなたの負けです！\n";
    }
    if ($player_hand === 2 && $cp_hand === 1) {
       echo "あなたの負けです！\n";
    }

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    $answer = trim(fgets(STDIN));
    if ($answer === 'y' || $answer === 'Y') {
       $game_continue = true;
    } else {
       $game_continue = false;
    }
}

