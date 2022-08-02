const form = document.querySelector(".signup form"),
  submitBtn = form.querySelector(".button input"),
  errorText = form.querySelector(".error-txt");

form.onsubmit = (i) => {
  i.preventDefault();
}

submitBtn.onclick = () => {
  // Ajax
  let xhr = new XMLHttpRequest(); //Membuat XML object
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "sukses") {
          location.href = "user.php";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}