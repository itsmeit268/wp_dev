  <script>
        var scrollBottom = $(window).scrollTop() + $(window).height();
        var pt = $("#play_fixed_bottom").offset().top;
        var pt = pt -35;
        $(window).scroll(function(event){
            var st = $(this).scrollBottom();
            var ok = '';
            if(st > pt){
                $("#play_fixed_bottom").addClass('play_fixed_bottom');
                $("#play_fixed_bottom").css({"margin-bottom":"75px"});
            }else{
                $("#play_fixed_bottom").removeClass('play_fixed_bottom');
                $("#play_fixed_bottom").css({"margin-bottom":"10px"});
            }
        });
    </script>
    <script>
        var pt = $("#play_fixed").offset().top;
        var pt = pt -35;
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            var ok = '';
            if(st > pt){
                $("#play_fixed").addClass('play_fixed');
                $("#play_menu1").css({"margin-bottom":"75px"});
            }else{
                $("#play_fixed").removeClass('play_fixed');
                $("#play_menu1").css({"margin-bottom":"10px"});
            }
        });
        function selectone(idx){
            var cek = $('#id' + idx).is(":checked");
            if(cek){
                $('#id' + idx).prop('checked', false);
                $('#div'+ idx).removeClass('play_chosed');
                $('#selectAll').removeClass('button-primary');
                $('#selectAll').addClass('button');
                $('#selectAll').html('Select All');
            }else{
                $('#id' + idx).prop('checked', true);
                $('#div'+ idx).addClass('play_chosed');
                var isAllChecked = 0;
                $(".checkSingle").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){
                    $('#selectAll').removeClass('button');
                    $('#selectAll').addClass('button-primary');
                    $('#selectAll').html('Deselect All');
                }
            }
        }
        $(document).ready(function() {
            $(".play_listss").click(function(){
                var idx = $(this).attr('id');
                var cek = $('#id' + idx).is(":checked");
                alert(idx);
                if(cek){
                    $('#id' + idx).prop('checked', false);
                    $(this).removeClass('play_chosed');
                    $('#selectAll').removeClass('button-primary');
                    $('#selectAll').addClass('button');
                    $('#selectAll').html('Select All');
                }else{
                    $('#id' + idx).prop('checked', true);
                    $(this).addClass('play_chosed');
                    var isAllChecked = 0;
                    $(".checkSingle").each(function(){
                        if(!this.checked)
                            isAllChecked = 1;
                    })
                    if(isAllChecked == 0){
                        $('#selectAll').removeClass('button');
                        $('#selectAll').addClass('button-primary');
                        $('#selectAll').html('Deselect All');
                    }
                }
            });
            $("#selectAll").click(function(){
                var cla = $(this).attr('class');
                if(cla == 'button'){
                    $(this).removeClass('button');
                    $(this).addClass('button-primary');
                    $(this).html('Deselect All');
                    $(".checkSingle").each(function(e){
                        this.checked=true;
                        $('div#div'+e).addClass('play_chosed');
                    })
                }else{
                    $(this).removeClass('button-primary');
                    $(this).addClass('button');
                    $(this).html('Select All');
                    $(".checkSingle").each(function(e){
                        this.checked=false;
                        $('div#div'+e).removeClass('play_chosed');
                    })
                }
            });
            $(".checkSingle").click(function () {
                if ($(this).is(":checked")){
                    var isAllChecked = 0;
                    $(".checkSingle").each(function(){
                        if(!this.checked)
                            isAllChecked = 1;
                    })
                    if(isAllChecked == 0){
                        $('#selectAll').removeClass('button');
                        $('#selectAll').addClass('button-primary');
                        $('#selectAll').html('Deselect All');
                    }
                }else {
                    $('#selectAll').removeClass('button-primary');
                    $('#selectAll').addClass('button');
                    $('#selectAll').html('Select All');
                }
            });
            $("#getID").click(function(){
                $(".checkSingle").each(function(e){
                    if(e==0){$("#play_textID").html('');}
                    if(this.checked){
                        var appid = $("#id"+e).attr('value');
                        $("#play_textID").append(appid + "\n");
                    }
                });
                $(".play_overlay").show();
                $("#play_getID").show();
            });
            $("#toCampaign").click(function(){
                $(".checkSingle").each(function(e){
                    if(e==0){$("#play_textID").html('');}
                    if(this.checked){
                        var appid = $("#id"+e).attr('value');
                        $("#play_textID").append(appid + "\n");
                    }
                });
                $(".play_overlay").show();
                $("#play_toCampaign").show();
            });
            $("#Publish").click(function(){
                $(".checkSingle").each(function(e){
                    if(e==0){$("#play_textID").html('');}
                    if(this.checked){
                        var appid = $("#id"+e).attr('value');
                        $("#play_textID").append(appid + "\n");
                    }
                });
                $(".play_overlay").show();
                $("#play_Publish").show();
            });
        });
        function close_pop(ID){
            $("#play_notif").removeClass("play_warning");
            $("#play_notif").removeClass("play_success");
            $("#play_notif").removeClass("play_error");
            $(".play_overlay").hide();
            $("#"+ID).hide();
            return false;
        }
    </script>