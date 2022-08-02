const searchUser = document.querySelector(".users .search input"),
  searchBtn = document.querySelector(".users .search button"),
  userList = document.querySelector(".users .user-list");

searchBtn.onclick = () => {
  searchUser.classList.toggle("active");
  searchUser.focus();
  searchBtn.classList.toggle("active");
  searchUser.value = "";
}

searchUser.onkeyup = () => {
  let searchTerm = searchUser.value
  if (searchTerm != "") {
    searchUser.classList.add("active")
  } else {
    searchUser.classList.remove("active")
  }
  // Ajax
  let xhr = new XMLHttpRequest(); //Membuat XML object
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        userList.innerHTML = data
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
  // Ajax
  let xhr = new XMLHttpRequest(); //Membuat XML object
  xhr.open("GET", "php/user.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchUser.classList.contains("active")) {
          userList.innerHTML = data;
        }
      }
    }
  }
  xhr.send();
}, 500)