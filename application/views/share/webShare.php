<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Web Share API</title>

</head>

<body>


    <input type="button" onClick="webShare();" value="btnShare" />


    <script>
    // 중요!!
    // 지원되는 웹: 사파리
    // 지원되는 모바일: 크롬, 오페라, 사파리, 삼성인터넷
    function webShare() {

        // 공유하고 url 설명
        var shareTitle = "공유하기 기능 테스트";
        var shareText = '공유하기 기능 입니다.';


        // 공유할때 현재의 url 받아오기
        var thisUrl = document.URL;

        if (navigator.share) {
            navigator.share({
                    title: shareTitle,
                    text: shareText,
                    url: thisUrl,
                })
                .then(() => console.log('Successful share'))
                .catch((error) => console.log('Error sharing', error));
        } else {
            alert("공유를 지원하지 않는 환경입니다.");
        }
    };
    </script>

</body>

</html>