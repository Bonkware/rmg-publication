/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 8/21/13
 * Time: 12:27 PM
 * To change this template use File | Settings | File Templates.
 */
function notification($_element,txt){
    notificationKill();
    $("body").append("<div class='notify_form' id='notify_"+$_element.attr("id")+"'></div>");
    $("#notify_"+$_element.attr("id")).css({
        position:"absolute",
        top:($_element.offset().top),
        left:($_element.offset().left+$_element.width()+15),
        width:"15em",
        background:"#ff0000",
        "border-radius":"7px",
        color:"#ffffff",
        border:"4px solid #fff",
        "box-shadow": "0 0 6px 1px #000000",
        height: "20px",
        "font-size":"12px",
        padding: "2px 2px 0px 10px",
        opacity: "0.6",
        overflow:"hide"
    });
    $("#notify_"+$_element.attr("id")).html(txt);
}

function notificationKill(){
    $(".notify_form").remove();
}

function trimString (str) {
    try{
        return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
    }catch(err){
        return str;
    }
}

function validateItems($_parent_id){
    notificationKill();
    var proceed=true;
    $("#"+$_parent_id+" [it_data]").each(function(){
        //I am validating
    });
    return proceed;
}

function ajax_Call(posts,page,successFunction){
    notificationKill();
    $.ajax({
        data: posts,
        datatype: "html",
        url: page,
        type: "POST",
        beforeSend: function (xhr, setl) {
            overlayCreate();
        },
        complete: function () {
            overlayKill();
        },
        success: successFunction
    });
}

function overlayWindow(call,params){
    notificationKill();
    var $_overlaid=$("html");
    if($_overlaid.length<=0) return;
    var _top=$_overlaid.offset().top, _left=$_overlaid.offset().left,
        width=$_overlaid.width(),height=$_overlaid.height();
    $_overlaid.append("<div id='ajax_loader'></div>");
    $("#ajax_loader").css(
        {
            position:"absolute",
            background: "#000",
            opacity:"0.5",
            top:_top,
            left:_left,
            width:width,
            height:height
        }
    );

    $_overlaid.append("<div id='ajax_content'>" +
        "<div style='float: right; cursor: pointer; color: #ff0000; font-weight: bolder;' id='over_close'>Close X</div>"+
        "<div id='ajax_content_in'></div></div>");

    $("#ajax_content_in").html("Start Date : XX-XX-XXXX<br>" +
        "End Date : XX-XX-XXXX<br>" +
        "Course: XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>" +
        "Description: xxxxxxxxxxxxxxxxxxxxxxxxx<br>" +
        "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>");

    $("#ajax_content").css({
        position:"absolute",
        background: "#fff",
        border:"4px solid #000",
        top:"10%",
        left:"20%",
        width:"60%",
        padding:"20px 10px 20px 10px"
    });

    $("#over_close").click(function(){
        $("#ajax_loader").remove();
        $("#ajax_content").remove();
    });
}
/***
 * Variable to contain the ID of item to be overlaid
 */
var overlaid;

/***
 * Function to create the over lay
 */
function overlayCreate(){
    notificationKill();
    var $_overlaid=$("#"+overlaid);
    if($_overlaid.length<=0) return;
    var $_parent=$_overlaid.parent();
    var _top=$_overlaid.offset().top, _left=$_overlaid.offset().left,
        width=$_overlaid.width(),height=$_overlaid.height();
    $_parent.append("<div id='ajax_load'></div>");
    $("#ajax_load").css(
        {
            position:"absolute",
            background: "#fff",
            opacity:"0.6",
            top:_top,
            left:_left,
            width:width,
            height:height,
            "border-radius":"20px"
        }
    );
    $_parent.append("<div id='ajax_image'><img id='ajax_img' src='images/loading.gif'></div>");
    var img_size=((width<50 || height<50)?(width<height)?width:(height<width)?height:width:50);
    var m_margin=((img_size==50)?25:0),
        n_top=(m_margin==0)?_top:(_top-m_margin+(height/2)),
        n_left=(m_margin==0)?_left:(_left-m_margin+(width/2));

    $("#ajax_image").css({
        position:"absolute",
        top:n_top,
        left:n_left
    });

    $("#ajax_img").css({
        width:img_size,
        height:img_size
    });
}

/**
 * Kill the overlay
 */
function overlayKill(){
    notificationKill();
    $("#ajax_load").remove();
    $("#ajax_image").remove();
}

function getCookie(c_name)
{
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1)
    {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1)
    {
        c_value = null;
    }
    else
    {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1)
        {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}

function setCookie(c_name,value,exdays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}

function deleteCookie(c_name)
{
    var now = new Date();
    now.setMonth( now.getMonth() - 1 );
    cookievalue = escape(c_name) + ";"
    document.cookie="name=" + cookievalue;
    document.cookie = "expires=" + now.toUTCString() + ";"
}
