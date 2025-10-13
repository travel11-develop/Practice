<?php
declare(strict_types=1);

/**
 * 数当てゲーム
 */
class numberGuess
{
    private int $answer;
    private int $maxTries; // 最大試行回数
    private int $tries; // 試行回数

    const CORRECT_ANSWER = '正解';
    const SMALLER_THAN_ANSWER = '答えより小さい';
    const GREATER_THAN_ANSWER = '答えより大きい';

    public function __construct(?int $fixedAnswer = null, int $maxTries = 5)
    {
        // ランダムな整数を答えに選ぶ
        $this->answer = $fixedAnswer ?? random_int(1, 50);
        $this->maxTries = $maxTries;
        $this->tries = 0;
    }

    /**
     * 入力値と答えを比較して「大きい/小さい/正解」を返す
     *
     * @param int $userInput
     * @return string
     */
    public function guess(int $userInput): string
    {
        // 試行回数を増やす
        $this->tries = ++$this->tries;

        if ($this->isCorrect($userInput)) {
            return self::CORRECT_ANSWER;
        }

        if ($userInput > $this->answer) {
            return self::GREATER_THAN_ANSWER;
        } else {
            return self::SMALLER_THAN_ANSWER;
        }
    }

    /**
     * まだ試行回数が残っているかを返す
     *
     * @return bool
     */
    public function hasTriesLeft(): bool
    {
        if ($this->tries === $this->maxTries) {
            return false;
        }
        return true;
    }

    /**
     * 正解かどうかを判定する
     *
     * @param int $userInput
     * @return bool
     */
    public function isCorrect(int $userInput): bool
    {
        if ($userInput === $this->answer) {
            return true;
        }
        return false;
    }

    /**
     * 正解の数字を返す（ゲーム終了後に表示用）
     *
     * @return int
     */
    public function getAnswer(): int
    {
        return $this->answer;
    }
}
