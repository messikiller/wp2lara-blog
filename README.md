# wp2lara-blog

基于 laravel 5.2 开发的轻量级个人博客，支持从 wordpress 博客中一键导入数据到 laravel 数据库。

### 环境： laravel 5.2 + zui + jquery

### 安装：

进入项目目录：

    cd /path/to/project

安装第三方依赖包：

    composer install

迁移生成数据库：

    php artisan migrate

安装前端依赖，推荐使用淘宝提供的 cnpm 工具代替 nodejs 官方提供的 npm：

    cnpm install

编译资源：

    gulp

### seed 植入虚构数据：

    php artisan db:seed

或者在迁移数据库时候植入：

    php artisan migrate:refresh --seed

### 从 wordpress 中导入数据

1) 首先需要配置 .env 中 wordpress 源数据库的连接信息

```
DB_WP_HOST=127.0.0.1        //主机地址
DB_WP_PORT=3306             //端口
DB_WP_DATABASE=homestead    //数据库名称
DB_WP_USERNAME=homestead    //连接用户
DB_WP_PASSWORD=secret       //连接密码
DB_WP_PREFIX=wp_            //数据表前缀
```

2) 运行导入命令：

```
php artisan wordpress:import
```

支持从 wordpress 中导入的数据有：

- 文章信息

- 标签

- 分类

- 评论（开发中……）

- 友情链接（开发中……）

- 其它（开发中……）`
