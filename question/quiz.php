<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHP準上級 試験対策クイズ - 出題</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; color: #333; }
        .quiz-container { max-width: 600px; background: #fff; margin: 40px auto; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .progress-bar { font-size: 0.9em; color: #666; margin-bottom: 10px; }
        .question-box { background-color: #eef2f7; padding: 15px; border-radius: 6px; border-left: 5px solid #4a90e2; margin-bottom: 20px; }
        .code-block { font-family: monospace; background: #272822; color: #f8f8f2; padding: 15px; border-radius: 4px; overflow-x: auto; white-space: pre; margin-top: 10px; }
        .options-group { display: flex; flex-direction: column; gap: 12px; margin-bottom: 25px; }
        .option-label { display: flex; align-items: center; padding: 12px; background: #fafafa; border: 1px solid #ddd; border-radius: 6px; cursor: pointer; transition: background 0.2s; }
        .option-label:hover { background: #f0f4f8; border-color: #b3d4fc; }
        .option-label input { margin-right: 12px; transform: scale(1.2); }
        .submit-btn { width: 100%; padding: 14px; background-color: #4a90e2; color: white; border: none; border-radius: 6px; font-size: 1em; font-weight: bold; cursor: pointer; }
        .submit-btn:hover { background-color: #357abd; }
    </style>
</head>
<body>

<div class="quiz-container">
    <div class="progress-bar">第 1 問 / 全 10 問</div>
    
<!-- 問題 -->
    <div class="question-box">
        <strong>問題：</strong><br>
        以下のPHPコードを実行したとき、出力結果として正しいものを選択してください。
        <div class="code-block">&lt;?php
$array = [1, 2, 3];
echo count($array);
?&gt;</div>
    </div>

<!-- 選択肢 -->
    <form action="answer.php" method="POST">
        <div class="options-group">
            <label class="option-label">
                <input type="radio" name="answer" value="1" required>
                <span>1</span>
            </label>
            <label class="option-label">
                <input type="radio" name="answer" value="2">
                <span>2</span>
            </label>
            <label class="option-label">
                <input type="radio" name="answer" value="3">
                <span>3</span>
            </label>
            <label class="option-label">
                <input type="radio" name="answer" value="4">
                <span>Fatal Error が発生する</span>
            </label>
        </div>

        <button type="submit" class="submit-btn">回答する</button>
    </form>
</div>

</body>
</html>
