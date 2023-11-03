// 【テスト用】
// alert('Hello');

// アコーディオンメニュー作成↓
// https://coco-factory.jp/ugokuweb/move01/9-2-1/
// 【動作したい内容を日本語で台本化】
// アコーディオンメニューの矢印をクリックしたときに
// メニュー内容（3項目）を表示する

// 【非表示→表示】
// ac__body部分は「非表示」のため、表示したい。
// ac__button:after部分をクリックしたときに
// ac__bodyとbody_inner部分を「表示」されている状態にする

// 【表示→非表示】
// ac__bodyとbody_inner部分が「表示」されているときに
// ac__button:after部分をクリックすると
// ac__body部分を「非表示」されている状態にする

// クローズ
$('.ac__button').on('click',function(){
  let openAc =$(this).next(".ac__body");
$(openAc).slideToggle();

if($(this).hasClass('close')){
  $(this).removeClass('close');
}else{
  $(this).addClass('close');
}
});

// オープン
$(window).on('load',function(){
$('.ac__buttoon .ac__body').addClass("open"){
$("open").each(function(){
  // ここから再開する
})
}
})