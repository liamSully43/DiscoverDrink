const checkboxes = document.querySelectorAll("input[type=checkbox]");

checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", () => {
        toggleLabel(checkbox);
    })
});

function toggleLabel(checkbox) {
    const tag = checkbox.id;
    if(checkbox.checked) {
        document.querySelector(`.${tag}`).classList.add("active");
    }
    else {
        document.querySelector(`.${tag}`).classList.remove("active");
    }
}