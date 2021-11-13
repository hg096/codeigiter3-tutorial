<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>카톡 공유</title>

    <!-- 카카오톡 공유를 사용하려면 head부분에 필요 -->
    <script type="text/JavaScript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>

</head>

<body>

    <input type="button" onClick="shareKakaoCustom();" value="Custom" />
    <input type="button" onClick="shareKakaoDefault();" value="Default" />
    <input type="button" onClick="shareFacebook();" value="facebook" />


    <script type="text/javascript">
    function shareKakaoCustom() {
        var thisUrl = document.URL;

        Kakao.init("키넣는곳"); // 여기에 자바스크립트 키 넣기
        Kakao.Link.sendCustom({
            templateId: [templete_id] // 템플릿을 만들었다면 여기에 키 넣기
        });
    }
    </script>

    <script>
    var thisUrl = "http://lable.popomon.com/";
    document.URL;

    // 기본 공유 버전
    try {
        function shareKakaoDefault() {

            // 현재 url 받아오기
            var thisUrl = document.URL;

            Kakao.init('키넣는곳') // 여기에 자바스크립트 키 넣기
            Kakao.Link.sendDefault({
                objectType: 'feed',
                content: {
                    title: '타이틀 텍스트', // 공유할 때 보여지는 제목
                    description: '#설명 #텍스트', // 공유할 때 보여지는 설명
                    imageUrl: 'https://cdn.pixabay.com/photo/2021/10/25/14/45/apples-6741164_960_720.jpg', // 이미지 url 넣기
                    link: {
                        mobileWebUrl: thisUrl,
                        webUrl: thisUrl,
                    },
                },
                //  소셜 정보는 5개의 속성 중 최대 3개까지만 표시해 줍니다. 우선 순위는 Like > Comment > Shared > View > Subscriber 
                social: {
                    likeCount: 286,
                    commentCount: 45,
                    sharedCount: 845,
                },
                // 웹, 앱 url을 다르게 줄 수 있다
                buttons: [{
                        title: '웹으로 보기',
                        link: {
                            mobileWebUrl: thisUrl,
                            webUrl: thisUrl,
                        },
                    },
                    {
                        title: '앱으로 보기',
                        link: {
                            mobileWebUrl: thisUrl,
                            webUrl: thisUrl,
                        },
                    },
                ],
            })
        };
        window.kakaoDemoCallback && window.kakaoDemoCallback()
    } catch (e) {
        window.kakaoDemoException && window.kakaoDemoException(e)
    }


    // 페이스북 공유
    function shareFacebook() {
        var thisUrl = document.URL;
        let url = encodeURIComponent(thisUrl);
        let title = '공유될 url 타이틀';
        window.open(`http://www.facebook.com/sharer.php?u=${url}&t=${title}`, 'popup제목', 'width=400, height=400');
    }
    </script>

</body>

</html>