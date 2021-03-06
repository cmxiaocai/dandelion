<?php include 'header.php'; ?>

<link href="../static/css/tree.css" rel="stylesheet">

<ul class="nav nav-tabs">
  <li> 
    <h3 style="margin-top:0px;">
          <small><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></small>
          www.xiaocai.name
    </h3> 
  </li>
  <li style="float:right;"><a href="#">配置</a></li>
  <li style="float:right;" class=""><a href="/dandelion.me/viewdemo/log.php">发布日志</a></li>
  <li style="float:right;" class="dropdown active">
    <a href="/dandelion.me/viewdemo/publish.php">
      发布
    </a>
  </li>
  <li style="float:right;"><a href="/dandelion.me/viewdemo/project.php">代码</a></li>
</ul>


<div class="row" style="margin-top:20px;">

        <div class="col-md-10">

              <div class="btn-group" style="margin-bottom: -1px;">
                    <a href="#" class="btn btn-xs btn-default" style="padding-left:15px;padding-right:15px;">
                        svn://svn.coc-dept.xiaocai.com/trunk
                    </a>
                    <a href="#" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" style="height:300px;overflow:scroll;overflow-x: hidden;">
                      <li style="height:30px;"><a href="#">svn://svn.coc-dept.xiaocai.com/blog/trunk</a></li>
                      <li style="margin" class="divider"></li>
                      <li style="height:30px;"><a href="#">svn://svn.coc-dept.xiaocai.com/branches/20140928_v0.1_refactor</a></li>
                      <li style="height:30px;"><a href="#">svn://svn.coc-dept.xiaocai.com/branches/20150306v2.3.0</a></li>
                      <li style="height:30px;"><a href="#">svn://svn.coc-dept.xiaocai.com/branches/Separated link</a></li>
                      <li style="margin" class="divider"></li>
                      <li style="height:30px;"><a href="#">svn://svn.coc-dept.xiaocai.com/tags/v1.0.0</a></li>
                      <li style="height:30px;"><a href="#">svn://svn.coc-dept.xiaocai.com/tags/v1.1.0</a></li>
                      <li style="height:30px;"><a href="#">svn://svn.coc-dept.xiaocai.com/tags/v1.5.1</a></li>
                      <li style="height:30px;"><a href="#">svn://svn.coc-dept.xiaocai.com/tags/v2.0.1</a></li>
                    </ul>
              </div>
              <div class="panel panel-default">
                <div class="panel-body" style="padding-top:20px;">
                      <ul id="tree" class="tree treeFolder">
                          <li>
                            <div>
                              <div class="btntree expandable"></div>
                              <div class="glyphicon glyphicon-folder-close"></div>
                              <a target="navTab" rel="column" href="#">dir1</a>
                            </div>
                          </li>
                          <li>
                            <div>
                              <div class="btntree first_collapsable"></div>
                              <div class="glyphicon glyphicon-folder-open"></div>
                              <a target="navTab" rel="column" href="#">dir2</a>
                            </div>
                          </li>
                          <li>
                            <div>
                              <div class="indent"></div>
                              <div class="btntree node expandable"></div>
                              <div class="glyphicon glyphicon-file"></div>
                              <a target="navTab" rel="column" href="#">1111.txt</a>
                            </div>
                          </li>
                          <li>
                            <div>
                              <div class="indent"></div>
                              <div class="btntree node expandable"></div>
                              <div class="glyphicon glyphicon-file"></div>
                              <a target="navTab" rel="column" href="#">2222.txt</a>
                            </div>
                          </li>
                          <li>
                            <div>
                              <div class="indent"></div>
                              <div class="btntree first_collapsable"></div>
                              <div class="glyphicon glyphicon-folder-open"></div>
                              <a target="navTab" rel="column" href="#">dir2</a>
                            </div>
                          </li>
                          <li>
                            <div>
                              <div class="indent"></div>
                              <div class="indent"></div>
                              <div class="btntree node expandable"></div>
                              <div class="glyphicon glyphicon-file"></div>
                              <a target="navTab" rel="column" href="#">2222.txt</a>
                            </div>
                          </li>
                          <li>
                            <div>
                              <div class="btntree node"></div>
                              <div class="glyphicon glyphicon-file"></div>
                              <a target="navTab" rel="column" href="#">post.txt</a>
                            </div>
                          </li>
                          
                      </ul>
                </div>
              </div>

        </div>
        <div class="col-md-2">
<div class="btn-group-vertical" style="padding-top:30px;width:100%;">
    <a href="#" class="btn btn-success disabled">发布勾选</a>
    <a href="#" class="btn btn-success">全量发布</a>
</div>
        </div>

</div>




<?php include 'footer.php'; ?>
<script type="text/javascript">
  $(function(){

    //展开
    $('#tree li .btntree').click(function(){

      var type = $(this).parent().parent().attr('ty');
      var dir2 = $(this).parent().parent().attr('dir2');
      var open = $(this).parent().parent().attr('isopen');

      if(type=='file'){
        return false;
      }

      if(open!='T'){
        $(this).next().addClass('folder_collapsable');
        $(this).next().removeClass('folder_expandable');
        $(this).addClass('first_collapsable');
        $(this).removeClass('expandable');
        $(this).parent().parent().attr('isopen','T');

        $.each($('#tree li[filename]'),function(key,val){
          var dir1 = $(val).attr('dir1');
          if(dir1==dir2){
            $(val).show();
          }
        });
      }else{
        $(this).next().addClass('folder_expandable');
        $(this).next().removeClass('folder_collapsable');
        $(this).addClass('expandable');
        $(this).removeClass('first_collapsable');
        $(this).parent().parent().attr('isopen','F');

        $.each($('#tree li[filename]'),function(key,val){
          var dir1 = $(val).attr('dir1');
          if(dir2==dir1.substr(0,dir2.length)){
            $(val).find('a').prev().addClass('folder_expandable');
            $(val).find('a').prev().removeClass('folder_collapsable');
            $(val).find('a').prev().prev().addClass('expandable');
            $(val).find('a').prev().prev().removeClass('first_collapsable');
            $(val).hide();
          }
        });
        
      }

      return false;
    });

    //选中
    $('#tree li').click(function(){
      var select = $(this).attr('is_sel');
      var dir    = $(this).attr('dir2');
      if(select=='T'){
        $(this).removeClass('ontree');
        $(this).attr('is_sel','F');
        unseldir(dir);
      }else{
        $(this).addClass('ontree');
        $(this).attr('is_sel','T');
        seldir(dir);
      }
      return false;
    });

    //展开目录
    var seldir = function(dir){
      $.each($('#tree li[filename]'),function(key,val){
        var dir1 = $(val).attr('dir1');
        if(dir==dir1.substr(0,dir.length)){
          $(val).attr('is_sel','T');
          $(val).addClass('ontree');
        }
      });
    }

    //闭合目录
    var unseldir = function(dir){
      $.each($('#tree li[filename]'),function(key,val){
        var dir1 = $(val).attr('dir1');
        if(dir==dir1.substr(0,dir.length)){
          $(val).attr('is_sel','F');
          $(val).removeClass('ontree');
        }
      });
    }

    //重置选中
    $('#btn_reset').click(function(){
      document.location.reload();
      return false;
    });

    //确认选中
    $('#btn_success').click(function(){
      var list = '';
      var slist= {};
      $.each($('#tree .ontree'),function(key,val){
        slist[key] = $(this).attr('dir2');
        var ty = $(this).attr('ty');
                if(ty=='dir'){
                   slist[key] = slist[key] + '/';
                }
      });

      $.each(slist,function(key,val){
        $.each(slist,function(key2,val2){
          if(val!=val2 && val2.substr(0,val.length)==val){
            delete slist[key2];
          }
        });
      });

      $.each(slist,function(key,val){
        list += val+'\n';
      });
      
      $('#dirlist').html(list);
      $('#ptab2').show();
      $('#ptab1').hide();
    });

    //返回
    $('#btn_exit').click(function(){
      $('#ptab1').show();
      $('#ptab2').hide();
    });

  });
</script>
