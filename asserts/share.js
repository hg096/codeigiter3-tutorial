
{/* 카카오톡 공유를 사용하려면 head부분에 필요 */ }
{/* <script type="text/JavaScript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script> */ }

// 카카오톡 커스텀 공유
function shareKakaoCustom(thisUrl) {
    // var thisUrl = document.URL;

    Kakao.init("키넣는곳"); // 여기에 자바스크립트 키 넣기
    Kakao.Link.sendCustom({
        templateId: [templete_id] // 템플릿을 만들었다면 여기에 키 넣기
    });
}

// 카카오톡 기본 공유 
try {
    function shareKakaoDefault(thisUrl, titles, account, images) {

        // 현재 url 받아오기
        //var thisUrl = document.URL;

        Kakao.init('ad6ac0e76ed142bb729974663576065f') // 여기에 자바스크립트 키 넣기
        Kakao.Link.sendDefault({
            objectType: 'feed',
            content: {
                title: titles, // 공유할 때 보여지는 제목
                description: account, // 공유할 때 보여지는 설명
                imageUrl: images, // 이미지 url 넣기
                link: {
                    mobileWebUrl: thisUrl,
                    webUrl: thisUrl,
                },
            },
            //  소셜 정보는 5개의 속성 중 최대 3개까지만 표시해 줍니다. 우선 순위는 Like > Comment > Shared > View > Subscriber 
            // social: {
            //     likeCount: 286,
            //     commentCount: 45,
            //     sharedCount: 845,
            // },
            // 웹, 앱 url을 다르게 줄 수 있다
            buttons: [{
                title: '웹으로 보기',
                link: {
                    mobileWebUrl: thisUrl,
                    webUrl: thisUrl,
                },
            },
                // {
                //     title: '앱으로 보기',
                //     link: {
                //         mobileWebUrl: thisUrl,
                //         webUrl: thisUrl,
                //     },
                // },
            ],
        })
    };
    window.kakaoDemoCallback && window.kakaoDemoCallback()
} catch (e) {
    window.kakaoDemoException && window.kakaoDemoException(e)
}

// 페이스북 공유
function shareFacebook(thisUrl, main, titles) {
    // var thisUrl = document.URL;
    let url = encodeURIComponent(thisUrl);
    let title = titles;
    window.open(`http://www.facebook.com/sharer.php?u=${url}&t=${title}`, main, 'width=400, height=400');
}

// 중요!!
// 지원되는 웹: 사파리
// 지원되는 모바일: 크롬, 오페라, 사파리, 삼성인터넷
// https://wormwlrm.github.io/2020/05/09/Web-Share-API.html
function webShare(thisUrl, titles, texts) {

    // 공유하고 url 설명
    var shareTitle = titles;
    var shareText = texts;


    // 공유할때 현재의 url 받아오기
    // var thisUrl = document.URL;

    if (navigator.share) {
        navigator.share({
            title: shareTitle,
            text: shareText,
            url: thisUrl,
        })
        // .then(() => console.log('Successful share'));
        // .catch((error) => console.log('Error sharing', error));
    } else {
        alert("공유를 지원하지 않는 환경입니다.");
    }
};