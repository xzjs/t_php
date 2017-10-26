# t_php
小t
## 安装步骤
1. `cd your path`
2. `git clone https://github.com/xzjs/t_php.git`
3. `cd t_php`
4. `cp .env.example .env`(就是把前面的文件复制一份，改名为后面的)
5. `composer install`(需要提前安装composer，并设置成中文镜像)
6. `npm install`(需要提前安装好npm并设置成淘宝镜像)
7. `php artisan key:generate`
8. 创建mysql数据库t_db(名字可以不一样)
9. 在.env中填写对应的数据库配置
10. `php artisan migrate`
11. 访问网页的public（http://localhost/t_php/pub/）
