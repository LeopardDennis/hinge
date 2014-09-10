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
    $('#container').on('click', '.item', function(){
        $(this).addClass('animated hinge cover_it');
        $(this).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).remove();
        });
    })
});
</script>