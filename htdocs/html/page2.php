<!DOCTYPE html>
<html>
<head>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- 부가적인 테마 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<meta charset="utf-8">
 <style>
* {
  box-sizing: border-box;
  -webkit-tap-highlight-color: rgba(255,255,255,0);
}
body {
  line-height: 1.5;
  font-family: "futura-pt", 'Century Gothic', 'Arial', sans-serif;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
  color: #fff;
  background: #1a1a1a;
}
a {
  text-decoration: none;
  color: inherit;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
.css-tab {
  will-change: transform;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1;
  background: #1a1a1a;
  -webkit-transform: translateY(-100%);
          transform: translateY(-100%);
  -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
}
.css-tab--active {
  -webkit-transform: translateY(0);
          transform: translateY(0);
}
.css-tab__list {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
}
.css-tab__item {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
  position: relative;
  -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
}
.css-tab__item:hover {
  opacity: 0.75;
}
.css-tab__thumb {
  display: block;
  height: 80px;
  background: #dc143c;
  -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
}
.css-tab__thumb:before {
  content: attr(data-letter);
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 70px;
  text-transform: uppercase;
  opacity: 0;
}
.css-tab__label {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  text-transform: uppercase;
  letter-spacing: 2px;
  color: #e6e6e6;
  margin: 0;
  font-size:20px;
}
@media (max-width: 850px) {
  .css-tab__label {
    font-size: 14px;
    font-weight:bold;
  }
}
@media (max-width: 720px) {
  .css-tab__label {
    display: none;
  }
  .css-tab__thumb {
    height: 60px;
  }
  .css-tab__thumb:before {
    font-size: 24px;
    opacity: 0.7;
  }
}
.tab-content {
  height: 100vh;
  will-change: transform;
  -webkit-perspective: 400px;
          perspective: 400px;
  overflow: hidden;
  -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
}
.section {
  will-change: transform;
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
  height: 100vh;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
  text-align: center;
  background: #fff;
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
  -webkit-transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
}
.section--hidden {
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
}
.section--active {
  -webkit-transform: translateX(0) rotateY(0);
          transform: translateX(0) rotateY(0);
  z-index: 2;
}
.section__wrapper {
  position:absolute;
  width: 100%;
  max-width: 85%; 
  padding: 0;
  margin-top:6%;
  top:0px;
}
.section__title {
  margin: 0 0 25px 0;
  font-size: 48px;
  font-weight: normal;
  text-transform: uppercase;
  letter-spacing: 5px;
}
.section__title:before {
  content: '';
  position: absolute;
  top: 5rem;
  left: 45%;
  margin: auto;
  width: 10%;
  height: 2px;
  background: #fff;
}
@media (max-width: 720px) {
  .section__title {
    font-size: 28px;
  }
  .section__title:before {
    top: 3.25rem;
  }
}
.section p {
  margin: 0 0 25px 0;
  font-family: 'Georgia';
  font-size: 18px;
  color: #fff;
  opacity: 0.55;
}
@media (max-width: 720px) {
  .section p {
    font-size: 16px;
  }
}
.section p:last-child {
  margin-bottom: 0;
}
.css-tab__thumb.color1{
  background:rgb(108, 103, 103);
}
.css-tab__thumb.color3{
  background:rgb(129, 119, 119);
}
.css-tab__thumb.color4{
  background:rgb(139, 129, 129);
}
.css-tab__thumb.color5{
  background:rgb(149, 139, 139);
}
.css-tab__thumb.color6{
  background:rgb(159, 149, 149);
}
.color1 {
  background: #e1e3e4;
  color: #000000;
}
.color3 {
  background: #e1e3e4;
  color: #000000;
}
.color4 {
  background: #e1e3e4;
  color: #000000;
}
.color5 {
  background: #e1e3e4;
  color: #000000;
}
.color6 {
  background: #e1e3e4;
  color: #000000;
}
@media (max-width: 720px) {
  .logo {
    top: 110px;
    right: 50%;
    margin-right: -20px;
  }
}
#target tr th{
  text-align:center;
}
 </style>



</head>
<body>

<nav class="css-tab css-tab--active">
  <ul class="css-tab__list">
    <li class="css-tab__item">
      <a href="" class="css-tab__link">
        <div class="css-tab__thumb color1" data-letter="H"></div>
        <p class="css-tab__label">상점</p>
      </a>
    <li class="css-tab__item">
      <a href="" class="css-tab__link">
        <div class="css-tab__thumb color3" data-letter="J"></div>       
        <p class="css-tab__label">벌점1</p>
      </a>
    </li>
    <li class="css-tab__item">
      <a href="" class="css-tab__link">
        <div class="css-tab__thumb color4" data-letter="H"></div>
        <p class="css-tab__label">벌점2</p>
      </a>
    </li>
    <li class="css-tab__item">
      <a href="" class="css-tab__link">
        <div class="css-tab__thumb color5" data-letter="B"></div>
        <p class="css-tab__label">벌점3</p>
      </a>
    </li>
    <li class="css-tab__item">
      <a href="" class="css-tab__link">
        <div class="css-tab__thumb color6" data-letter="P"></div>
        <p class="css-tab__label">퇴사</p>
      </a>
    </li>
  </ul>
</nav>
<div class="tab-content">
  <section class="section section--active color1" data-letter="a" style="overflow:scroll; width:1558px; overflow-x:hidden;">
    <article class="section__wrapper">
    <table class="table table-striped" id = "target">                    
    </table>
    </article>
  </section>
  <section class="section color3" data-letter="q" style="overflow:scroll; width:1558px; overflow-x:hidden;">
    <article class="section__wrapper">
    <table class="table table-striped"id = "target">                    
    </table>
    </article>
  </section>
  <section class="section color4" data-letter="e" style="overflow:scroll; width:1558px; overflow-x:hidden;">
    <article class="section__wrapper">
    <table class="table table-striped" id = "target">                   
    </table>
    </article>
  </section>
  <section class="section color5" data-letter="s">
    <article class="section__wrapper">
    <table class="table table-striped" id = "target">                     
    </table>
    </article>
  </section>
  <section class="section color6" style="overflow:scroll; width:1558px; overflow-x:hidden;">
    <article class="section__wrapper">
    <table class="table table-striped" id = "target">                 
    </table>
    </article>
  </section>
</div>
<script>
  $(function(){
    $(".section.color1 table").load("/txt/bonus.txt");
    $(".css-tab__thumb.color1").click(function(){
      $(".section.color1 table").load("/txt/bonus.txt");
    });
    $(".css-tab__thumb.color3").click(function(){
      $(".section.color3 table").load("/txt/black2.txt");
    });
    $(".css-tab__thumb.color4").click(function(){
      $(".section.color4 table").load("/txt/black3.txt");
    });
    $(".css-tab__thumb.color5").click(function(){
      $(".section.color5 table").load("/txt/black4.txt");
    });
    $(".css-tab__thumb.color6").click(function(){
      $(".section.color6 table").load("/txt/out.txt");
    });
  });
var Nav = (function() {
  
  var
  	nav 		= $('.css-tab'),
    section = $('.section'),
    link		= nav.find('.css-tab__link'),
    navH		= nav.innerHeight(),
    isOpen 	= true,
    hasT 		= false;
  
  var toggleNav = function() {
    nav.toggleClass('css-tab--active');
    shiftPage();
  };
  
  
  var switchPage = function(e) {
    var self = $(this);
    var i = self.parents('.css-tab__item').index();
    var s = section.eq(i);
    var a = $('section.section--active');
    var t = $(e.target);
    
    if (!hasT) {
      if (i == a.index()) {
        return false;
      }
      a
      .addClass('section--hidden')
      .removeClass('section--active');

      s.addClass('section--active');

      hasT = true;

      a.on('transitionend webkitTransitionend', function() {
        $(this).removeClass('section--hidden');
        hasT = false;
        a.off('transitionend webkitTransitionend');
      });
    }

    return false;
  };
  
  var keyNav = function(e) {
    var a = $('section.section--active');
    var aNext = a.next();
    var aPrev = a.prev();
    var i = a.index();
    
    
    if (!hasT) {
      if (e.keyCode === 37) {
      
        if (aPrev.length === 0) {
          aPrev = section.last();
        }

        hasT = true;

        aPrev.addClass('section--active');
        a
          .addClass('section--hidden')
          .removeClass('section--active');

        a.on('transitionend webkitTransitionend', function() {
          a.removeClass('section--hidden');
          hasT = false;
          a.off('transitionend webkitTransitionend');
        });

      } else if (e.keyCode === 39) {

        if (aNext.length === 0) {
          aNext = section.eq(0)
        } 


        aNext.addClass('section--active');
        a
          .addClass('section--hidden')
          .removeClass('section--active');

        hasT = true;

        aNext.on('transitionend webkitTransitionend', function() {
          a.removeClass('section--hidden');
          hasT = false;
          aNext.off('transitionend webkitTransitionend');
        });

      } else {
        return
      }
    }  
  };
    
  var bindActions = function() {
    link.on('click', switchPage);
    $(document).on('ready', function() {
       page.css({
        'transform': 'translateY(' + navH + 'px)',
         '-webkit-transform': 'translateY(' + navH + 'px)'
      });
    });
    $('body').on('keydown', keyNav);
  };
  
  var init = function() {
    bindActions();
  };
  
  return {
    init: init
  };
  
}());

Nav.init();
</script>

</body>
</html>
