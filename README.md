dandelion代码发布,持续更新中
==================


```
    location / {
        index index.php index.html index.htm;
        root /data/www/yaf-phpframe/webroot/;
    }

    if (!-e $request_filename) {
        rewrite  ^/(.*)  /index.php?$1  last;
        break;
    }
```

```
	进入composer.json所在目录执行
	composer install

	不更新库
	composer update nothing

	修改composer国内镜像
	composer.json:
	{
    "repositories": [
        {"type": "composer", "url": "http://packagist.cn/"},
        {"packagist": false}
    ]
	}
```


```
ext/yaf.ini
[yaf]
extension = yaf.so
yaf.environ=local
yaf.cache_config=0
yaf.name_suffix=1
yaf.name_separator=""
yaf.forward_limit=5
yaf.use_namespace=1
yaf.use_spl_autoload=0
yaf.lowcase_path=1

ext/svn.ini
[svn]
extension = svn.so
```

```
server {
    listen       80;
    server_name  dandelion.me;
    location / {
        index index.php index.html index.htm;
        root /data/wwwroot/dandelion.me/webroot;
    }

    location ~ \.php$ {
        root /data/wwwroot/dandelion.me/webroot;
        fastcgi_pass  127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME /data/wwwroot/dandelion.me/webroot$fastcgi_script_name;
        include       fastcgi_params;
    }

    if (!-e $request_filename) {
        rewrite  ^/static/(.*)   /static/$1 last;
        rewrite  ^/(.*)  /index.php?$1  last;
        break;
    }

    access_log /data/log/ng.access.log;
    error_log /data/log/ng.error.log;
}
```