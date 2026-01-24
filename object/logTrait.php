<?php

// トレイトを学ぶ
// 再利用可能な実装コードを切り出しておく仕組み
// トレイト自体はクラスの継承やインターフェースの実装ができない
trait LogTrait
{
    // PHP8.2以降、traitは定数定義が可能になった
    /**
     * ログ出力共通処理の実装
     * @param string
     * @return void
     */
    public function log(string $message): void
    {
        // 現在時刻を取得
        $now = date('Y-m-d H:i:s');

        // ログ出力
        echo $now . $message;
    }
}

trait FormatTrait
{
    /**
     * メッセージ整形の共通処理を実装
     *
     * @param string
     * @return string
     */
    public function format(string $type, string $message): string
    {
        return sprintf("|%s|%s", $type, $message);
    }
}

// メール通知ログを実行
class MailNotify
{
    use LogTrait, FormatTrait;

    /**
     * コンストラクタ定義
     */
    public function __construct(
            protected string $type = 'mail message',
    ) {}

    /**
     * メッセージ整形してログ出力する
     *
     * @param string
     * @return void
     */
    public function mailLog(string $message):void
    {
        $formated_message = $this->format($this->type, $message);
        $this->log($formated_message);
    }
}

// ファイルログ出力を実行
class FileLogger
{
    use LogTrait;
}

$mail = new MailNotify();
$file = new FileLogger();

$mail->mailLog('メール通知ログ');
$file->log('ファイルログ');
