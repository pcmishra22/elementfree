$(function(){

    $("html, body").animate({
        scrollTop: 0
    }, 100);

    function startIntro(){
        var intro = introJs();
        intro.setOptions({
            showBullets : true,
            exitOnEsc : true,
            steps: [
                {
                    element: '#sidebar', position: "right",
                    intro: "Use this menu to navigate through your categories."
                },{
                    element: '#panel-plan', position: "bottom",
                    intro: "This panel shows your plan, plan status, and how many more documents you can add."
                },{
                    element: '#panel-devices', position: "bottom",
                    intro: "This panel shows you how many devices, accounts and invitations you have."
                },{
                    element: '#panel-docstats', position: "bottom",
                    intro: "Here you can see your documents statistics compared to last week."
                },{
                    element: '#panel-account', position: "bottom",
                    intro: "This panel shows your account status, autosync status, and how many files were synced automatically."
                }
            ]
        });

        var myCookie = getCookie("introElementFree");
        if ( myCookie == null ) {
            intro.start();
            intro.oncomplete(function() {
                createCookieIntro();
            });
            intro.onexit(function() {
                createCookieIntro();
            });
        }

        $("html, body").scrollTop(0);
    }

    startIntro();

    /* Replay Intro on Button click */
    $('#start-intro').click(function () {
        startIntro();
    });
});

function createCookieIntro() {
    var daysexpires = 30;
    var date = new Date();
    date.setTime( date.getTime() + (24*60*60*1000*daysexpires) );
    document.cookie = "introElementFree=true;expires=" + date.toUTCString() + ";path=/";
}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);

    if ( begin == -1 ) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    } else {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
    }

    return decodeURI(dc.substring(begin + prefix.length, end));
} 