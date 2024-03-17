document.querySelectorAll(".nav-tab").forEach(tab => {
    tab.addEventListener("click", function() {
        // Lưu trạng thái tab đã chọn vào localStorage
        localStorage.setItem("selectedTab", this.getAttribute("href"));
    });
});
let isStartSocket = 0;
let statussocket = false;
var socket = io("https://bard.aiautotool.com");
const languageCodes = ajax_object.languageCodes;

let langcheck = ajax_object.langcodedefault;
let hostname = getCurrentDomain();

var post = [];
let indexnow = 0;
let istrue = true;
let question = '';

var divids = 'outbard';
const url = 'https://bard.aitoolseo.com';

function fttab(evt, tabname) {
  var i, x, sotab;
  x = document.getElementsByClassName("ftbox");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  sotab = document.getElementsByClassName("sotab");
  for (i = 0; i < x.length; i++) {
    sotab[i].className = sotab[i].className.replace(" sotab-select", "");
  }
  document.getElementById(tabname).style.display = "block";
  evt.currentTarget.className += " sotab-select";
  localStorage.setItem('selectedRank', tabname);
}
class ContentOb {
                    constructor(url, question, lang) {
                        this.url = url;
                        this.question = question;
                        this.lang = lang;
                        this.outline = [];
                        this.listhead = [];
                    }

                    async createOutline() {
                        try {
                            const response = await fetch(this.url + '/genoutline', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({ question: this.question, lang: this.lang }),
                            });

                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }

                            const responseData = await response.json();

                            if (responseData.result) {
                                this.outline = JSON.parse(responseData.result);
                                isStartSocket = 1;
                                jQuery(".loadingprocess").addClass("d-none");
                                for (const key in this.outline) {
                                    if (this.outline.hasOwnProperty(key)) {
                                        var headertitle = this.outline[key];
                                        this.listhead.push(headertitle);
                                        var item = {
                                            key: key,
                                            h2: headertitle,
                                            desc: '',
                                            stext: ''
                                        };
                                        post.push(item);
                                    }
                                }
                                if (!Array.isArray(this.listhead)) {
                                    throw new Error('Invalid response data format: outline is not an array');
                                }
                            } else {
                                throw new Error('Invalid response data format');
                            }
                        } catch (error) {
                            console.error('Error creating outline:', error.message);
                        }
                    }
                }
function getCurrentDomain() {
    // Lấy đối tượng URL của trang hiện tại
    var currentUrl = new URL(window.location.href);

    // Lấy phần hostname từ URL
    var currentDomain = currentUrl.hostname;

    return currentDomain;
}
function get_title()
{
    var titleInput = document.getElementById('title');

// Kiểm tra xem phần tử có tồn tại hay không
if (titleInput) {
    console.log('Element with ID "title" exists.');

} else {
    console.log('Element with ID "title" does not exist.');

    titleInput = document.getElementById('aiautotool_title');

    if (titleInput) {
        console.log('Element with ID "aiautotool_title" exists.');
    } else {
        console.log('Element with ID "aiautotool_title" does not exist.');
    }
}
    return titleInput;
}

function get_lang()
{
    var post_language = document.getElementById('post_language');

// Kiểm tra xem phần tử có tồn tại hay không
if (post_language) {
    console.log('Element with ID "title" exists.');

} else {
    console.log('Element with ID "title" does not exist.');

    post_language = document.getElementById('post_language');

    if (post_language) {
        console.log('Element with ID "aiautotool_title" exists.');
    } else {
        console.log('Element with ID "aiautotool_title" does not exist.');
    }
}
    return post_language.value;
}
function scrollToBottom() {
    var outbard = document.getElementById("outbard");
    if(outbard){
        outbard.scrollTop = outbard.scrollHeight;
    }
        
    }

// Tìm div có class aiautotool_left
var aiautotoolLeft = document.querySelector('.aiautotool_left');

// Kiểm tra xem có div aiautotool_left không
if (aiautotoolLeft) {
    // Lấy giá trị top của div aiautotool_left
    var topPosition = aiautotoolLeft.getBoundingClientRect().top;

    // Tìm div có class aiautotool-fixed
    var aiautotoolFixed = document.querySelector('.aiautotool-fixed');

    // Kiểm tra xem có div aiautotool-fixed không
    if (aiautotoolFixed) {
        // Đặt giá trị top của div aiautotool-fixed
        if(topPosition<=0){
            topPosition = 50;
        }
        aiautotoolFixed.style.top =  '50px';
    }
}

var aiautotoolFixed = document.querySelector('.aiautotool-fixed');

// Xác định màn hình có thay đổi kích thước khi cuộn hay không
var isScreenResized = false;

window.addEventListener('resize', function () {
    isScreenResized = true;
});

window.addEventListener('scroll', function () {
    if(aiautotoolFixed){
        var topPosition = aiautotoolFixed.getBoundingClientRect().top;

        // Kiểm tra xem top của aiautotool-fixed có cao hơn chiều cao của màn hình không
        var isTopHigherThanScreen = topPosition < 0;

        // Nếu màn hình đã thay đổi kích thước (resize) hoặc top của aiautotool-fixed cao hơn màn hình
        if (isScreenResized || isTopHigherThanScreen) {
            // Đặt position là 'absolute'
            aiautotoolFixed.style.position = 'absolute';
        } else {
            // Đặt position là 'fixed'
            aiautotoolFixed.style.position = 'fixed';
        }

        // Đặt lại biến isScreenResized
        isScreenResized = false;
    }
    // Lấy giá trị top của div aiautotool-fixed
    
});
 var aiautotool_content = '';
function openTab(tabName) {
    // Check if a tab with the given ID exists
    if (document.getElementById(tabName)) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        jQuery('[data-tab="' + tabName + '"]').addClass("active");
    } else {
        
        console.log('Tab with ID "' + tabName + '" does not exist.');
        // Handle the case where the tab doesn't exist (e.g., show an error message)
    }
}

jQuery(document).ready(function($) {
    // Ẩn toàn bộ các tab content
    const selectedTab = localStorage.getItem("selectedTab");

    $('.tab-content').hide();

    // Hiển thị tab content đầu tiên
    if (selectedTab) {
        var selectedTabWithoutHash = selectedTab.replace("#", "");
        if ($("#" + selectedTabWithoutHash).length) {
            $('.tab-content').hide();
            $("#" + selectedTabWithoutHash).show();
            var selector = `button[href="${selectedTab}"]`;
            $(selector).addClass('nav-tab-active');
        } else {
            // Nếu không tồn tại id selectedTab, tìm button đầu tiên trong div ft-menu và click vào nó
            var firstButton = $('.ft-menu button').first();
            // firstButton.click();
            var firstTab = $(firstButton.attr('href'));

            firstTab.show();
            firstButton.addClass('nav-tab-active');
            console.log(firstButton.attr('href'));
        }
    } else {
        // $('#tab-setting').show();
        // $('button[href="#tab-setting"]').addClass('nav-tab-active');
        if (document.getElementById('tab-setting')) {
            document.getElementById('tab-setting').style.display = "block";
        }
    }

    // Xử lý sự kiện click trên tab
    $('.nav-tab').click(function(event) {
        // Ngăn chặn mặc định của link khi click
        event.preventDefault();
        var tabText = $(this).text();
        $('#titlehead').text(tabText);

        // Lấy id của tab content tương ứng
        var tab_id = $(this).attr('href');

        // Ẩn toàn bộ các tab content
        $('.tab-content').hide();

        // Hiển thị tab content được click
        $(tab_id).show();

        // Thêm class active cho tab được click
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
    });
});




 function bard_gen_content(button) {
    var post_id = button.getAttribute('data-id');
    var customButton = button;
    var loadingButton = document.getElementById('loading-icon');
    customButton.classList.add('disabled');
    customButton.style.display = 'none';
    loadingButton.style.display = 'block';
  jQuery.ajax({
        url: '/wp-json/aiautotool/v1/createcontentbard', // Điều chỉnh URL REST route theo cấu hình thực tế của bạn
        method: 'POST',
        data: {
            post_id: post_id
        },
        success: function(response) {
            // Xử lý phản hồi từ REST route
            // var responseData = JSON.parse(response);
            var url = response.data;

            // Mở tab mới với URL
            // window.open(url, '_blank');
             loadingButton.style.display = 'none';
            customButton.classList.remove('disabled');
            customButton.style.display = 'block';

             Swal.fire({
                    title: 'Thành công',
                    html:
                      '<a class="btn btn-block btn-danger btn-sm" target="_blank" href="'+url+'">Xem Bài viết</a>',
                    icon: 'success',
                    confirmButtonText: 'Đóng'
                  }).then((result) => {
                     
                  })
        },
        error: function(error) {
            // Xử lý lỗi nếu có
            alert('Lỗi: ' + error.responseText);
             loadingButton.style.display = 'none';
            customButton.classList.remove('disabled');
            customButton.style.display = 'block';
        }
    });
}



document.addEventListener('DOMContentLoaded', function () {
    var titleInput = document.getElementById('aiautotool_title');
    var slugInput = document.getElementById('aiautotool_slug');

    if (titleInput && slugInput) {
        titleInput.addEventListener('blur', function () {
            var titleValue = titleInput.value;
            var slugValue = sanitizeTitle(titleValue);
           
        });

        function sanitizeTitle(title) {
            // Gửi AJAX request đến WordPress để lấy slug
            return wp.ajax.post('aiautotool_get_slug', {
                title: title,
            }).done(function (response) {
                slugInput.value = response.slug;
                
            });
        }
    }
});


document.addEventListener('DOMContentLoaded', function () {
    // Chờ cho đến khi trang hoàn toàn tải xong
    window.onload = function () {
        // Khai báo editor sau khi trang đã tải xong
        if(typeof tinyMCE !== "undefined"){
            var editor = tinyMCE.activeEditor;
        console.log('co editor');
        // create_buttoneditor();

        if (editor) {
             var tabbar = document.createElement('div');
tabbar.id = 'tabbar';
tabbar.className = 'mce-toolbar-grp mce-inline-toolbar-grp mce-container mce-panel borderaiautotool_bar';
tabbar.style.display = 'none';
let svg_UIFindImage ='<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7 7C5.34315 7 4 8.34315 4 10C4 11.6569 5.34315 13 7 13C8.65685 13 10 11.6569 10 10C10 8.34315 8.65685 7 7 7ZM6 10C6 9.44772 6.44772 9 7 9C7.55228 9 8 9.44772 8 10C8 10.5523 7.55228 11 7 11C6.44772 11 6 10.5523 6 10Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M3 3C1.34315 3 0 4.34315 0 6V18C0 19.6569 1.34315 21 3 21H21C22.6569 21 24 19.6569 24 18V6C24 4.34315 22.6569 3 21 3H3ZM21 5H3C2.44772 5 2 5.44772 2 6V18C2 18.5523 2.44772 19 3 19H7.31374L14.1924 12.1214C15.364 10.9498 17.2635 10.9498 18.435 12.1214L22 15.6863V6C22 5.44772 21.5523 5 21 5ZM21 19H10.1422L15.6066 13.5356C15.9971 13.145 16.6303 13.145 17.0208 13.5356L21.907 18.4217C21.7479 18.7633 21.4016 19 21 19Z" fill="currentColor" /></svg>';
    
var findImgButton = document.createElement('button');
 findImgButton.className = 'mce-widget mce-btn mce-first';
findImgButton.id = 'find-img-button';
findImgButton.innerHTML = '<span class="icon-UIFindImage">'+svg_UIFindImage+'</span> Find Img';



var writeButton = document.createElement('button');
writeButton.id = 'write-button';
writeButton.className = 'mce-widget mce-btn mce-first ';


writeButton.innerHTML = '<i class="mce-ico mce-i-dashicon dashicons-edit"></i> Write';


var bardrewrite = document.createElement('button');
bardrewrite.id = 'bardrewrite';
bardrewrite.className = 'mce-widget mce-btn mce-first ';


bardrewrite.innerHTML = '<i class="mce-ico mce-i-dashicon dashicons-edit"></i> Rewrite';


var submenu = document.createElement('div');
submenu.className = 'mce-widget mce-btn-menu';
submenu.style = "top: 12px !important;position: inherit;left: -15px;display:none;";
submenu.innerHTML = '<div class="mce-arrow"></div>' +
    '<div class="mce-menu">' +
        '<div class="mce-menu-item" id="submenuItem1">Shorter</div>' +
        '<div class="mce-menu-item" id="submenuItem2">Longer</div>' +
        '<div class="mce-menu-item" id="submenuItem3">Professional</div>' +
    '</div>';

// Thêm submenu vào nút bardrewrite
bardrewrite.appendChild(submenu);

bardrewrite.addEventListener('mouseover', function() {
    submenu.style.display = 'block';
});

bardrewrite.addEventListener('mouseout', function() {
    submenu.style.display = 'none';
});



var chatgptButton = document.createElement('button');
chatgptButton.id = 'chatgpt-button';
chatgptButton.className = 'mce-widget mce-btn mce-first';


chatgptButton.innerHTML = '<i class="mce-ico mce-i-dashicon dashicons-edit"></i>ChatGpt Write';


tabbar.appendChild(findImgButton);
tabbar.appendChild(writeButton);
tabbar.appendChild(chatgptButton);
tabbar.appendChild(bardrewrite);

document.body.appendChild(tabbar);



var submenuItem1 = document.getElementById('submenuItem1');
var submenuItem2 = document.getElementById('submenuItem2');
var submenuItem3 = document.getElementById('submenuItem3');

submenuItem1.addEventListener('click', function() {
    // Thực hiện công việc khi bấm vào Submenu Item 1
    open_box_aiautotool();
    openTab('aiContentTab');
    var titleValue = selectedText;

    var post_language = get_lang();

    if (post_language.length) {
        // Nếu tồn tại, lấy giá trị của #aiautotool_title
        post_language = post_language;

    } else {
         post_language = langcheck;
    }


    if (!titleValue.trim()) {
        if(Swal){
             Swal.fire({
                      title: 'Error!',
                      text: 'Please select text in the content.',
                      icon: 'error',
                      confirmButtonText: 'Close'
                    });
         }else{
            alert('Please select text in the content');
         }
        
        return;
    }
      var divId = "outbard"; // Thay đổi ID của div tại đây
     

        if (languageCodes.hasOwnProperty(post_language)) {
           langcheck = languageCodes[post_language];
          
        } 

     sendbardToServerrewrite(titleValue, divId,'bardrewrite',langcheck,'Make text shorten.');
});

submenuItem2.addEventListener('click', function() {
    open_box_aiautotool();
    openTab('aiContentTab');
    var titleValue = selectedText;

    var post_language = get_lang();

    if (post_language.length) {
        // Nếu tồn tại, lấy giá trị của #aiautotool_title
        post_language = post_language;

    } else {
         post_language = langcheck;
    }


    if (!titleValue.trim()) {
        if(Swal){
             Swal.fire({
                      title: 'Error!',
                      text: 'Please select text in the content.',
                      icon: 'error',
                      confirmButtonText: 'Close'
                    });
         }else{
            alert('Please select text in the content');
         }
        
        return;
    }
      var divId = "outbard"; // Thay đổi ID của div tại đây
     

        if (languageCodes.hasOwnProperty(post_language)) {
           langcheck = languageCodes[post_language];
          
        } 

      sendbardToServerrewrite(titleValue, divId,'bardrewrite',langcheck,'Make text longer tone of voice.');
});

submenuItem3.addEventListener('click', function() {
    open_box_aiautotool();
    openTab('aiContentTab');
    var titleValue = selectedText;

    var post_language = get_lang();

    if (post_language.length) {
        // Nếu tồn tại, lấy giá trị của #aiautotool_title
        post_language = post_language;

    } else {
         post_language = langcheck;
    }


    if (!titleValue.trim()) {
        if(Swal){
             Swal.fire({
                      title: 'Error!',
                      text: 'Please select text in the content.',
                      icon: 'error',
                      confirmButtonText: 'Close'
                    });
         }else{
            alert('Please select text in the content');
         }
        
        return;
    }
      var divId = "outbard"; // Thay đổi ID của div tại đây
     

        if (languageCodes.hasOwnProperty(post_language)) {
           langcheck = languageCodes[post_language];
          
        } 

      sendbardToServerrewrite(titleValue, divId,'bardrewrite',langcheck,'Make text use professional tone of voice.');
});

            editor.on('mouseup keyup', function() {
    // Kiểm tra xem có văn bản nào đang được chọn hay không
                if (editor.selection) {
                  var selectedText = editor.selection.getContent({ format: 'text' });
                  if(selectedText!=''){
                      
                      var Writingstyle =  jQuery('#Writingstyle').val();

                      var Writingtone =  jQuery('#Writingtone').val();

                      var selectionRange = editor.selection.getRng();
                      var selectionRect = selectionRange.getBoundingClientRect();

                      // Tính toán vị trí của tabbar
                      var editorRect = editor.getContainer().getBoundingClientRect();
                      var tabbarLeft = editorRect.left + selectionRect.left;
                      var tabbarTop = editorRect.top + selectionRect.bottom + window.pageYOffset;

                      // Hiển thị tabbar
                      tabbar.style.display = 'block';
                      tabbar.style.top = tabbarTop + 'px';
                      tabbar.style.left = tabbarLeft + 'px';

                      // Gắn sự kiện cho các nút trong tabbar
                      findImgButton.addEventListener('click', function(event) {
                        open_box_aiautotool();
                        openTab('imagesTab');
                        jQuery('.infodiv').hide();
                         event.stopPropagation();
                        console.log('Find Img clicked');
                        console.log('Selected text:', selectedText);
                        // Gọi API tìm ảnh
                        jQuery('#img_list_find').html('<div id="loading-icon" class="loader" style="display:block;width:100% !important;:100% !important"></div>');
                        openTab('imagesTab');
                       
                        jQuery.ajax({
                        url: 'https://bard.aitoolseo.com/searchimg',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({ question: selectedText }),
                        success: function(rrr) {
                            if (rrr.result) {
                                jQuery('#img_list_find').html('');

                                rrr.result.forEach(function(url) {
                                    jQuery('#img_list_find').prepend('<div data-src="'+url+'" class="img_search"><img src="'+url+'"></div>');
                                });
                            }
                        }
                    });

                        tabbar.style.display = 'none';
                      });
                      var aiautotool_btnwrite_content = '';
                      writeButton.addEventListener('click', function(event) {
                        open_box_aiautotool();
                        openTab('aiContentTab');
                        var titleValue = selectedText;
        
                        var post_language = get_lang();

                        if (post_language.length) {
                            // Nếu tồn tại, lấy giá trị của #aiautotool_title
                            post_language = post_language;

                        } else {
                             post_language = langcheck;
                        }


                        if (!titleValue.trim()) {
                            if(Swal){
                                 Swal.fire({
                                          title: 'Error!',
                                          text: 'Please select text in the content.',
                                          icon: 'error',
                                          confirmButtonText: 'Close'
                                        });
                             }else{
                                alert('Please select text in the content');
                             }
                            
                            return;
                        }
                          var divId = "outbard"; // Thay đổi ID của div tại đây
                         

                            if (languageCodes.hasOwnProperty(post_language)) {
                               langcheck = languageCodes[post_language];
                              
                            } 

                          sendbardToServer(titleValue, divId,'writemore',langcheck);
                        
                        
                      });

                      bardrewrite.addEventListener('click', function(event) {
                        open_box_aiautotool();
                        openTab('aiContentTab');
                        var titleValue = selectedText;
        
                        var post_language = get_lang();

                        if (post_language.length) {
                            // Nếu tồn tại, lấy giá trị của #aiautotool_title
                            post_language = post_language;

                        } else {
                             post_language = langcheck;
                        }


                        if (!titleValue.trim()) {
                            if(Swal){
                                 Swal.fire({
                                          title: 'Error!',
                                          text: 'Please select text in the content.',
                                          icon: 'error',
                                          confirmButtonText: 'Close'
                                        });
                             }else{
                                alert('Please select text in the content');
                             }
                            
                            return;
                        }
                          var divId = "outbard"; // Thay đổi ID của div tại đây
                         

                            if (languageCodes.hasOwnProperty(post_language)) {
                               langcheck = languageCodes[post_language];
                              
                            } 

                          sendbardToServer(titleValue, divId,'bardrewrite',langcheck);
                        
                        
                      });

                      chatgptButton.addEventListener('click', function(event) {
                        open_box_aiautotool();
                        openTab('aiContentTab');
                        event.stopPropagation();
                        var titleValue = selectedText;
                        var post_language = get_lang();
                        if (languageCodes.hasOwnProperty(post_language)) {
                           langcheck = languageCodes[post_language];
                          
                        } 
                          var divId = "outbard"; // Thay đổi ID của div tại đây
                          sendTextToServer(titleValue, divId,'writemore',langcheck);
                        
                        console.log('viết');
                        
                      });


                  }else{
                    tabbar.style.display = 'none';
                  }
                  

                } else {
                  // Ẩn tabbar nếu không có nội dung nào được chọn
                  tabbar.style.display = 'none';
                  dangviet = false;
                }
                event.stopPropagation();
              });
        }
        }
        
    };
});



function create_buttoneditor(){
   


}

if (document.getElementById('post-titles') != null) {

                                            placeholderStreaming('post-titles');

                                        }

// Gắn sự kiện cho việc thả chuột hoặc nhấn phím

// if (document.getElementById('aiautotool_title') != null) {

//                 placeholderStreaming('aiautotool_title');

//             }

// if (document.getElementById('aiautotool_tags') != null) {

//                 placeholderStreaming('aiautotool_tags');

//             }
//             if (document.getElementById('info_content') != null) {

//                 placeholderStreaming('info_content');

//             }
//             if (document.getElementById('info_img') != null) {

//                 placeholderStreaming('info_img');

//             }


function checkAndCallPlaceholderStreaming() {
  // Lấy tất cả các thẻ HTML
  var allElements = document.getElementsByTagName("*");

  // Duyệt qua từng thẻ để kiểm tra
  for (var i = 0; i < allElements.length; i++) {
    var element = allElements[i];

    // Kiểm tra xem thẻ có tồn tại id và thuộc tính placeholderText hay không
    if (element.id && element.getAttribute("placeholderText")) {
      // Gọi hàm placeholderStreaming với id của thẻ
      placeholderStreaming(element.id);
    }
  }
}

checkAndCallPlaceholderStreaming();

function placeholderStreaming(outputElement= 'prompt-input', speed = 50, timeOut = 10000) {

        if (document.getElementById(outputElement) == null){
            return;
        }


         var placeholders = document.getElementById(outputElement).getAttribute('placeholdertext');
         placeholders = placeholders.split(',');
        
        

        var rand = aiautotool_rand2(0, (placeholders.length - 1));
        var placeholder_init_text = aiwa_removeNumbers2(placeholders[rand]).trim();
        

        document.getElementById(outputElement).setAttribute('placeholder', '');
        for (let i = 0; i < placeholder_init_text.length; i++) {
            setTimeout(function () {
                var placeholder = document.getElementById(outputElement).getAttribute('placeholder');
                document.getElementById(outputElement).setAttribute('placeholder', placeholder + placeholder_init_text[i]);
            }, i * speed);
        }


        var AutoRefresh = setInterval(function () {
            var rand = aiautotool_rand2(0, (placeholders.length - 1));
            aiautotool_replace_placeholder_like_stream(aiwa_removeNumbers2(placeholders[rand]).trim(), outputElement, speed);
        }, timeOut);
    }

function aiautotool_rand2(min, max) { // min and max included
    return Math.floor(Math.random() * (max - min + 1) + min)
}

function aiwa_removeNumbers2(list) {
    return list.replace(/\d\.|\d\d\.+/g, "");
}
function aiautotool_replace_placeholder_like_stream(string, id = 'prompt-input', speed = 50) {
    var prompt_input = document.getElementById(id);

    // Check if the element is an input or a div
    if (prompt_input.tagName.toLowerCase() === 'input') {
        prompt_input.setAttribute('placeholder', '');
        for (let i = 0; i < string.length; i++) {
            setTimeout(function () {
                var placeholder = prompt_input.getAttribute('placeholder');
                prompt_input.setAttribute('placeholder', placeholder + string[i]);
            }, i * speed);
        }
    } else if (prompt_input.tagName.toLowerCase() === 'textarea') {
        prompt_input.setAttribute('placeholder', '');
        for (let i = 0; i < string.length; i++) {
            setTimeout(function () {
                var placeholder = prompt_input.getAttribute('placeholder');
                prompt_input.setAttribute('placeholder', placeholder + string[i]);
            }, i * speed);
        }
    } else if (prompt_input.tagName.toLowerCase() === 'div') {
        prompt_input.innerHTML = ''; // Clear existing content
        for (let i = 0; i < string.length; i++) {
            setTimeout(function () {
                prompt_input.innerHTML += string[i];
            }, i * speed);
        }
    }
}


function setcontent(content){
     var activeEditor = tinyMCE.get('content');
    // var content = 'HTML or plain text content here...';
    if(jQuery('#wp-content-wrap').hasClass('html-active')){ // We are in text mode
        jQuery('#content').val(content); // Update the textarea's content
    } else { // We are in tinyMCE mode
        var activeEditor = tinyMCE.get('content');
        if(activeEditor!==null){ // Make sure we're not calling setContent on null
            activeEditor.setContent(content); // Update tinyMCE's content
        }
    }
  }

jQuery(document).ready(function ($) {

    async function checkAndDoSomething() {

        if(statussocket){
        if(Swal){
                 Swal.fire({
                          title: 'Error!',
                          text: 'AI is writing',
                          icon: 'error',
                          confirmButtonText: 'Close'
                        });
             }else{
                alert('AI is writing');
             }
        
    }else{
                    open_box_aiautotool();
                    question = get_title().value;

                    if (question.trim() === '') {
                         if(Swal){
                                 Swal.fire({
                                                  title: 'Error!',
                                                  text: 'Please fill a title:\n' ,
                                                  icon: 'error',
                                                  confirmButtonText: 'Close'
                                                });
                                     }else{
                                         alert('Please enter a title!');
                                     }
                       
                    } else {

                        var post_language = jQuery('#post_language').val();

                          lang = get_lang();
                            if (languageCodes.hasOwnProperty(post_language)) {
                               lang = languageCodes[post_language];
                              
                            } 

                        openTab('aiContentTab');
                        showProcess();
                        const contentOb = new ContentOb(url, question, lang);
                        await contentOb.createOutline();
                        console.log(contentOb.listhead);
                    }
                }
    }
   
    // Event listener for the "Bard write" button
    $('.bard-write').on('click', function () {
        // Check if the title is filled
        var titleValue = get_title().value;
        
        var post_language = get_lang();

        if (post_language.length) {
            // Nếu tồn tại, lấy giá trị của #aiautotool_title
            post_language = post_language;

        } else {
             post_language = langcheck;
        }


        if (!titleValue.trim()) {
            if(Swal){
                 Swal.fire({
                          title: 'Error!',
                          text: 'Please fill in the title.',
                          icon: 'error',
                          confirmButtonText: 'Close'
                        });
             }else{
                alert('Please fill in the title.');
             }
            
            return;
        }
         // $(this).prop('disabled', true);

         

          var divId = "outbard"; // Thay đổi ID của div tại đây
          var post_language = jQuery('#post_language').val();

            if (languageCodes.hasOwnProperty(post_language)) {
               langcheck = languageCodes[post_language];
              
            } 

          sendbardToServer(titleValue, divId,'writefull',langcheck);
          
    });


    $('.chatgpt-write').on('click', function () {
        // Check if the title is filled
        var titleValue = $('#aiautotool_title').val();
        if ($('#aiautotool_title').length) {
            // Nếu tồn tại, lấy giá trị của #aiautotool_title
            titleValue = $('#aiautotool_title').val();

        } else {
            // Nếu không tồn tại, thay thế bằng #title
             titleValue = $('#title').val();
        }
        var post_language = $('#post_language').val();

        if ($('#post_language').length) {
            // Nếu tồn tại, lấy giá trị của #aiautotool_title
            post_language = $('#post_language').val();

        } else {
             post_language = langcheck;
        }

        if (!titleValue.trim()) {
            if(Swal){
                 Swal.fire({
                          title: 'Error!',
                          text: 'Please fill in the title.',
                          icon: 'error',
                          confirmButtonText: 'Close'
                        });
             }else{
                alert('Please fill in the title.');
             }
            
            return;
        }
         
         // var text = 'Viết một bài viết về tiêu đề "' + titleValue + '" bằng ngôn ngữ "Vietnamese", có chứa ít nhất 3 thẻ h2, viết định dạng maskdown. the end content has create FAQ for title';
          var divId = "outbard"; // Thay đổi ID của div tại đây
          var post_language = jQuery('#post_language').val();

            if (languageCodes.hasOwnProperty(post_language)) {
               langcheck = languageCodes[post_language];
              
            } 

          sendTextToServer(titleValue, divId,'writefull',langcheck);
    });

    $('#askprompt').on('click', function () {


        var titleValue = $('#promptask').val();
        
        var post_language = get_lang();

        if (post_language.length) {
            // Nếu tồn tại, lấy giá trị của #aiautotool_title
            post_language = post_language;

        } else {
             post_language = langcheck;
        }

        var askAI = $('#askAI').val();

        if (!titleValue.trim()) {
            if(Swal){
                 Swal.fire({
                          title: 'Error!',
                          text: 'Please fill in Your Prompt.',
                          icon: 'error',
                          confirmButtonText: 'Close'
                        });
             }else{
                alert('Please fill in Your Prompt.');
             }
            
            return;
        }
         // $(this).prop('disabled', true);

         

          var divId = "outbard"; // Thay đổi ID của div tại đây
          var post_language = jQuery('#post_language').val();

            if (languageCodes.hasOwnProperty(post_language)) {
               langcheck = languageCodes[post_language];
              
            } 
        if (askAI =='chatgpt') {
            
            sendTextToServer(titleValue, divId,'writemore',langcheck);
        }else{

          sendbardToServer(titleValue, divId,'writemore',langcheck);
        }
        
    });
     $('.chatgpt-long-write').on('click', function () {
        // Check if the title is filled

        checkAndDoSomething();
    });


     $('.btn_suggettitle').on('click', function () {
        // Check if the title is filled

        var titleValue = get_title();
        var post_language = get_lang();
        console.log(post_language);
        if (!titleValue.value.trim()) {
            if(Swal){
                 Swal.fire({
                          title: 'Error!',
                          text: 'Please fill Key for sugget in input title.',
                          icon: 'error',
                          confirmButtonText: 'Close'
                        });
             }else{
                alert('Please fill in the title.');
             }
            
            return;
        }
         $(this).prop('disabled', true);
          showProcess();
        $.ajax({
            url: aiautotool_data.ajax_url,
            method: 'POST',
            data: {
                 action: 'bard_content',
                title: titleValue.value,
                post_language:post_language,
                ac:'suggettitle'
                // Add any other data you need to send to the API
            },
            success: function (response) {
                // Display the result in the 'outbard' div
               console.log(response);
               titleValue.value = response.data.content;
               isStartSocket = 1;
               jQuery(".div_proccess").addClass("d-none");
               
            },
            error: function () {
                alert('An error occurred during the API call.');
            },
            complete: function () {
                // Re-enable the button after AJAX call is complete
                
                $(this).prop('disabled', false);
                // $('#loading-icon').remove();
            }
        });
    });


    $('.btnaddpost').on('click', function () {
        // Check if the title is filled
       
      event.preventDefault();

          $('#outbard').html('');
             
          
          tinymce.activeEditor.insertContent(aiautotool_content);
          $('.btnaddpost').hide();
          return false;
    });
 
    openTab('aiContentTab');
    // Event listeners for tab buttons
    $('.aiautotool_tab button').on('click', function () {
        var tabName = $(this).data('tab');
        openTab(tabName);
    });



 $("body").on("click", ".img_search", function(res) {
    res.preventDefault();
    let imgSrc = $(this).attr("data-src");
    let imgBox = `<p class="imageBox"><img class="aligncenter" src="${imgSrc}"></p>`;
    tinymce.activeEditor.insertContent(imgBox);
    

    
});

});


// form submit

// script.js


jQuery(document).ready(function ($) {
    var postForm = $('#aiautotool_post_form');

    postForm.submit(function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Check if required fields are filled
        var missingFields = checkFields();

        if (missingFields.length > 0) {
            // Alert with specific missing fields
            if(Swal){
                 Swal.fire({
                                  title: 'Error!',
                                  text: 'Please fill in the following fields:\n' + missingFields.join(', '),
                                  icon: 'error',
                                  confirmButtonText: 'Close'
                                });
                     }else{
                        alert('Please fill in the following fields:\n' + missingFields.join(', '));
                     }
            return;
        }
        Swal.fire({
                title:"", 
                text:"Loading...",
                icon: "https://www.boasnotas.com/img/loading2.gif",
                buttons: false,      
                closeOnClickOutside: false,
                timer: 3000,
                //icon: "success"
            });
        // Retrieve form data
        var formData = postForm.serialize();

        // Example: Add additional data to formData if needed
        formData += '&additional_key=additional_value';

        // Add the security nonce
        formData += '&security=' + ajax_object.security;
         formData += '&action=save_post_data';
        // Call your plugin's AJAX endpoint
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: formData,
            success: function (response) {
                // Handle the success response from the server
                console.log(response);
                if (response.success) {
                    // Success response
                    if(Swal){

                        Swal.fire({
                            title: 'Thành công',
                            html:
                              'Post successfully saved and published. <a class="btn btn-block btn-danger btn-sm" target="_blank" href="'+response.data.post_url+'">View Post</a>',
                            icon: 'success',
                            confirmButtonText: 'Đóng'
                          }).then((result) => {
                             
                          })

                         
                             }else{
                                alert('Post successfully saved and published!');
                             }
                    
                    // Display the post URL
                    console.log('Post URL:', response.data.post_url);
                } else {
                    // Error response
                    alert('Error: ' + response.data);
                }
            },
            error: function (error) {
                // Handle errors
                console.error('Error:', error);
            }
        });
    });

    // Function to check if required fields are filled
     function checkFields() {
        var titleInput = document.getElementById('aiautotool_title');
        var categoriesCheckboxes = document.querySelectorAll('[name="post_category[]"]');
        var contentInput = document.getElementById('aiautotool_content');

        var missingFields = [];

        // Check each field and add to missingFields if empty
        if (!titleInput.value.trim()) {
            missingFields.push('Title');
        }

        var selectedCategories = Array.from(categoriesCheckboxes).some(checkbox => checkbox.checked);

        if (!selectedCategories) {
            missingFields.push('Categories');
        }

        if (!contentInput.value.trim()) {
            missingFields.push('Content');
        }

        return missingFields;
    }
});




// chatgpt config

function removeMaskData(dataText){if(dataText){if(typeof dataText==='string'||dataText instanceof String){dataText=dataText.replaceAll('Stop article','');dataText=dataText.replaceAll('{stop article}','');dataText=dataText.replaceAll('{stop}','');dataText=dataText.replaceAll('{start}','');dataText=dataText.replaceAll('{done}','');dataText=dataText.replaceAll('{---end---}','');dataText=dataText.replaceAll('---end---','');dataText=dataText.replaceAll('--end--','');dataText=dataText.replaceAll('-end-','');dataText=dataText.replaceAll('ChatGPT','');dataText=dataText.replaceAll('chatGPT','');return dataText;}}}
function replaceH1WithH2(text) {
  // Sử dụng biểu thức chính quy (regular expression) để thay thế tất cả các thẻ <h1> thành <h2>
  return text.replace(/<h1>/g, "<h2>").replace(/<\/h1>/g, "</h2>");
}
function sendTextToServer(text, divId,option,lang) {

    if(statussocket){
        console.log(statussocket);
        if(Swal){
                 Swal.fire({
                          title: 'Error!',
                          text: 'AI is writing',
                          icon: 'error',
                          confirmButtonText: 'Close'
                        });
             }else{
                alert('AI is writing');
             }
        
    }else{

           
          // var socket = io("https://bard.aiautotool.com");
          let currentText = "";

          // Xử lý sự kiện khi dữ liệu trả về từ máy chủ
          socket.on("aiautotool-content-return", function(data) {
            data = JSON.parse(data);
            isStartSocket = 1;
            jQuery(".loadingprocess").addClass("d-none");
            // Xử lý dữ liệu theo nhu cầu của bạn
            if (data?.status == 'writing') {
              currentText = currentText + data.sText;
              jQuery(`#${divId}`).html(markdown(currentText));
              scrollToBottom();
            } else if (data?.status == 'complete') {
                
                 aiautotool_content = replaceH1WithH2(markdown(removeMaskData(currentText)));
              jQuery(`#${divId}`).html(`<div class="">${replaceH1WithH2(markdown(removeMaskData(currentText)))}</div>`);
              scrollToBottom();
              jQuery('.btnaddpost').show();
              statussocket = false;
            }

            // console.log("Dữ liệu được trả về từ máy chủ:", data);
          });

          // Tạo đối tượng socketObj theo yêu cầu
          var socketObj = {
            text: text,
            option:option,
            language: lang,
            hostname:hostname
          };
          showProcess();
          // Gửi dữ liệu lên máy chủ
          socket.emit('aiautotool-write', socketObj);
          statussocket = true;

   }
}

function sendbardToServer(text, divId,option,lang) {
    var dataToSend = {
      question: text,
      lang: lang
    };
    var jsonData = JSON.stringify(dataToSend);
    showProcess();
    var urlapi  = 'https://bard.aitoolseo.com/bardcontent';
    switch(option){
        case 'writefull':
            urlapi  = 'https://bard.aitoolseo.com/bardcontentfull';
            break;
        case 'writemore':
            urlapi  = 'https://bard.aitoolseo.com/bardcontentmore';
            break;

        case 'writebard':
            urlapi  = 'https://bard.aitoolseo.com/bardcontent';
            break;

        case 'bardrewrite':
            urlapi  = 'https://bard.aitoolseo.com/bardrewrite';
            var toneOfVoice = '';
            break;
        default:
            urlapi  = 'https://bard.aitoolseo.com/bardcontent';
            break;
    }
    
   jQuery.ajax({
      type: "POST",
      url: urlapi,
      data: jsonData,
      contentType: "application/json",
      success: function(data) {
        aiautotool_content = replaceH1WithH2(markdown(removeMaskData(data.result)));
        // jQuery(`#${divId}`).innerHTML = aiautotool_content;
        jQuery(`#${divId}`).html(aiautotool_content);
        scrollToBottom();
        jQuery('.btnaddpost').show();
        jQuery(".div_proccess").addClass("d-none");
        jQuery(".loadingprocess").addClass("d-none");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error("Lỗi khi gửi yêu cầu: " + textStatus, errorThrown);
      }
    });
  //    if(statussocket){
  //       if(Swal){
  //                Swal.fire({
  //                         title: 'Error!',
  //                         text: 'AI is writing',
  //                         icon: 'error',
  //                         confirmButtonText: 'Close'
  //                       });
  //            }else{
  //               alert('AI is writing');
  //            }
        
  //   }else{
  // // var socket = io("https://bard.aiautotool.com");
  // let currentText = "";

  // // Xử lý sự kiện khi dữ liệu trả về từ máy chủ
  // socket.on("aiautotool-bard-return", function(data) {
  //   statussocket = false;
  //   data = JSON.parse(data);
  //   isStartSocket = 1;
  //   jQuery(".div_proccess").addClass("d-none");
  //   jQuery(".loadingprocess").addClass("d-none");
  //   // Xử lý dữ liệu theo nhu cầu của bạn
    
     
  //        aiautotool_content = replaceH1WithH2(markdown(removeMaskData(data.content)));
  //     jQuery(`#${divId}`).html(`<div class="">${replaceH1WithH2(markdown(removeMaskData(data.content)))}</div>`);
  //       scrollToBottom();
  //     jQuery('.btnaddpost').show();
       
    

  // });

  // // Tạo đối tượng socketObj theo yêu cầu
  // var socketObj = {
  //   text: text,
  //   option:option,
  //   language: lang,
  //   hostname:hostname
  // };
  // showProcess();
  // // Gửi dữ liệu lên máy chủ
  // socket.emit('aiautotool-bard', socketObj);
  // statussocket = true;
  //   }
}


function reformatHTML(htmlRes){
            if (typeof htmlRes === 'string' || htmlRes instanceof String){
                htmlRes = htmlRes.replaceAll('```html\n','');
                htmlRes = htmlRes.replaceAll('```','');
                htmlRes = htmlRes.trim();
                if (htmlRes.substr(0,1) == '"') htmlRes = htmlRes.substr(1);
                if (htmlRes.slice(-1) == '"') htmlRes = htmlRes.slice(0,-1);

                if (htmlRes.indexOf("</") == -1){
                    if (htmlRes.indexOf("\n") > -1){
                        htmlRes = "<p>" + htmlRes + "</p>";
                        htmlRes = htmlRes.replace(/\r\n\r\n/g, "</p><p>").replace(/\n\n/g, "</p><p>");
                        htmlRes = htmlRes.replace(/\r\n/g, "<br />").replace(/\n/g, "<br />");
                    }
                }
                return htmlRes;
            }else{
                return htmlRes;
            }
        }

function sendbardToServerrewrite(text, divId,option,lang,tone='') {

    showProcess();
    var urlapi  = 'https://bard.aitoolseo.com/bardcontent';
    switch(option){
        case 'writefull':
            urlapi  = 'https://bard.aitoolseo.com/bardcontentfull';
            break;
        case 'writemore':
            urlapi  = 'https://bard.aitoolseo.com/bardcontentmore';
            break;

        case 'writebard':
            urlapi  = 'https://bard.aitoolseo.com/bardcontent';
            break;

        case 'bardrewrite':
            urlapi  = 'https://bard.aitoolseo.com/bardrewrite';
            
            break;
        default:
            urlapi  = 'https://bard.aitoolseo.com/bardcontent';
            break;
    }
    var dataToSend = {
      question: text,
      lang: lang,
      toneOfVoice:tone
    };
    var jsonData = JSON.stringify(dataToSend);
   jQuery.ajax({
      type: "POST",
      url: urlapi,
      data: jsonData,
      contentType: "application/json",
      success: function(data) {
        aiautotool_content = replaceH1WithH2(markdown(removeMaskData(reformatHTML(data.result))));
        // jQuery(`#${divId}`).innerHTML = aiautotool_content;
        jQuery(`#${divId}`).html(aiautotool_content);
        scrollToBottom();
        jQuery('.btnaddpost').show();
        jQuery(".div_proccess").addClass("d-none");
        jQuery(".loadingprocess").addClass("d-none");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error("Lỗi khi gửi yêu cầu: " + textStatus, errorThrown);
      }
    });
  
}

function markdown(src,showImage=true){src=src.replace(/(#+)(\w+)/g,'\n$1 $2');var rx_lt=/</g;var rx_gt=/>/g;var rx_space=/\t|\r|\uf8ff/g;var rx_escape=/\\([\\\|`*_{}\[\]()#+\-~])/g;var rx_hr=/^([*\-=_] *){3,}$/gm;var rx_blockquote=/\n *&gt; *([^]*?)(?=(\n|$){2})/g;var rx_list=/\n( *)(?:[*\-+]|((\d+)|([a-z])|[A-Z])[.)]) +([^]*?)(?=(\n|$){2})/g;var rx_listjoin=/<\/(ol|ul)>\n\n<\1>/g;var rx_highlight=/(^|[^A-Za-z\d\\])(([*_])|(~)|(\^)|(--)|(\+\+)|`)(\2?)([^<]*?)\2\8(?!\2)(?=\W|_|$)/g;var rx_code=/\n((```|~~~).*\n?([^]*?)\n?\2|((    .*?\n)+))/g;var rx_link=/((!?)\[(.*?)\]\((.*?)( ".*")?\)|\\([\\`*_{}\[\]()#+\-.!~]))/g;var rx_table=/\n(( *\|.*?\| *\n)+)/g;var rx_thead=/^.*\n( *\|( *\:?-+\:?-+\:? *\|)* *\n|)/;var rx_row=/.*\n/g;var rx_cell=/\||(.*?[^\\])\|/g;var rx_heading=/(?=^|>|\n)([>\s]*?)(#{1,6}) (.*?)( #*)? *(?=\n|$)/g;var rx_para=/(?=^|>|\n)\s*\n+([^<]+?)\n+\s*(?=\n|<|$)/g;var rx_stash=/-\d+\uf8ff/g;function replace(rex,fn){src=src.replace(rex,fn);}
function element(tag,content){return '<'+tag+'>'+content+'</'+tag+'>';}
function blockquote(src){return src.replace(rx_blockquote,function(all,content){return element('blockquote',blockquote(highlight(content.replace(/^ *&gt; */gm,''))));});}
function list(src){return src.replace(rx_list,function(all,ind,ol,num,low,content){var entry=element('li',highlight(content.split(RegExp('\n ?'+ind+'(?:(?:\\d+|[a-zA-Z])[.)]|[*\\-+]) +','g')).map(list).join('</li><li>')));return '\n'+(ol?'<ol start="'+(num?ol+'">':parseInt(ol,36)-9+'" style="list-style-type:'+(low?'low':'upp')+'er-alpha">')+entry+'</ol>':element('ul',entry));});}
function highlight(src){return src.replace(rx_highlight,function(all,_,p1,emp,sub,sup,small,big,p2,content){return _+element(emp?(p2?'strong':'em'):sub?(p2?'s':'sub'):sup?'sup':small?'small':big?'big':'code',highlight(content));});}
function unesc(str){return str.replace(rx_escape,'$1');}
var stash=[];var si=0;src='\n'+src+'\n';replace(rx_lt,'&lt;');replace(rx_gt,'&gt;');replace(rx_space,'  ');src=blockquote(src);replace(rx_hr,'<hr/>');src=list(src);replace(rx_listjoin,'');replace(rx_code,function(all,p1,p2,p3,p4){stash[--si]=element('pre',element('code',p3||p4.replace(/^    /gm,'')));return si+'\uf8ff';});replace(rx_link,function(all,p1,p2,p3,p4,p5,p6){stash[--si]=p4?p2?(showImage==true?(p4.indexOf("http")>-1?'<img src="'+p4+'" alt="'+p3+'" onerror="this.style.display=\'none\'"/>':''):''):'<a href="'+p4+'" alt="'+p3+'">'+unesc(highlight(p3))+'</a>':p6;return si+'\uf8ff';});replace(rx_table,function(all,table){var sep=table.match(rx_thead)[1];return '\n'+element('table',table.replace(rx_row,function(row,ri){return row==sep?'':element('tr',row.replace(rx_cell,function(all,cell,ci){return ci?element(sep&&!ri?'th':'td',unesc(highlight(cell||''))):''}))}))});replace(rx_heading,function(all,_,p1,p2){return _+element('h'+p1.length,unesc(highlight(p2)))});replace(rx_para,function(all,content){return element('p',unesc(highlight(content)))});replace(rx_stash,function(all){return stash[parseInt(all)]});return src.trim();};


async function showProcess(totalTime=20000){
        jQuery(".div_proccess_0").addClass("d-none");
        jQuery(".div_proccess_1").removeClass("d-none");
        let t_1 = await showAProcess("proccess_1",totalTime);
        if (isStartSocket == 0){
            jQuery(".div_proccess_error").removeClass("d-none");
            jQuery(".div_proccess_1").addClass("d-none");
        }
        
    }
    async function showAProcess(process_id,loadingTime=200000){
        return await new Promise(resolve => {
            jQuery(".div_proccess").addClass("d-none");
            jQuery(".div_"+process_id).removeClass("d-none");
            let interval = loadingTime/100;
            let percent = 0;
            myInterval = setInterval(() => {
                percent +=1;
                jQuery("#" + process_id).html(`${percent} %`);
                if (percent > 99){
                    clearInterval(myInterval);
                    resolve(1);
                }
                
            }, interval);
        });
    }





jQuery(document).ready(function($){
    $('#upload-custom-thumbnail').on('click', function(e){
        e.preventDefault();

        var custom_uploader = wp.media({
            title: 'Choose Custom Thumbnail',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#custom-thumbnail-id').val(attachment.id);
            $('#custom-thumbnail-preview').html('<img src="' + attachment.url + '">');
        });

        custom_uploader.open();
    });
});


function createButton(idbutton='',icon, text, clickHandler, buttonClass) {
    // Tạo một thẻ button
    var button = document.createElement("span");

    // Gán class cho button nếu được cung cấp
    if (buttonClass) {
        button.className = buttonClass;
    }
    button.id = idbutton;
    // Tạo một thẻ span để chứa icon
    var iconSpan = document.createElement("span");
    iconSpan.className = "icon"; // Thêm class "icon" để tùy chỉnh kiểu dáng icon
    button.type = 'button';
    // Thêm icon vào thẻ span
    iconSpan.innerHTML = icon;

    // Tạo một thẻ span để chứa text
    var textSpan = document.createElement("span");
    textSpan.innerHTML = text;

    // Gắn icon và text vào button
    button.appendChild(iconSpan);
    button.appendChild(textSpan);

    // Gắn hàm xử lý sự kiện khi nút được click
    button.addEventListener("click", clickHandler);

    // Trả về button đã tạo
    return button;
}


function isEditOrNewPostPage() {
    var bodyClasses = document.body.classList;
    var isPostNewPage = bodyClasses.contains('post-new-php');
    var isPostPage = bodyClasses.contains('post-php');
    var isAiautotoolPage = bodyClasses.contains('aiautotool_input');
    
    var isAiPostInUrl = window.location.href.includes('ai_post');
    var isAiSinglePostInUrl = window.location.href.includes('ai_single_post');

    return isPostNewPage || isPostPage || isAiautotoolPage || isAiPostInUrl || isAiSinglePostInUrl;
}


// Hàm xử lý sự kiện khi nút được click
function handleButtonClick() {
    open_box_aiautotool();
}

if (isEditOrNewPostPage()) {
    // Lấy input title
    var titleInput = get_title();

    // Tạo button
    var bardbtn = createButton('bard-write','<i class="mce-ico mce-i-dashicon dashicons-edit"></i>', "Bard write", handleButtonClick, "mce-btn  aiautotool_btn btn_writer bard-write");
    var chatgpt = createButton('chatgpt-write','<i class="mce-ico mce-i-dashicon dashicons-edit"></i>', "Chatgpt write", handleButtonClick, "mce-btn  aiautotool_btn btn_bardWriter chatgpt-write");
    var yourprompt = createButton('your-prompt','<i class="fa-solid fa-robot"></i>', "Ask Assistant", handleButtonClick, "mce-btn aiautotool_btn btn_askassistant ");
   var suggetstitle = createButton('btn_suggettitle','<i class="mce-ico mce-i-dashicon dashicons-edit"></i>', "Suggest title ", handleButtonClick, "mce-btn aiautotool_btn btn_bardWriter btn_suggettitle");
    var selectBox = document.createElement('select');
    selectBox.name = 'post_language';
    selectBox.id = 'post_language';
    for (var code in ajax_object.languageCodes) {
    if (ajax_object.languageCodes.hasOwnProperty(code)) {
            var option = document.createElement('option');
            option.value = code;
            if (langcheck === code) {
                option.selected = true;
            }
            option.text = ajax_object.languageCodes[code];
            selectBox.appendChild(option);
        }
    }
    // Chèn button vào sau input title

    titleInput.parentNode.insertBefore(yourprompt, titleInput.nextSibling);
    titleInput.parentNode.insertBefore(bardbtn, titleInput.nextSibling);
    titleInput.parentNode.insertBefore(chatgpt, titleInput.nextSibling);
    titleInput.parentNode.insertBefore(suggetstitle, titleInput.nextSibling);


    var titleInput = document.getElementById('title');

    if (document.getElementById('title')) {
       titleInput.parentNode.insertBefore(selectBox, titleInput.nextSibling);

    }
    




    const aiautotoolDiv = document.createElement('div');
        aiautotoolDiv.id = 'aiautotool_bar_right';
        
        document.body.appendChild(aiautotoolDiv);

        // Kiểm tra xem có phần tử có id là "aiautotool-meta-box" hay không
        var metaBoxElement = document.getElementById("aiautotool-meta-box");

        // Kiểm tra xem phần tử có tồn tại hay không
        if (metaBoxElement) {
            // Nếu tồn tại, thực hiện các thao tác khác ở đây

            metaBoxElement.parentNode.removeChild(metaBoxElement);
            var contentToMove = metaBoxElement.innerHTML;

            // Đặt nội dung vào div có id là "aiautotool_bar_right"
            
            aiautotoolDiv.innerHTML = contentToMove;
        } else {
            // Nếu không tồn tại, thông báo hoặc thực hiện các thao tác khác ở đây
            aiautotoolDiv.innerHTML = '';
            console.log("Không tìm thấy phần tử có id là 'aiautotool-meta-box'");
        }

        // Tạo và thêm button vào trang
        const toggleButton = document.createElement('div');
        toggleButton.id = 'toggleButton';
        toggleButton.addClass = 'aiautotool_btn_menu';
        
        toggleButton.innerText = 'Open Aiautotool';
        document.body.appendChild(toggleButton);

        const sidebar = document.getElementById('aiautotool_bar_right');

        toggleButton.addEventListener('click', () => {
            const sidebar = document.getElementById('aiautotool_bar_right');
            var toggleButton = document.getElementById('toggleButton');
            const isOpen = sidebar.style.right === '0px';
            
            if (isOpen) {
                sidebar.style.right = '-300px';
                toggleButton.classList.remove('open');
                toggleButton.innerText = 'Open Aiautotool';
            } else {
                sidebar.style.right = '0';
                toggleButton.classList.add('open');
                toggleButton.innerText = 'Close Aiautotool';
            }
        });

       
        function open_box_aiautotool(){
            const sidebar = document.getElementById('aiautotool_bar_right');
            var toggleButton = document.getElementById('toggleButton');
            const isOpen = sidebar.style.right === '0px';
            
            if (isOpen) {
                
            } else {
                sidebar.style.right = '0';
                toggleButton.classList.add('open');
                toggleButton.innerText = 'Close Aiautotool';
            }
        }









                

                function updatepost(keyToUpdate, data) {
                    var stext = '';
                    var desc = '';
                    if (data?.status == 'writing') {
                        post[keyToUpdate].stext += data.sText;
                    } else if (data?.status == 'complete') {
                        if (post[keyToUpdate].desc == '') {
                            post[keyToUpdate].desc = data.text;
                        }
                    }
                }

                function displayAllPosts(divId) {
                    let containerDiv = document.getElementById(divId);

                    if (!containerDiv) {
                        console.error(`Div with id ${divId} not found.`);
                        return;
                    }
                   
                    let stringhtml = '';

                    for (let i = 0; i < post.length; i++) {
                        let postItem = post[i];
                        if (postItem.desc == '') {
                            if (postItem.stext != '') {
                                stringhtml += '<h2>' + postItem.h2 + '</h2>' + markdown(removeMaskData(postItem.stext), false);
                            }
                        } else {
                            stringhtml += '<h2>' + postItem.h2 + '</h2>' + markdown(removeMaskData(postItem.desc), false);
                        }
                    }
                    aiautotool_content = stringhtml;
                    jQuery("#" + divId).html(stringhtml);
                    

                    scrollToBottom()
                }

                function checkpost() {
                    if (post.length > 0) {
                        console.log(indexnow, post.length);
                        if (indexnow < (post.length - 1)) {
                            if (istrue) {
                                for (let i = 0; i < post.length; i++) {
                                    let postItem = post[i];
                                    if (postItem.desc == '') {
                                        istrue = false;
                                        indexnow = i;
                                        runpost(indexnow);
                                        break;
                                    }
                                }
                            }
                        } else {
                            clearInterval(checkpostin);
                            statussocket = false;
                            jQuery('.btnaddpost').show();
                            console.log('kết thúc');
                            
                        }
                    }
                }

                function runpost(index) {
                    idhead = Math.floor(Math.random() * 1000);
                    headtitle = post[index].h2;
                    
                    
                    var post_language = get_lang();
                    if (languageCodes.hasOwnProperty(post_language)) {
                       langcheck = languageCodes[post_language];
                      
                    } 
                      var divId = "outbard"; 

                    var socketObj = {
                    text: '' + headtitle + ', ' + question,
                    option:'writemorelong',
                    language: langcheck,
                    hostname:hostname
                  };

                    socket.emit('aiautotool-writefull', socketObj);
                    statussocket = true;
                    socket.on("aiautotool-writefull-return", function (data) {
                        isStartSocket = 1;
                        data = JSON.parse(data);
                        updatepost(Number(index), data);
                        displayAllPosts(divids);
                        if (data?.status == 'complete') {
                            istrue = true;

                        }
                    });
                }

                var checkpostin = setInterval(function () {
                    checkpost();
                }, 1000);
}



const postTagsElement = document.getElementById('post_tags');

if (postTagsElement) {
    postTagsElement.addEventListener('paste', function (event) {
        
        event.preventDefault();

        const pastedData = (event.clipboardData || window.clipboardData).getData('text');

        const replacedData = pastedData.replace(/\n/g, ',');

        this.value = replacedData;
    });
} 



// lay images tu media
jQuery(document).ready(function($) {
    $('.ft-selec').click(function(e) {
        e.preventDefault();
        var inputId = $(this).data('input-id');
        openMediaUploader(inputId);
    });

    function openMediaUploader(inputId) {
        var customUploader = wp.media({
            title: 'Select image',
            button: {
                text: 'Select'
            },
            multiple: false
        });

        customUploader.on('select', function() {
            var attachment = customUploader.state().get('selection').first().toJSON();
            var imageUrl = attachment.url;
            $('#' + inputId).val(imageUrl);
        });

        customUploader.open();
    }
});


jQuery(document).ready(function($) {
        $('form input[type="checkbox"]').change(function() {
            var currentForm = $(this).closest('form');
            $.ajax({
                type: 'POST',
                url: currentForm.attr('action'), 
                data: currentForm.serialize(), 
                success: function(response) {
                    console.log('Turn on successfully');
                },
                error: function() {
                    console.log('Error in AJAX request');
                }
            });
        });
    });
