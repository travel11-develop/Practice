<?php

// interface
// 多重継承が可能。すべて抽象メソッド扱いになる
// 共通のプロパティを持てない
interface NotifyInterface
{
    /**
     * 通知するメソッド
     *
     * @param string 
     * @return string
     */
    function notify(string $content): string;
}

interface LoggerInterface
{
    /**
     * ログを残すメソッド
     *
     * @return void
     */
    function log(): void;
}

// interface の多重継承
interface NotifiableWithLog extends NotifyInterface, LoggerInterface
{

}

// 通知・ログの処理を実装する
// 継承したクラスのメソッドは必須で実装する
class MailNotify implements NotifiableWithLog
{
    public string $type;

    /**
     * インスタンス化のタイミングで実行する
     */
    public function __construct()
    {
        $this->type = 'メール通知';
    }

    /**
     * メール通知
     *
     * @param string
     * @return string
     */
    public function notify(string $content): string
    {
        return $this->type . '：' . $content;
    }

    /**
     * ログ
     *
     * @return void
     */
    public function log(): void
    {
        echo 'ログを記録しました。';
    }
}

// 通知の処理を実装する
class SmsNotify implements NotifyInterface
{
    public string $type;

    /**
     * インスタンス化のタイミングで実行する
     */
    public function __construct()
    {
        $this->type = 'SMS通知';
    }

    /**
     * SMS通知
     *
     * @param string
     * @return string
     */
    public function notify(string $content): string
    {
        return $this->type . '：' .  $content;
    }
}


$notifies = [
    new MailNotify(),
    new SmsNotify(),
];

// 通知内容を取得
$content = $argv[1] ?? '通知内容なし';

foreach ($notifies as $notify) {
    // 通知処理を実行
    echo $notify->notify($content);

    // LoggerInterfaceを継承するクラスのみログ処理を実行
    if ($notify instanceof LoggerInterface) {
        echo $notify->type;
        $notify->log();
    }
}
