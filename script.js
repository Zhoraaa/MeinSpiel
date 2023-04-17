function hideSwitcher(elemID) {
    let elem = document.querySelector("#"+ `${elemID}`);
    if (elem.classList.contains("hide")) {
        elem.classList.remove("hide")
    } else {
        elem.classList.add("hide")
    }
}