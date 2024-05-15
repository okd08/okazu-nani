//// アコーディオンの設定 /////
$(document).ready(function() {
  $('.box').hide(); // アコーディオンの全体を非表示にする
});
//アコーディオンをクリックした時の動作
$('.title').on('click', function() {//タイトル要素をクリックしたら
  var findElm = $(this).next(".box");//直後のアコーディオンを行うエリアを取得し
  $(findElm).slideToggle();//アコーディオンの上下動作
    
  if($(this).hasClass('close')){//タイトル要素にクラス名closeがあれば
    $(this).removeClass('close');//クラス名を除去し
  }else{//それ以外は
    $(this).addClass('close');//クラス名closeを付与
  }
});
$(document).ready(function() {
  $('.selectable-item').on('click', function() {
      $('.selected').removeClass('selected'); // すでに選択された要素から'selected'クラスを削除
      $(this).addClass('selected'); // クリックされたボタンに'selected'クラスを追加
  });
});

///// スライダーの設定 /////
$('.slider').slick({
  autoplay: false,//自動的に動き出すか。初期値はfalse。
  infinite: true,//スライドをループさせるかどうか。初期値はtrue。
  slidesToShow: 3,//スライドを画面に3枚見せる
  slidesToScroll: 3,//1回のスクロールで3枚の写真を移動して見せる
  prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
  nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
  dots: false,//下部ドットナビゲーションの表示
});