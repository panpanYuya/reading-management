<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id' => '1',
            'api_id' => 'JzHnDwAAQBAJ',
            'book_cover_url' => 'http://books.google.com/books/publisher/content?id=JzHnDwAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&imgtk=AFLRE73XhxtDnO1r72Sd73TZqLA1--nj1vVdaAveEZV5f7s6Q1deW62T_kRAKm2-VrHfq0elMV5LHsDScX7aagELsKePgZEudWO7VOcV0fHU2RdimrpGdldLckGRbqc3WhAFN3gML-3H&source=gbs_api',
            'title' => 'SCRUM BOOT CAMP THE BOOK【増補改訂版】 スクラムチームではじめるアジャイル開発',
            'author' => '吉羽龍太郎',
            'description' => '<p>“はじめて「スクラム」をやることになったら読む本”<wbr>が7年ぶりに増補改訂！</p><p>近年、<wbr>より複雑化しているプロダクト開発をチームでうまく進めていく手<wbr>法として、<br>世界中で注目されている「スクラム」。<wbr>実際の開発現場にどう適用すればよいのかを、<br>とにかくわかりやすく解説しています。</p><p>・理論だけで終わらない“実践”の手引き<br>・架空の開発現場を題材に、実際のプラクティスを詳しく解説！</p><p>増補改訂では、初版以降のスクラムのルールの変更を踏まえて、<wbr>用語や説明の変更、<br>最近の開発現場に向けた追補など、<wbr>全面的な見直しを行っています。</p><p>・スクラムガイド2017年版に対応<br>・スクラムを実践しているチームの実情にあわせて更新<br>・開発現場の風景を更新<br>・プロダクトをより意識できるように修正<br>・コラムを全面刷新</p><p>これからスクラムをはじめたい人はもちろん、<wbr>スクラムを導入してみたけどなんだか<br>上手くいかないなぁ……<wbr>と思っている方にぜひ手にとっていただきたい一冊です。</p><p>【本書の概要】<br>はじめまして‼<br>今回、ひょんなことからスクラムマスターをまかされた「ボク」<wbr>です。<br>スクラムの開発を進めることになったんだけど、<wbr>僕も組織もはじめてで心細いな……。<br>スクラムについてまだ何もわかっていないので、<wbr>この本を参考にしようと思っています。<br>おおまかな内容は、次のようになっているんだって。</p><p>●基礎編<br>スクラムの全体像と決められているルールについて説明する。</p><p>●実践編<br>架空の開発現場を題材に、開発が始まるときから時系列に<br>スクラムではどう進めていくのかを説明する。</p><p>なるほど。<br>それでは、<wbr>ボクと一緒にこの本でスクラムとはどういったものなのかを学んで<wbr>いこう！</p><br>',
            'created_at' => '2022-07-17 18:58:29',
            'updated_at' => '2022-07-17 18:58:29',
        ]);
        DB::table('books')->insert([
            'id' => '2',
            'api_id' => '8jqjzgEACAAJ',
            'book_cover_url' => 'http://books.google.com/books/content?id=8jqjzgEACAAJ&printsec=frontcover&img=1&zoom=5&imgtk=AFLRE72-a6CtVHDqoqixYCOpEhs5CspuhA2rpg9DuVwIgAA29WcCRp8YG3PFynl8YJ7TtfzaaeXe4G5v06Q3M0xBr7sQZs4VZhdY35sG1pFFqRMChlrxDWBzbH-kFzkg7vKS9xNl0Iub&source=gbs_api',
            'title' => '同志少女よ、敵を撃て',
            'author' => '逢坂冬馬',
            'description' => '1942年、独ソ戦のさなか、モスクワ近郊の村に住む狩りの名手セラフィマの暮らしは、ドイツ軍の襲撃により突如奪われる。母を殺され、復讐を誓った彼女は、女性狙撃小隊の一員となりスターリングラードの前線へ──。第11回アガサ・クリスティー賞大賞受賞作。',
            'created_at' => '2022-08-16 15:43:49',
            'updated_at' => '2022-08-16 15:43:49',
        ]);
        DB::table('books')->insert([
            'id' => '3',
            'api_id' => 'bY_iDwAAQBAJ',
            'book_cover_url' => 'http://books.google.com/books/publisher/content?id=bY_iDwAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&imgtk=AFLRE73-v30Bcuq7x-OwwMNuAF_HE7d6FTjpJ4QcXZ_v030TPVErGpfnndePJsY6ToGBFU4ayMJmUNBHQJbNQ_PCGhuyJkt98tLTQ7ZazQLPqmDE-NjVLuIZK96gIL9Yy6tdIjUMRJ5l&source=gbs_api',
            'title' => '良い戦略、悪い戦略',
            'author' => '村井章子',
            'description' => '■良い戦略は単純明快だ!<br>良い戦略は、単純かつ明快である。<wbr>パワーポイントを使った説明も、マトリクスやチャートも無用。<wbr>必要なのは、打つ手の効果が一気に高まるポイントを見きわめ、<wbr>そこに狙いを絞って資源と行動を集中させること。<br>良い戦略は、組織が前に進むにはどうしたらよいかを明確に示す。<wbr>難局から目をそらさず、<wbr>それを乗り越えるための指針が示されている。「<wbr>いま何をすべきか」<wbr>がはっきりと実現可能な形で示されていない戦略は、欠陥品だ。<br><br>■世界的な戦略の研究者による第一級の著作!<br>世の中の「戦略」のほとんどは、戦略の体を為していない。<wbr>本書の目的は、「良い戦略」と「悪い戦略」<wbr>の驚くべきちがいを示し、「良い戦略」<wbr>を立てる手助けをすることにある。<wbr>著者ルメルトは世界的な経営学の研究者を表彰するThinker<wbr>s50に選ばれた人物であり、<wbr>長年にわたって戦略を研究してきた第一人者。<wbr>本書は超一流の著者による「経営戦略」の書。',
            'created_at' => '2022-09-12 21:34:23',
            'updated_at' => '2022-09-12 21:34:23',
        ]);
        DB::table('books')->insert([
            'id' => '4',
            'api_id' => 'NLZQEAAAQBAJ',
            'book_cover_url' => 'http://books.google.com/books/publisher/content?id=NLZQEAAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&imgtk=AFLRE72mdRO3hDel_2Q4DVq_zoNxG2KO3pk24ByUSoFpoEVX9LuaHupvgDmSpjOTX5nNl__UhHypZbqXWuCfS35sOl_z2WQkr0rYMvLA7LKQRR9ePcAbXao2z786wMPxsXsNSqxbfi0m&source=gbs_api',
            'title' => '人は聞き方が９割',
            'author' => '永松 茂久',
            'description' => '<p> 「聞き上手」がうまくいく！――「聞くのが苦手」「<wbr>人の話を聞く時間が苦痛だ」という人は多いものです。</p><p> でも、ちょっぴり「聞き方のコツ」を押さえるだけで、<wbr>聞くのが楽しくなり、<wbr>コミュニケーションがうまくいくようになり、<wbr>まわりから好かれるようになります。</p><p> 「聞き上手」になれば、<wbr>自分も相手も安心できる空間をつくることができ、<wbr>人と話すことがラクになり、人間関係も、人生も、<wbr>全部がよりよい方向に動き出します!</p><p>【株式会社すばる舎】</p>',
            'created_at' => '2022-09-12 21:41:10',
            'updated_at' => '2022-09-12 21:41:10',
        ]);
        DB::table('books')->insert([
            'id' => '5',
            'api_id' => '3kqrDwAAQBAJ',
            'book_cover_url' => 'http://books.google.com/books/publisher/content?id=3kqrDwAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&imgtk=AFLRE70hm1E2H0ZCUQgc_1XYSUmIpjz5lwxhjA1cUNs32ki4nLBvd0BoGv9RUp6YwxkTWVtrgxKxU6blgiIyzlLIHVA2cOegVDS7KLb_srQuUnwpR8WGk6meCesVoCyQy3M4vzwVOh98&source=gbs_api',
            'title' => '人は話し方が9割',
            'author' => '永松 茂久',
            'description' => '<p> 「もう会話で悩まない！疲れない！オロオロしない！」――<wbr>もっと話し方がうまければ、人生うまくいくのに……。「<wbr>話すこと」にまつわる悩みを挙げるとキリがありません。<wbr>本書でお伝えするのは、<wbr>コミュニケーションの基本である会話がうまくいくようになる、<wbr>ちょっとした、でも多くの人が気づいていないエッセンス。<wbr>過去に会話で失敗したトラウマもあっさり消え去ってしまうほど、<wbr>人と話すことがラクになり、人間関係も、人生も、<wbr>全部がよりよい方向に動き出します！</p><p>【株式会社すばる舎】</p>',
            'created_at' => '2022-09-12 21:41:17',
            'updated_at' => '2022-09-12 21:41:17',
        ]);
        DB::table('books')->insert([
            'id' => '6',
            'api_id' => 'C9MeefnE12kC',
            'book_cover_url' => 'http://books.google.com/books/content?id=C9MeefnE12kC&printsec=frontcover&img=1&zoom=5&edge=curl&imgtk=AFLRE701OqjxQIPhEGhxJUrkeyJyMUHmU3mMSWO2gYSrNk0O4P8okpB9LsuOWa692H81eiPMMPbgUpM6CFEXpMjJdG3ykEcJxRIgX9dP226yGOi7t3nzWBUqpHCxKQwdAGpPArhtfv5i&source=gbs_api',
            'title' => '伝え方が９割　【「伝え方が９割　２」試読版付き】',
            'author' => '佐々木圭一',
            'description' => '【『伝え方が９割 ２』が約50ページ分読めるダイジェスト版付き！】 なぜ伝え方で結果が変わるのでしょう? たとえば、好きな人がいるとします。 でもその人は、あなたのことに少しも興味がないとき、 何と言ってデートに誘いますか? 「デートしてください」 こう言ってみました。あなたのピュアな気持ちそのままですね。 これだと断られる確率が高いですよね。 ですが、コトバ次第で結果を変えることかができます。 「驚くほど旨いパスタの店が あるのだけど、行かない?」 こう言ってみました。相手は行っていいかも、<wbr>と思う確率がぐんと上がるコトバです。 どちらにしても、実は「デートしませんか?」<wbr>という同じ内容なのです。 同じ内容なのに、伝え方で結果が変わってしまう。 これは驚くべきことと思うかもしれません。 ですが、あなたは今までの人生で、「伝え方で変わるのでは?」<wbr>と、 うすうす気づいているのではないでしょうか。 伝え方にはシンプルな技術があります。 この本は、著者が膨大な時間とトライ&amp;<wbr>エラーで導き出した方法論を整理しました。 料理のレシピのように、<wbr>誰でもコトバをつくれるよう体系化してあります。 誰でも自分の日常から、<wbr>試行錯誤の上で伝え方の技術を身につけることもできますが、 それだと辿り着くまでに十数年かかってしまいます。<wbr>効率がよくありません。 この本は、<wbr>著者のように回り道をしなくても魅力的なコトバを最短でつくれる<wbr>よう構成してあります。',
            'created_at' => '2022-09-12 21:41:24',
            'updated_at' => '2022-09-12 21:41:24',
        ]);
        DB::table('books')->insert([
            'id' => '7',
            'api_id' => 'iETonAAACAAJ',
            'book_cover_url' => 'http://books.google.com/books/content?id=iETonAAACAAJ&printsec=frontcover&img=1&zoom=5&imgtk=AFLRE71eXWBoTUhxM253hJFnVpnJCrVoiZsucEC-J6398fMZhNHdPDyaljjLA3-uVZi9ukAwlPuMVWnajCgVTXfa7OUzpoURdaZgXqAlh41hN1VN-bK30niK3REBg7G22J20AJpgOapQ&source=gbs_api',
            'title' => '「すぐやる人」と「やれない人」の習慣',
            'author' => '塚本亮',
            'description' => '「難しく考えてしまい、結局動けない」「Aで行くか、Bで行くか悩んでしまう」など、優柔不断ですぐに行動に移せないことに悩む人は多い。そんな自分を責めて、自分のことが嫌いになる人もいます。そういう想いをとっぱらいいざという時に行動できる自分になるために、心理学的見地と実際に塚本様が大事にされている習慣をもとに説いていく。できない人と対比することにより、「自分はこの傾向があるから気をつけよう」と喚起を促すことができる。',
            'created_at' => '2022-09-12 21:46:29',
            'updated_at' => '2022-09-12 21:46:29',
        ]);
    }
}
