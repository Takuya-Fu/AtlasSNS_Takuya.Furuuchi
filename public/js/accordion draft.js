// テスト用→OK
// alert("Hello World");
// console.log("Hello World");

// 以下コード
const qa = document.querySelectorAll(".js-ac");
// 「js-ac」要素を格納する。
function acToggle() {
  // クリック時に動作する関数を作成。
  const content = this.nextElementSibling;
  // 「js-ac」要素の次の要素を取得して格納する。
  content.classList.toggle("is-open");
  // 次のクラス名（is-open）があれば追加、無ければ除去する。
  const qa = this;
  // js-ac要素自身を変数に格納。↑これを入れないと矢印が反転しない
  qa.classList.toggle("is-open");
  // 定数（qa）に次のクラス名（is-open）があれば追加、無ければ除去する。
}
for (let i = 0; i < qa.length; i++) {
  qa[i].addEventListener("click", acToggle);
  // クリックイベントを登録、acToggle関数を発火する
}

// 以下自分で記述
const open = document.querySelectorAll(".ac__head");
// ボタン部分
function acToggle() {
  const contents = this.nextElementSibling;
  contents.classList.toggle("ac-open");
  const open = this;
  open.classList.toggle("ac-open");
}
