function fileUploader($ul){

    $ul.find(".drop-zone").click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $ul.parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $ul.parent().fileupload({
        // This element will accept file drag/drop uploading
        dropZone: $ul.find('.drop-zone'),
        // Expect JSON returned from server
        datatype: 'json',

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
            $ul.parent().find('input')
            var tpl = $('<li class="working"><img src="'+URL.createObjectURL(data.files[0])+'"/></li>');

            // Append the file name and file size
            // tpl.find('p').text(data.files[0].name)
            //              .append('<i>' + formatFileSize(data.files[0].size) + '</i>');

            // Add the HTML to the UL element
            data.context = tpl.appendTo($ul);

            // Listen for cancel clicks
            // tpl.find('span').click(function(){
            //     if(tpl.hasClass('working')){
            //         jqXHR.abort();
            //     }
            //     tpl.fadeOut(function(){
            //         tpl.remove();
            //     });
            // });

            // Automatically upload the file once it is added to the queue
            // Server response is handled here
            var jqXHR = data.submit()
                // This means server has returned response text. e.g. textStatus=200 (ok)
                .success(function (result, textStatus, jqXHR) {
                    var $res = $.parseJSON(result);
                    if ($res.status=='success') {
                        // Server has received and accepted the file
                    } else {
                        // Server rejected the file or process was aborted.
                        data.context.addClass('error');
                    }
                })
                // This means something went wrong on server. e.g. textStatus=500 (internal error)
                .error(function (jqXHR, textStatus, errorThrown) {
                    data.context.addClass('error');
                });
        },
        // The following two regard HTTP call only (client side)
        progress: function(e, data){

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            data.context.find('input').val(progress);
            // Code for style update temperarily removed

            if(progress == 100){
                data.context.removeClass('working');
            }
        },
        fail:function(e, data){
            data.context.addClass('error');
        }
    });
}

// Prevent the default action when a file is dropped on the window
$(document).on('drop dragover', function (e) {
    e.preventDefault();
});

// Helper function that formats the file sizes
function formatFileSize(bytes) {
    if (typeof bytes !== 'number') {
        return '';
    }
    if (bytes >= 1000000000) {
        return (bytes / 1000000000).toFixed(2) + ' GB';
    }
    if (bytes >= 1000000) {
        return (bytes / 1000000).toFixed(2) + ' MB';
    }
    return (bytes / 1000).toFixed(2) + ' KB';
}

// http://stackoverflow.com/questions/6848043/how-do-i-detect-a-file-is-being-dragged-rather-than-a-draggable-element-on-my-pa
// Highlights the drag area when file is dragged in.
var dragTimer;
function bindDragHighlight($li) {
    $li.on('dragover', function(e) {
        var dt = e.originalEvent.dataTransfer;
        if (dt.types && (dt.types.indexOf ? dt.types.indexOf('Files') != -1 : dt.types.contains('Files'))) {
            clearTimeout(dragTimer);
            $li.addClass('drag-highlight');
        }
    });
    $li.on('dragleave', function(e) {
        clearTimeout(dragTimer);
        dragTimer = setTimeout(function() { $li.removeClass('drag-highlight'); }, 25);
    });
    $li.on('drop', function(e) {
        $li.removeClass('drag-highlight');
    });
}