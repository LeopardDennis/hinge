<?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/waterfall.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/waterfall.site.css');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/waterfall.min.js', CClientScript::POS_HEAD);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/handlebars.js', CClientScript::POS_HEAD);
?>

<div id="header">
    <h1>Waterfall</h1>
</div>
<div id="container"></div>

<script type="text/x-handlebars-template" id="waterfall-tpl">
{{#result}}
    <div class="item">
        <img src="{{image}}" width="{{width}}" height="{{height}}" />
    </div>
{{/result}}
</script>
<script>
$('#container').waterfall({
    itemCls: 'item',
    colWidth: 222,
    gutterWidth: 15,
    gutterHeight: 15,
    checkImagesLoaded: false,
    isAnimated: true,
    animationOptions: {
    },
    path: function(page) {
        return baseUrl+'/data/data1.json?page=' + page;
    }
});
</script>
<script type="text/javascript">
$(function(){
	animationArr = ['bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'swing', 'tada', 'wobble', 'bounceIn', 'bounceInDown', 'bounceInLeft', 
					'bounceInRight', 'bounceInUp', 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'fadeIn', 
					'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInRight', 'fadeInUp', 'fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 
					'fadeOutRight', 'fadeOutUp', 'flip', 'flipInX', 'flipInY', 'flipOutX', 'flipOutY', 'lightSpeedIn', 'lightSpeedOut', 'rotateIn', 
					'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 
					'rotateOutUpLeft', 'rotateOutUpRight', 'hinge', 'rollIn', 'rollOut', 'zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp', 
					'zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp'];
	
	$('body').addClass('animated zoomInDown');
    $('#container').on('click', '.item', function(){
		var pointer = Math.floor((Math.random() * 60));
		var currentClass = animationArr[pointer];
        $(this).addClass('animated cover_it ' + currentClass);
        $(this).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass('animated cover_it ' + currentClass);
        });
    })
});
</script>