        $('#search-keyword').keypress( function ( e ) {
            // ここに処理を書く
            $(function(){
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                const keyword = $('[name="search-keyword"]').val();
                $.ajax({
                    type: "post", //HTTP通信の種類
                    url:'/book/search', //通信したいURL
                    dataType: 'json',
                     data: {
                        keyword: keyword,
                    },
                })
                //通信が成功したとき
                .done((res)=>{
                    console.log(res.message)
                })
                //通信が失敗したとき
                .fail((error)=>{
                    console.log(error.statusText)
                })
            });
            // スマホのキーボードを閉じる
            $("#search-keyword").blur();
            return false;
        })
