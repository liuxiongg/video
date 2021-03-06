<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	$token = @$_SESSION["mstoken"];
	$field_name= "file" . randomkeys(8);
?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daniel.uy - Online Code Demos</title>

	<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>

    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./views/upload/css/uploader.css" rel="stylesheet" />
    <link rel="stylesheet" href="./views/upload/css/demo.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body role="document">
  <span class="fl" style="margin-left:10px;"><a href="?s=Admin/Mserver/Show" class="no">返回资源管理</a></span>
    <div class="container demo-wrapper">
      <div class="page-header">
        <h1><small>视频文件上传</small></h1>
      </div>
    
      <div class="row demo-columns">
        <div class="col-md-6">
          <!-- D&D Zone-->
          <div id="drag-and-drop-zone" class="uploader">
            <div>添加视频文件</div>
            <div class="browser">
              <label>
                <span>点击添加视频文件</span>
                <input type="file" name="upfile" id="upfile" multiple="multiple" title='点击添加文件'>
              </label>
            </div>
          </div>
          <!-- /D&D Zone -->

          <!-- Debug box -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">传送信息</h3>
            </div>
            <div class="panel-body demo-panel-debug">
              <ul id="upload_info">
              </ul>
            </div>
          </div>
          <!-- /Debug box -->
        </div>
        <!-- / Left column -->

        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">上传</h3>
            </div>
            <div class="panel-body demo-panel-files" id='upload_files'>
              <span class="demo-note">还没有选择需要上传的文件...</span>
            </div>
          </div>
        </div>
        <!-- / Right column -->
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> -->

    <script type="text/javascript" src="./views/upload/js/demo.min.js"></script>
    <script type="text/javascript" src="./views/upload/js/dmuploader.min.js"></script>

    <script type="text/javascript">
      $('#drag-and-drop-zone').dmUploader({
    	  url: '/upload?sub_path=<?php echo ($sub_path); ?>&field_name=<?php echo $field_name;?>&start=<?php echo time();?>&token=<?php echo $token;?>',
    	//url: './views/upload/upload.php?filename=myll',
    	     //url: 'http://<?php echo ($host); ?>/upload?sub_path=<?php echo ($sub_path); ?>&field_name=<?php echo $field_name;?>&start=<?php echo time();?>&token=<?php echo $token;?>',
        dataType: 'html',
        allowedTypes: '*',
        type: 'POST',
        enctype: 'multipart/form-data',
        onInit: function(){
          $.danidemo.addLog('#upload_info', 'default', '插件初始化完成');
        },
        onBeforeUpload: function(id){
          $.danidemo.addLog('#upload_info', 'default', '开始上传文件  #' + id);

          $.danidemo.updateFileStatus(id, 'default', '正在上传...');
        },
        onNewFile: function(id, file){
          $.danidemo.addFile('#upload_files', id, file);
        },
        onComplete: function(){
          $.danidemo.addLog('#upload_info', 'default', '所有文件上传完成');
        },
        onUploadProgress: function(id, percent){
          var percentStr = percent + '%';
          $.danidemo.updateFileProgress(id, percentStr);
          $.danidemo.updateFileStatus(id, 'default', '正在上传...' + percentStr);
        },
        onUploadSuccess: function(id, data){
          $.danidemo.addLog('#upload_info', '成功', '文件  #' + id + ' 上传成功');

          $.danidemo.addLog('#upload_info', 'info', '服务器返回文件信息  #' + id + ': ' + JSON.stringify(data));

          $.danidemo.updateFileStatus(id, '成功', '上传完成');

          $.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
          $.danidemo.updateFileStatus(id, 'error', message);

          $.danidemo.addLog('#upload_info', 'error', '文件  #' + id + ' 上传失败: ' + message);
        },
        onFileTypeError: function(file){
          $.danidemo.addLog('#upload_info', 'error', '文件  \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
          $.danidemo.addLog('#upload_info', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#upload_info', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
          $.danidemo.addLog('#upload_info', 'info', 'Browser not supported(do something else here!): ' + message);
        }
      });
    </script>

  </body>
</html>