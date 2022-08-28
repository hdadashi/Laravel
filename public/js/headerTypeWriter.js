var subtitleContent = ["به سایت ما خوش آمدید"];
var position = 0; 

const speed = 80;

const typewriter = () => {
    document.querySelector("#header-subtitle").innerHTML = subtitleContent[0].substring(0, position);
    
    if (position++ != subtitleContent[0].length)
        setTimeout(typewriter, speed);
}

window.addEventListener("load", typewriter);
