const parentMenu = document.querySelectorAll(".ac__body > li > a");
// 親メニューのlistタグとaタグをまとめて取得
for (let i = 0; i < parentMenu.length; i++) {
  parentMenu[i].addEventListener("click", function (e) {
    e.preventDefault();
    this.nextElementSibling.classList.toggle("active");
  })
}
