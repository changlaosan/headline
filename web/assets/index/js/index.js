// 刷新按钮
let refresh = document.querySelector(".head-title span");
refresh.addEventListener("click", ()=>{
	refresh.style.transform="rotate(360deg)";
    $('.recommend').css('display','block');
	$('.recommend').css('background-color','rgb(209,238,238,0.8)');
    setTimeout(()=>{
        $('.recommend').css('display','none');
        location.reload();
        $('.recommend').css('background-color','rgb(209,238,238,0)');
	},1000)
})

// 透明窗口
$(function () {
	$('#interest').on('click',function () {
		$('.windows').css('display','block');
		$('.popup').css('display','block');
    });
	$('.popup-open').on('click',function () {
        $(this).parent().css('display','none');
        $('.windows').css('display','none');
    });
	$('.popup-close').on('click',function () {
        $(this).parent().css('display','none');
        $('.windows').css('display','none');
    })
});
