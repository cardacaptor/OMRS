
const rightdiv = document.querySelector(".rightbox");
const signUpdiv = document.querySelector(".sign-up-box");
function myMove() {
    const mydiv = document.getElementById("leftBox");
    let originalContent = mydiv.innerHTML;
    fetch("signup.php").then(response => response.text()).then(data => {
        mydiv.innerHTML = data;
        rightdiv.style.opacity = "0";
        const backButton = document.getElementById("backButton");
        backButton.addEventListener("click", () => {
            mydiv.innerHTML = originalContent;
            // mydiv.style.transform = "translate(0%, 0%)";
            rightdiv.style.opacity = "1";
            // const childClasses = mydiv.querySelectorAll("*");
            // childClasses.forEach(childClasses => {
            //     childClasses.style.position = "relative";
            //     childClasses.style.top = "20px";
            // });
            // const welcome1 = mydiv.querySelector(".welcome1");
            // welcome1.style.top = "43px";
        });
    }).catch(error => {
        console.error("Error fetching php file: ", error);
    });
}


