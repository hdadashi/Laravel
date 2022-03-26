const content = document.querySelectorAll("#content");

function cleanSections() {
    content.forEach(node => node.style.display = "none");
}

var initialContentVisible;

content.forEach(node => {
    node.style.display = "none";

    if (node.className === "pages") {
        initialContentVisible = node;
    }
});

initialContentVisible.style.display = "flex";

const showContent = (className) => {

    cleanSections();

    const main = document.querySelector(`.${className}`);

    main.style.display = "flex";
}

