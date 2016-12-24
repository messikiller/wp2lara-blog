- UI

main-light-blue: #3498db

title: #333333

content: #999999

light-gray(border): #e7ebee

dark-gray: #99a1a7

hr-gray: #e5e5e5

background-gray: #eff3f5

footer-gray: #a8a8a8

box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

- 初始化数据库并填充测试数据：

    php artisan migrate:refresh --seed

- wordpress 数据库导入：

    php artisan db:seed --class=WordpressSeeder

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
