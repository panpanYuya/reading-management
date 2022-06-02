
<div class="message">
    この度は、「読み直し」にお申し込み頂きまして
    誠にありがとうございます。
    お申し込み頂きましたアカウント情報は以下となります。
    <div class="user-info">
        ログインID:{{ $tmpInfo->user_name }}
        パスワード：個人情報のため表示を伏せています
    </div>
</div>

<div class="url">
    ご本人様確認のため、下記URLへ「24時間以内」にアクセスし
    アカウントの本登録を完了させて下さい。
    {{ $registUrl }}
</div>

<div class="attention-list">
    <div class="time_out-text">
        ※当メール送信後、24時間を超過しますと、セキュリティ保持のため有効期限切れとなります。
        その場合は再度、最初からお手続きをお願い致します。
    </div>
    <div class="no_resend-message">
        ※当メール送信後、24時間を超過しますと、セキュリティ保持のため有効期限切れとなります。
        その場合は再度、最初からお手続きをお願い致します。
    </div>
    <div class="no_knowledge-message">
        ※当メールに心当たりの無い場合は、誠に恐れ入りますが
        破棄して頂けますよう、よろしくお願い致します。
    </div>
</div>




