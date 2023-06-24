function SUSISwitcher(elemID, thisID) {
  let elem = document.getElementById(`${elemID}`);

  let thisElement = document.getElementById(thisID);
  let thisForm = thisElement.parentElement;

  if (elem.classList.contains("hide")) {
    elem.classList.remove("hide");
    thisForm.classList.add("hide");
  } else {
    elem.classList.add("hide");
    thisForm.classList.remove("hide");
  }
}