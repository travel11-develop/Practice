<?php

// カプセル化を学ぶ
// ユーザーに必要のない部分はブラックボックス化して触れないようにする
// データへの直接アクセスを禁止し、決められた窓口（メソッド）だけを通して扱わせること
class Counter
{
    private int $counter;

    /**
     * インスタンス化のタイミングで実行する
     * プロパティ$counterの初期値を0で設定
     */
    public function __construct()
    {
        $this->counter = 0;
    }

    /**
     * カウントを１増やす
     */
    public function increaseCounter()
    {
        ++$this->counter;
    }

    /**
     * カウントを取得
     * 外部からのアクセス方法を制御する(＝アクセサ―メソッド)
     *
     * @return int
     */
    public function getCounter(): int
    {
        return $this->counter;
    }

    /**
     * カウントを0にリセット
     */
    public function resetCounter()
    {
        $this->counter = 0;
    }
}

$counter = new Counter();

echo '初期値：' . $counter->getCounter();

$counter->increaseCounter();
$counter->increaseCounter();
$counter->increaseCounter();
echo '実行後：' . $counter->getCounter();

$counter->resetCounter();
echo 'リセット後：' . $counter->getCounter();
