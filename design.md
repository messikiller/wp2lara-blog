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

    php artisan wordpress:import[ --class=TableName]

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

======================================================================
## Api response code:

- 0:    STATUS_OK                       一切正常
- 1:    STATUS_INVALID_ARGS             参数错误
- 2:    STATUS_NO_SESSION               未登陆
- 3:    STATUS_EMPTY_SETS               记录为空
- 4:    STATUS_FAILED                   操作失败
- 5:    STATUS_DUPLICATE                重复操作
- 6:    STATUS_ACCESS_DENY              未授权
- 7:    STATUS_INVALID_SIGN             sign 不合法
- 8:    STATUS_ACCESS_RESTRICT          无权访问

======================================================================
