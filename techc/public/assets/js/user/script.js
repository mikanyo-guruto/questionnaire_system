$(function () {
	$(document).ready(function() {
		$('.drawer').drawer();
	});
});


$(function(){
  var $jsTabs = $('.js-tabs');
  var $jsTabsLi = $('.js-tabs li');
  var tabsLiLen = $jsTabsLi.length;
  var tabsLiWid = $jsTabsLi.eq(0).width();
  //タブエリアの横幅指定
  $jsTabs.css('width',tabsLiWid * tabsLiLen);
});

$(function(){
  var ACTIVE_SELECTOR = '.nav-tabs > .active';

  var $jsTabs = $('.js-tabs');
  var $jsTabsLi = $('.js-tabs li');

  var $jsSwipe = $('.js-swipe');
  var $scrollContainer = $('.nav-tabs-outer');

  var tabsLiLen = $jsTabsLi.length;
  var tabsLiWid = $jsTabsLi.eq(0).width();
});

//   //タブエリアの横幅指定
//   $jsTabs.css('width',tabsLiWid * tabsLiLen);
//
//   //スワイプイベント登録
//   $jsSwipe.hammer().on('swipeleft',next);  //--------C
//   $jsSwipe.hammer().on('swiperight',prev);
//
//   function next() {
//     tabManager($(ACTIVE_SELECTOR).next('li'));
//   }
//   function prev() {
//     tabManager($(ACTIVE_SELECTOR).prev('li'));
//   }                                        //--------C
//
//   // 指定されたタブをカレントし要素にスクロールする
//   function tabManager($nextTarget){
//     $nextTarget.find('a').trigger('click');  //--------D
//
//     if($nextTarget.index() != -1){
//       $scrollContainer.scrollLeft($nextTarget.index() * tabsLiWid);  //--------E
//
//     }
//   }
//
// });
