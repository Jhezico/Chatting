const form = document.querySelector(".area-ketikan"),
  inputField = form.querySelector(".input-field"),
  sendBtn = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
}

sendBtn.onclick = () => {
  // Ajax
  let xhr = new XMLHttpRequest(); //Membuat XML object
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = "";
        scrollKeBawah();
      }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
}

setInterval(() => {
  // Ajax
  let xhr = new XMLHttpRequest(); //Membuat XML object
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollKeBawah();
        }
      }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}, 500)

function scrollKeBawah() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
