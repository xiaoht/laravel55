layui.use(['element' , 'form' , 'layedit'], function(){
    var element = layui.element,
        form = layui.form,
        layedit = layui.layedit,
        $ = layui.jquery;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    layedit.set({
        uploadImage: {
            url: '/posts/imageUpload',
            type: 'post'
        }
    });
    layedit.build('L_content',{
    });
});