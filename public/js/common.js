layui.use(['element' , 'form' , 'layedit' , 'util' , 'carousel'], function(){
    var element = layui.element
        , form = layui.form
        , layedit = layui.layedit
        , util = layui.util
        , $ = layui.jquery
        , carousel = layui.carousel;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    layedit.set({
        uploadImage: {
            url: '/post/imageUpload',
            type: 'post'
        }
    });
    layedit.build('L_content',{
        height: 300
    });

    util.fixbar({
        bar1: '&#xe642;'
        ,bgcolor: '#009688'
        ,click: function(type){
            if(type === 'bar1'){
                location.href = '/post/create';
            }
        }
    });

    carousel.render({
        elem: '#home_banner'
        , width: '100%'
        ,arrow: 'always'
    });
});