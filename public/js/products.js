// Function Click Drop
function toggleButtons() {
    let buttonsElement = document.getElementById("buttons");
    buttonsElement.classList.toggle("select-products"); // Add or delete class "select-products"

    // let buttonMenu = document.getElementById("menu-drop");
    // if(buttonMenu){
    //     buttonMenu.classList.add("menu-active");
    // }else{
    //     buttonMenu.classList.remove("menu-active");
    // }

    // if (buttonsDiv.style.display === "none") {
    //     buttonsDiv.style.display = "flex";
    // } else {
    //     buttonsDiv.style.display = "none";
    // }
}



// Function Click Button -> Active
function filterProduct(value){
    let buttons = document.querySelectorAll(".button-value");
    buttons.forEach((button) => {
        if(value.toUpperCase() == button.innerText.toUpperCase()){
            button.classList.add("active");
        }else{
            button.classList.remove("active");
        }
    })
}