<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHP準上級 試験対策クイズ - 結果</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; color: #333; }
        .quiz-container { max-width: 600px; background: #fff; margin: 40px auto; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        
        /* 正解・不正解のバッジスタイル */
        .result-header { text-align: center; margin-bottom: 25px; }
        .badge { display: inline-block; padding: 10px 20px; font-size: 1.5em; font-weight: bold; border-radius: 30px; color: white; }
        .correct { background-color: #2ec4b6; } /* 正解の緑 */
        .incorrect { background-color: #e71d36; } /* 不正解の赤 */

        .explanation-box { background-color: #f8f9fa; border: 1px solid #e9ecef; padding: 20px; border-radius: 6px; margin-bottom: 25px; line-height: 1.6; }
        .explanation-title { font-weight: bold; color: #495057; margin-bottom: 8px; border-bottom: 2px solid #dee2e6; padding-bottom: 4px; }
        .next-btn { width: 100%; padding: 14px; background-color: #2b2d42; color: white; border: none; border-radius: 6px; font-size: 1em; font-weight: bold; cursor: pointer; text-align: center; text-decoration: none; display: block; box-sizing: border-box; }
        .next-btn:hover { background-color: #1d1e2c; }
    </style>
</head>
<body>

<div class="quiz-container">
    
    <div class="result-header">
        <span class="badge correct">正解！</span>
        
        </div>
    
    <div class="explanation-box">
        <div class="explanation-title">あなたの回答: 3 / 正解: 3</div>
        <p>
            <strong>【解説】</strong><br>
            <code>count()</code> 関数は、配列に含まれる要素の数を返します。
            この問題の配列 <code>$array</code> には <code>[1, 2, 3]</code> の3つの要素が含まれているため、結果は <code>3</code> となります。
        </p>
        <p style="font-size: 0.9em; color: #666;">
            🔗 参考：<a href="https://www.php.net/manual/ja/function.count.php" target="_blank">PHP公式マニュアル - count()</a>
        </p>
    </div>

    <a href="#" class="next-btn">次の問題へ</a>
</div>

</body>
</html>
