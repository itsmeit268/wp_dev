function isEditOrNewPostPage() {
    var bodyClasses = document.body.classList;
    var isPostNewPage = bodyClasses.contains('post-new-php');
    var isPostPage = bodyClasses.contains('post-php');
    var isAiautotoolPage = bodyClasses.contains('aiautotool_input');
    
    var isAiPostInUrl = window.location.href.includes('ai_post');
    var isAiSinglePostInUrl = window.location.href.includes('ai_single_post');

    return isPostNewPage || isPostPage || isAiautotoolPage || isAiPostInUrl || isAiSinglePostInUrl;
}



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
    iconSpan.innerHTML = icon+" ";

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
        titleInput = document.querySelector("div.edit-post-header-toolbar__left");
        console.log('Element with ID "h1.wp-block-post-title" does not exist.');
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

// Hàm xử lý sự kiện khi nút được click
function handleButtonClick() {
    open_box_aiautotool();
}

if (isEditOrNewPostPage()) {
    // Lấy input title
    var titleInput = get_title();

    // Tạo button
    var moretool = createButton('open-modal','<i class="mce-ico mce-i-dashicon dashicons-edit"></i>', "More tool", null, " aiautotool_btn_v1 aiautotool_btn_v11");
    var bardbtn = createButton('bard-write','<i class="mce-ico mce-i-dashicon dashicons-edit"></i>', "Gemini write", handleButtonClick, " aiautotool_btn_v1 aiautotool_btn_v12 btn_writer bard-write");

    var chatgpt = createButton('chatgpt-write','<i class="mce-ico mce-i-dashicon dashicons-edit"></i>', "Chatgpt write", handleButtonClick, " aiautotool_btn_v1 aiautotool_btn_v13 btn_bardWriter chatgpt-write");
    var yourprompt = createButton('your-prompt','<i class="fa-solid fa-robot"></i>', "Ask Assistant", handleButtonClick, " aiautotool_btn_v1 aiautotool_btn_v13 btn_askassistant ");
   var suggetstitle = createButton('btn_suggettitle','<i class="fa-solid fa-lightbulb"></i> ', "Suggest title ", null, " aiautotool_btn_v1 aiautotool_btn_v16 btn_bardWriter btn_suggettitle");
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

    titleInput.parentNode.insertBefore(moretool, titleInput.nextSibling);
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
                    domain:hostname
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




const modalContainer = document.querySelector(".aiautotool-modal-container");
        const openModalButton = document.querySelector("#open-modal");
        const closeModalButton = document.querySelector(".aiautotool-modal-close");

        openModalButton.addEventListener("click", () => {
            modalContainer.style.display = "block";
        });

        closeModalButton.addEventListener("click", () => {
            modalContainer.style.display = "none";
        });

// const modalContainer = document.querySelector(".aiautotool-modal-container");
// const openModalButton = document.querySelector("#open-modal");
// const closeModalButton = document.querySelector(".aiautotool-modal-close");
// const modalOverlay = document.querySelector(".aiautotool-modal-overlay");
// const modalContent = document.querySelector(".aiautotool-modal-content");

// openModalButton.addEventListener("click", () => {
//     modalContainer.style.visibility = "visible";
//     modalOverlay.style.opacity = "1";
//     modalContent.style.opacity = "1";
    
// });

// closeModalButton.addEventListener("click", () => {
//     modalOverlay.style.opacity = "0";
//     modalContent.style.opacity = "0";
//     setTimeout(() => {
//         modalContainer.style.visibility = "hidden";
//     }, 300); // Thời gian transition là 0.3s
// });

