<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticleTableSeeder extends Seeder
{
     public function run()
    {
        DB::table('articles')->insert([
            ['typeid'=>'1',
             'author'=>'admin',
             'title'=>'Cloud9 安装laravel5.1',
             'content'=>'**1、首先创建自己的Cloud9的应用workspace，选择php环境**
**2、删除里面的生成的文件，**

```
rm README.md php.ini hello-world.php
```
**3、安装composer**

```
curl -sS https://getcomposer.org/installer | php
```

**4、将composer.phar 移动到bin目录下，方便全局使用**

```
sudo mv composer.phar /usr/local/bin/composer 
```
**5、创建laravel项目**

> composer create-project laravel/laravel 项目名字 --prefer-dist

**6、把生成的laravel项目的子文件移动到上一次目录里去，然后删除生成的laravel项目文件**

> shopt -s dotglob 
> mv laravel/* ./        #laravel指的是生成laravel项目所有文件移动上一层目录 
> rm -rf laravel     #删除掉生成的aravel项目

**7、在Cloud9里apache指定public**

> sudo nano /etc/apache2/sites-enabled/001-cloud9.conf

```
// Change this line
DocumentRoot /home/ubuntu/workspace
改成下面的这个样子
// To following
DocumentRoot /home/ubuntu/workspace/public
```

',
'tags'=>'cloud9,laravel5','type'=>'0','keyword'=>'','desc'=>'1、首先创建自己的Cloud9的应用workspace，选择php环境 2、删除里面的生成的文件，rm README.md php.ini hello-world.php3、安装composercurl -sS https://getcomposer.org/installer | php4、将composer.phar 移动到bin目录下，方便全局使用sudo mv composer.phar...','click_number'=>'0','is_discuss'=>'0','userid'=>'1','created_at'=>'2015-11-11 03:01:04'],
        
['typeid'=>'2',
 'author'=>'jew',
 'title'=>'Laravel 在windows安装',
 'content'=>'Windowns Composer 安装 1、下载 Windowns 下的 Composer 安装包：官网下载页面 或者点击 下载安装文件，进行安装。  2、然后，就没然后了，你已经装好了。Composer 自身需要升级版本的时候你只需要在命令行（运行：cmd）输入 composer self-update Composer 装好后，我们就开始装 Laravel 吧！ ...',
 'tags'=>'laravel5,win7','type'=>'0','keyword'=>'','desc'=>'Windowns Composer 安装 1、下载 Windowns 下的 Composer 安装包：官网下载页面 或者点击 下载安装文件，进行安装。  2、然后，就没然后了，你已经装好了。Composer 自身需要升级版本的时候你只需要在命令行（运行：cmd）输入 composer self-update Composer 装好后，我们就开始装 Laravel 吧！ ...','click_number'=>'0','is_discuss'=>'0','userid'=>'2','created_at'=>'2015-11-11 03:01:04']        
        
        ]);
    }
}
