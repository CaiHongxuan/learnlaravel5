<?php

    $contents = fopen("http://php.net/favicon.ico", 'rb');

    $disk = Storage::disk('qiniu');
    $aaa = $disk->put('file.log', 'Prepended Text');
    $bool = $disk->put('file.ico', $contents); //上传文件
    var_dump($aaa);
    var_dump($bool);
    fclose($contents);
    // $img = $disk->get('item.png'); //获取文件内容
    // $file = fopen('img.png', 'wb');
    // fwrite($file, $img);
    // file_put_contents('filename.png', $img);
    // fclose($file);
    die;

    $disk = Storage::disk('qiniu');
    $disk->put('file.jpg', $contents); //上传文件
    $disk->exists('file.jpg'); //文件是否存在
    $disk->get('file.jpg'); //获取文件内容
    $disk->prepend('file.log', 'Prepended Text');   //附加内容到文件开头
    $disk->append('file.log', 'Appended Text');     //附加内容到文件结尾
    $disk->delete('file.jpg'); //删除文件
    $disk->delete(['file1.jpg', 'file2.jpg']);
    $disk->copy('old/file1.jpg', 'new/file1.jpg'); //复制文件到新的路径
    $disk->move('old/file1.jpg', 'new/file1.jpg'); //移动文件到新的路径

    $size = $disk->size('file1.jpg'); //取得文件大小
    $time = $disk->lastModified('file1.jpg'); //取得最近修改时间(UNIX)
    $files = $disk->files($directory); //取得目录下所有文件
    $files = $disk->allFiles($directory); //这个没实现。。。
    $directories = $disk->directories($directory);      //这个也没实现。。。
    $directories = $disk->allDirectories($directory);   //这个也没实现。。。
    $disk->makeDirectory($directory); //生成目录
    $disk->deleteDirectory($directory); //删除目录，包括目录下所有子文件子目录

    $disk->getDriver()->uploadToken('file.jpg'); //获取上传Token
    $disk->getDriver()->downloadUrl('file.jpg'); //获取下载地址
    $disk->getDriver()->downloadUrl('file.jpg', 'https'); //获取HTTPS下载地址
    $disk->getDriver()->privateDownloadUrl('file.jpg'); //获取私有bucket下载地址
    $disk->getDriver()->privateDownloadUrl('file.jpg', 'https'); //获取私有bucket的HTTPS下载地址
    $disk->getDriver()->imageInfo('file.jpg'); //获取图片信息
    $disk->getDriver()->imageExif('file.jpg'); //获取图片EXIF信息
    $disk->getDriver()->imagePreviewUrl('file.jpg', 'imageView2/2/w/200/h/200'); //获取图片预览URL
    $disk->getDriver()->persistentFop('file.flv', 'avthumb/m3u8/segtime/40/vcodec/libx264/s/320x240'); //执行持久化数据处理
    $disk->getDriver()->persistentFop('file.flv', 'fop', '队列名'); //使用私有队列执行持久化数据处理
    $disk->getDriver()->persistentStatus($persistent_fop_id); //查看持久化数据处理的状态

?>
