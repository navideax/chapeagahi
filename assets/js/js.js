// responsive menu
function dropdown() {
    $(".list-menu-album").slideToggle();
}
function resmenu() {
    document.getElementById("resmin").style.right = "0";

}
function resmenucl() {
    document.getElementById("resmin").style.right = "-500px";
}


// copy shoet link
function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    // document.getElementById("chmtn-1").innerHTML = "کپی شد";
    $('#toast').toast('show')
}

// scrool top
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function (event) {
        event.preventDefault();
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    })
});