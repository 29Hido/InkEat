var btn = document.getElementById("test")
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
        btn.style.opacity = 1;
        btn.style.visibility = "initial";
    } else {
        btn.style.opacity = 0;
        btn.style.visibility = "hidden";
    }
} 

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}