//index
jQuery(function($) {

// first_view
  setTimeout(function(){
    $('.top_title').css('opacity', '1');
    $('.top_title').addClass('fadein');
  },800);
  setTimeout(function(){
    $('.top_text').css('opacity', '1');
    $('.top_text').addClass('fadein');
  },1500);

// company vition
  $('.vision_title').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('.vision_title').css('opacity', '1');
          $('.vision_title').addClass('fadein');
        },200);
    }
    if(isInView){
        setTimeout(function(){
          $('.vision_subtitle').css('opacity', '1');
          $('.vision_subtitle').addClass('fadein');
        },400);
    }
    if(isInView){
        setTimeout(function(){
          $('.vision_text').css('opacity', '1');
          $('.vision_text').addClass('fadein');
        },600);
    }
  });

// company service
  $('.service_title').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('.service_title').css('opacity', '1');
          $('.service_title').addClass('fadein');
        },200);
    }
    if(isInView){
        setTimeout(function(){
          $('.slider').css('opacity', '1');
          $('.slider').addClass('fadein');
        },400);
    }
  });
	
// members
	$('.members_title').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('.members_title').css('opacity', '1');
          $('.members_title').addClass('fadein');
        },200);
    }
  });
	
	$('.member').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('.m2').css('opacity', '1');
          $('.m2').addClass('fadein');
        },200);
		setTimeout(function(){
          $('.m3').css('opacity', '1');
          $('.m3').addClass('fadein');
        },350);
		setTimeout(function(){
          $('.m1').css('opacity', '1');
          $('.m1').addClass('fadein');
        },500);
    }
  });

// company information
  $('.company_title').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('.company_title').css('opacity', '1');
          $('.company_title').addClass('fadein');
        },200);
        setTimeout(function(){
          $('table').css('opacity', '1');
          $('table').addClass('fadein');
        },500);
    }
  });

// bg_switcher
  $('.bg_switcher').bgSwitcher({
        images: ['http://gude.jp/wp-content/uploads/2019/08/bg5.jpg',
				 'http://gude.jp/wp-content/uploads/2019/08/bg4.jpg',
				 'http://gude.jp/wp-content/uploads/2019/08/bg3.jpg',
				'http://gude.jp/wp-content/uploads/2019/08/bg1.jpg'], // 切替背景画像を指定
	interval: 5000, // 背景画像を切り替える間隔を指定 3000=3秒
        loop: true, // 切り替えを繰り返すか指定 true=繰り返す　false=繰り返さない
        shuffle: true, // 背景画像の順番をシャッフルするか指定 true=する　false=しない
        effect: "clip", // エフェクトの種類をfade,blind,clip,slide,drop,hideから指定
        duration: 500, // エフェクトの時間を指定します。
        easing: "swing" // エフェクトのイージングをlinear,swingから指定
    });

// slick
  　$('.slider').slick({
  　　autoplay:　false,
  　　prevArrow:'<div class="prev"><i class="fas fa-arrow-left"></i></div>',
  　　nextArrow:'<div class="next"><i class="fas fa-arrow-right"></i></div>'
  　});

	
// intern
	$('#intern1').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('#intern1').css('opacity', '1');
          $('#intern1').addClass('fadein');
        },200);
    }
  });
	$('#intern2').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('#intern2').css('opacity', '1');
          $('#intern2').addClass('fadein');
        },200);
    }
  });$('#intern3').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('#intern3').css('opacity', '1');
          $('#intern3').addClass('fadein');
        },200);
    }
  });
	$('#intern4').on('inview', function(event, isInView){
    if(isInView){
        setTimeout(function(){
          $('#intern4').css('opacity', '1');
          $('#intern4').addClass('fadein');
        },200);
    }
  });
});
