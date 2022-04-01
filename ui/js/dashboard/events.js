const sidebarContent = document.querySelectorAll("#content");

const cleanSections = (element) => element.forEach(node => node.style.display = "none");

var initialSidebarContentVisible;

sidebarContent.forEach(node => {
    node.style.display = "none";

    if (node.className === "pages") {
        initialSidebarContentVisible = node;
    }
});

initialSidebarContentVisible.style.display = "flex";

function showSidebarContent(className) {

    cleanSections(sidebarContent);

    const main = document.querySelector(`.${className}`);

    main.style.display = "flex";
}

// ----- Pages

const pagesOption = document.querySelectorAll(".page_option");
const pagesOptionUpdate = document.querySelectorAll(".page_option--update");

cleanSections(pagesOption);
cleanSections(pagesOptionUpdate);

function displayPageOptions(id) {
    const selectedPageOption = document.querySelector(`#option-${id}`); 

    cleanSections(pagesOption);
    cleanSections(pagesOptionUpdate);
    
    selectedPageOption.style.display = "flex"; 

    pagesOptionUpdate.forEach(node => node.style.display = "flex");
}

