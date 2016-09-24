var myPlaylist = null;
$(document).ready(function () {

  myPlaylist = new jPlayerPlaylist({
    jPlayer: "#jplayer_N",
    cssSelectorAncestor: "#jp_container_N"
  }, [
    {
      title:"test",
      artist:"test_song",
      mp3:"/source/test.mp3",
      poster: "images/m0.jpg"
    }
   
  ], {
    playlistOptions: {
        enableRemoveControls: true,
        //自动播放
      autoPlay: false
    },
    swfPath: "js/jPlayer",
    supplied: "webmv, ogv, m4v, oga, mp3",
    smoothPlayBar: true,
    keyEnabled: true,
    audioFullScreen: false
  });
  
  $(document).on($.jPlayer.event.pause, myPlaylist.cssSelector.jPlayer, function () {  
    $('.musicbar').removeClass('animate');
    $('.jp-play-me').removeClass('active');
    $('.jp-play-me').parent('li').removeClass('active');
  });

  $(document).on($.jPlayer.event.play, myPlaylist.cssSelector.jPlayer, function () {  
    $('.musicbar').addClass('animate');
  });

  $(document).on('click', '.jp-play-me', function (e) {
    e && e.preventDefault();
    var $this = $(e.target);
    if (!$this.is('a')) $this = $this.closest('a');
    $('.jp-play-me').not($this).removeClass('active');
    $('.jp-play-me').parent('li').not($this.parent('li')).removeClass('active');
    $this.toggleClass('active');
    $this.parent('li').toggleClass('active');
    if( !$this.hasClass('active') ){
      myPlaylist.pause();
    }else{
      var i = Math.floor(Math.random() * (1 + 7 - 1));
      myPlaylist.play(i);
    }
    
  });

    //点击是播放切换
  $(document).on('click', '.jp-playlist-item', function () {
      if($(this).hasClass('.jp-playlist-current'))
      {
          $(this).removeClass('.jp-playlist-current');
      }else
      {
          $(this).addClass('.jp-playlist-current');
      }

  });



  // video

  $("#jplayer_1").jPlayer({
    ready: function () {
      $(this).jPlayer("setMedia", {
        title: "Big Buck Bunny",
        m4v: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.m4v",
        ogv: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.ogv",
        webmv: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.webm",
        poster: "images/m41.jpg"
      });
    },
    swfPath: "js",
    supplied: "webmv, ogv, m4v",
    size: {
      width: "100%",
      height: "auto",
      cssClass: "jp-video-360p"
    },
    globalVolume: true,
    smoothPlayBar: true,
    keyEnabled: true
  });

});

//添加歌曲
function add_music(json)
{
    myPlaylist.add(json);

}

//子页面试听列表
function sub_PlayMusic(json)
{
   //清空所有列表
    myPlaylist.remove();
    //添加歌曲
    myPlaylist.add(json); 
    //播放最后一首
    myPlaylist.play(-1);

}
//子页面试听列表
function index_PlayMusic(json) {
    //清空所有列表
    myPlaylist.remove();
    //添加歌曲
    myPlaylist.add(json);
    //播放最后一首
    myPlaylist.play(-1);
   
    wokam_content.window.indexplay();

}


//子页面播放事件
function sub_play(musicid)
{
    //获取歌曲信息
    $.ajax({
        type: "POST",
        url: "/index.php/songapi/songinfo",
        data: {
            musicid: musicid
        },
        dataType: "json",
        beforeSend: function () {
     
        },
        success: function (data) {
          

            if (data.status > 0)
            {
                //错误提示
                alert(data.message);
                //回调函数
            } else
            {
                sub_PlayMusic(data.data);
            }
     
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
        }
    });
}

function index_play(songid)
{
   
    //获取歌曲信息
    $.ajax({
        type: "POST",
        url: "/index.php/songapi/songinfo",
        data: {
            musicid: songid
        },
        dataType: "json",
        beforeSend: function () {

        },
        success: function (data) {


            if (data.status > 0) {
                //错误提示
                alert(data.message);
                //回调函数
            } else {
                index_PlayMusic(data.data);
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('ajax请求错误');
        }
    });
}

//子页面暂停事件
function sub_pause(musicid) {
    myPlaylist.pause();
}


//添加喜欢的歌曲
function sub_addlikesong(songid,sognname)
{

    $.ajax({
        type: "POST",
        url: "/index.php/songapi/addlikesong",
        data: {
            songid: songid
        },
        dataType: "json",
        beforeSend: function () {

        },
        success: function (data) {         
            if (data.status > 0) {
                //错误提示
                alert(data.message);
                //回调函数
            } else {
                //添加我的喜欢
                //如果未添加则添加
                if ($('#index_likesong a[data-songid="' + songid + '"]').length <= 0) {                 
                    $('#index_likesong').append('<li class=""> <a href="javascript:void();" class="auto" data-songid="' + songid + '"><i class="fa fa-angle-right text-xs"></i>  <span>' + sognname + '</span>   </a> </li>');
                    //重新绑定事件--live不可用-待修改
                    $('#index_likesong li').on('click', function () {
                        $_songid = $(this).children('a').attr("data-songid");
                        index_play($_songid);
                    });
                }
            }          
           
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
        }
    });
}

//添加喜欢的歌曲
function sub_dellikesong(songid) {
    $.ajax({
        type: "POST",
        url: "/index.php/songapi/dellikesong",
        data: {
            songid: songid
        },
        dataType: "json",
        beforeSend: function () {
        },
        success: function (data) {
            if (data.status > 0) {
                //错误提示
                alert(data.message);
                //回调函数
            } else {
                //删除我喜欢的成功
            }
            $('#index_likesong a[data-songid="' + songid + '"]').parent('li').remove();
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
        }
    });

}


