jQuery(document).ready( function( $ ) {
    $('.datepicker').datepicker({
    	minDate: new Date(2015, 1 - 1, 1),
        dateFormat: uploader_args.date_format
    });
    $('#investor_relations_documents_list').sortable();
    $('.upload_file_button').click(function() {
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });
    $('.upload_file_remove').on('click', function(a){
        a.preventDefault();
         console.log($(this).closest('div'));
        $(this).closest('div').remove();

    });
    // window.send_to_editor = function(link) {
    //     var fileUrl = $(link).attr('href').replace(uploader_args.site_url, '');
    //     var filePath = fileUrl.split('/');
    //     var count = filePath.length - 1;
    //     var fileName = filePath[count];
    //     var fileTypes = fileName.split('.');
    //     var ftCount = fileTypes.length - 1;
    //     var fileType = fileTypes[ftCount];
    //     if(uploader_args.allowed_exts.indexOf(fileType) == -1){
    //         alert('Unallowed file type.');
    //         return false;
    //     }
    //     else{
    //         var html = '<div class ="ui-state-default ui-sortable-handle"><input type="hidden" name="investor_relations_documents[]" value="'+fileUrl+'" /><img src="'+uploader_args.template_path+ '/images/pdficon_large.png" height="20" width="20" />'+fileName+'&nbsp;<a href="#" class="upload_file_remove">Remove</a></div>';
    //         $('#investor_relations_documents_list').append(html);
    //         $('#investor_relations_documents_list').children().last().find('.upload_file_remove').on('click', function(a){
    //             a.preventDefault();
    //             $(this).closest('div').remove();
    //         });

    //         tb_remove();

    //     }

    // }

});