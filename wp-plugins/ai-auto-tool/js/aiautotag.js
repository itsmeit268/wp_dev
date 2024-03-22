jQuery(document).ready(function($) {
    $(document).on('click', '.custom-tag-create-desc', function(e) {
        e.preventDefault();
        showLoading();
        var tag_id = $(this).data('tag-id');
        $.ajax({
            url: customTagButtonAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'custom_tag_button_create_desc',
                tag_id: tag_id,
                
            },
            success: function(response) {
                hideLoading();
                if (response === 'success') {
                    alert('Tag description created successfully.');
                } else {
                    alert('Failed to create tag description.');
                }
            },
            error: function(xhr, status, error) {
                hideLoading();
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    // Tạo một button mới
    var suggestTagButton = document.createElement('button');
    suggestTagButton.innerHTML = '<i class="fa-solid fa-tag"></i> AI Suggest Tag';
    suggestTagButton.setAttribute('type', 'button');
    suggestTagButton.setAttribute('id', 'ai-suggest-tag-button');
    suggestTagButton.setAttribute('class', 'button');

    // Lấy phần tử có id 'new-tag-post_tag'
    var newTagInput = document.getElementById('new-tag-post_tag');

    // Chèn button vào sau phần tử 'new-tag-post_tag'
    newTagInput.parentNode.insertBefore(suggestTagButton, newTagInput.nextSibling);

    suggestTagButton.addEventListener('click', function() {
        // Lấy giá trị của trường tiêu đề
        var titleInput = document.getElementById('title');
        var titleValue = titleInput.value.trim(); // Xóa khoảng trắng ở đầu và cuối chuỗi

        // Kiểm tra xem tiêu đề có rỗng không
        if (titleValue === '') {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please enter the title of the post before suggesting tags.',
                    icon: 'error',
                    confirmButtonText: 'Close'
                });
            } else {
                alert('Please enter the title of the post before suggesting tags.');
            }
            return;
        } else {
           
            suggestTags();
        }
    });
});



function suggestTags() {
    // Lấy giá trị của trường tiêu đề
    var titleInput = document.getElementById('title');
    var lang = get_lang();
    var titleValue = titleInput.value.trim(); 

    var data = {
        'action': 'aiautotool_suggest_tag',
        'title': titleValue,
        'lang': lang,
        'security': ajax_object.security 
    };
    showLoading('AI create tag for: '+ titleInput.value);
    jQuery.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        data: data,
        beforeSend: function() {
            
        },
        success: function(response) {
            hideLoading();

            var tags = response.data.map(function(item) {
                return item.tag; 
            }).join(', ');

            jQuery('#new-tag-post_tag').val(tags);
            console.log(tags);
        },
        error: function(xhr, status, error) {
            
            hideLoading();

            alert('Error: ' + error);
        }
    });
}
