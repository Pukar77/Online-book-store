let orderBtn = document.querySelectorAll(".btn-success");
let dialogBox = document.querySelector("#bookInfo");
let closeBtn = document.querySelector(".wrong_btn");
let cancel_btn = document.querySelector(".c_btn");
let back = document.querySelector(".goback");

let container = document.querySelector(".container");

orderBtn.forEach((btn) => {
  btn.addEventListener("click", function (e) {
    e.preventDefault();
    container.innerHTML = "";
    let bookID = btn.getAttribute("data-id");
    fetch("getBookData.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "id=" + encodeURIComponent(bookID),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data[0]); //just to check
        console.log(data[2]);

        let setData = {
          "booktitle":data[0],
          "totalprice":data[2]
        }

        localStorage.setItem("setData",JSON.stringify(setData));

        let modal_img = document.createElement("img");
        modal_img.classList.add("img1");
        modal_img.src = data[3];

        let modal_title = document.createElement("h1");
        modal_title.classList.add("mtitle");
        modal_title.innerHTML = data[0];

        let modal_author = document.createElement("h4");
        modal_author.classList.add("m_author");
        modal_author.innerHTML = data[1];

        let modal_price = document.createElement("h4");
        modal_price.classList.add("m_price");
        modal_price.innerHTML = "RS " + data[2];

        let modal_btn = document.createElement("button");
        modal_btn.classList.add("m_btn");
        modal_btn.innerHTML = "Confirm order";

        container.appendChild(modal_img);
        container.appendChild(modal_title);
        container.appendChild(modal_author);
        container.appendChild(modal_price);
        container.appendChild(modal_btn);
        container.appendChild(cancel_btn);

        modal_btn.addEventListener("click", function () {
          window.location.href = "confirmorder.php";
        });
      });

    dialogBox.showModal();
  });
});

closeBtn.addEventListener("click", function () {
  dialogBox.close();

  // container.removeChild("img", "");
});

cancel_btn.addEventListener("click", function () {
  dialogBox.close();
});
