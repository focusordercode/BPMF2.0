# manage-system #
基于Vue.js 2.x系列 + Element UI 的工作管理系统解决方案。
[English document](https://github.com/lin-xin/manage-system/blob/master/README_EN.md)

## 前言 ##
    之前公司使用的是传统模式的开发模式，只是简单的使用了vue1.0版本的一些api，并未为使用vue.js的单页面（spa）模式。
    为了满足开发需求将采用vue2.0 + element ui进行项目开发，借助node的开发环境以及利用vue-cli生成项目的通用模板，然后安装所需要的依赖，以及一些个性化的修改就可以进行开发了，因此需要安装node以及用node进行全局安装打包工具webpack。
    
      该项目主要是用来开发一套使用于公司销售部工作的一套流程系统，涉及到一些表单以及流程的设计。基于vue.js,使用vue-cli脚手架快速生成项目目录，引用Element UI组件库，方便开发快速简洁好看的组件。分离颜色样式，支持手动切换主题色，而且很方便使用自定义主题色。

## 功能 ##
- [x] Element UI
- [x] 登录/注销
- [x] 表格
- [x] 表单
- [x] 支持切换主题色 :sparkles:


## 目录结构介绍 ##

	|-- build                            // webpack配置文件
	|-- config                           // 项目打包路径
	|-- src                              // 源码目录
	|   |-- components                   // 组件 
	|       |-- common                   // 公共组件
	|           |-- Header.vue           // 公共头部，包含注销
	|           |-- Home.vue           	 // 公共路由入口（使用的是element和vue-router相结合的路由模式）
	|           |-- Sidebar.vue          // 公共左边栏
	|		|-- page                   	 // 主要路由页面
	|           |-- FormDesign           // 表单设计模块
    |               |-- DesignForm.vue       // 表单详情以及组件列表模块
    |               |-- editForm.vue         // 表单组件修改模块
    |               |-- FormDesign.vue       // 组件类型选择模块
    |               |-- FormInfo.vue         // 组件编辑生成模块
    |               |-- home.vue             // 表单列表模块
    |           |-- workeOrder           // 工单模块
    |               |-- details.vue          // 工单详情模块模块
    |               |-- home.vue             // 表单列表模块
    |               |-- testDesk.vue         // 工单任务台
	|           |-- BaseTable.vue        // 基础表格
	|           |-- Login.vue          	 // 登录
	|           |-- Markdown.vue         // markdown组件
	|           |-- MixCharts.vue        // 混合图表
	|           |-- Readme.vue           // 自述组件
    |           |-- rules.vue            // 编号模块
	|           |-- Upload.vue           // 图片上传
	|           |-- VueEditor.vue        // 富文本编辑器
	|           |-- VueTable.vue         // vue表格组件
	|   |-- App.vue                      // 页面入口文件
	|   |-- main.js                      // 程序入口文件，加载各种公共组件
	|-- .babelrc                         // ES6语法编译配置
	|-- .editorconfig                    // 代码编写规格
	|-- .gitignore                       // 忽略的文件
	|-- index.html                       // 入口html文件
	|-- package.json                     // 项目及工具的依赖配置文件
	|-- README.md                        // 说明


## 安装步骤 ##

	git clone https://github.com/focusordercode/BPMF2.0.git	// 把模板下载到本地
	cd BPMF2.0/WebPage										// 进入模板目录
	npm install												// 安装项目依赖，等待安装完成之后

## 本地开发 ##

	// 开启服务器，浏览器访问 http://localhost:8080
	npm run dev

## 构建生产 ##

	// 执行构建命令，生成的dist文件夹放在服务器下即可访问
	npm run build

## 组件使用说明与演示 ##

### element-ui ###
一套基于vue.js2.0的桌面组件库。访问地址：[element](http://element.eleme.io/#/zh-CN/component/layout)

## 配置config，连接后台接口 ##

    |-- dev: {
    |        env: require('./dev.env'),
    |    port: 8080,
    |   autoOpenBrowser: true,
    |    assetsSubDirectory: 'static',
    |    assetsPublicPath: '/',
    |    proxyTable: {                                         // 配置接口公共地址              
    |        '/makesCanton':{                                  // 接口地址替换的字段（最好是替换成服务器上后台接口的文件名字，一般名字都是api）
    |            target:'http://xxx.xxx.x.xxx/makesCanton',
    |            changeOrigin:true,
    |            pathRewrite:{
    |                '^/makesCanton':''
    |            }
    |        }
    |--  },
        
## 数据处理采用axios ## 
	
    安装 axios
    npm install axios （安装的最新版本，也可以安装指定版本）

    引用axios
    import axios from 'axios';
    Vue.prototype.$axios  = axios;

    使用axios

    let self = this;
        this.$axios.post('/makesCanton/ApplyVps/getCustom',qs.stringify({
            key:self.$cookie.get('oKey'),
            user_id:self.$cookie.get('token'),
            name:self.orderForm.clientName,
            })).then( (res) =>{
            if(res.data.status == 100){
                self.restaurants = res.data.value;
            }else if(res.data.status == 1011){
                self.$message({
                    type: 'success',
                    message: '权限不足，请与管理员联系'
                });
            }else if(res.data.status == 1012){
                self.$router.push('/login');
            }
        })
    注意：当初测试数据接口时，数据总是传送和获取不到，具体原因也不太清楚，咨询大佬后甩给我一个qs，安装成功后总算可以，
    期间好几个小时的满百度找解决方案就不赘述了。具体使用方法参考上面内容，需要使用qs的页面需要引用qs
    


### 二、如何切换主题色呢？ ###

第一步：打开 src/main.js 文件，找到引入 element 样式的地方，换成浅绿色主题。

```javascript
import 'element-ui/lib/theme-default/index.css';    // 默认主题
// import '../static/css/theme-green/index.css';       // 浅绿色主题
```

第二步：打开 src/App.vue 文件，找到 style 标签引入样式的地方，切换成浅绿色主题。

```javascript
@import "../static/css/main.css";
@import "../static/css/color-dark.css";     /*深色主题*/
/*@import "../static/css/theme-green/color-green.css";   !*浅绿色主题*!*/
```

第三步：打开 src/components/common/Sidebar.vue 文件，找到 el-menu 标签，把 theme="dark" 去掉即可。

## 项目截图 ##
### 默认皮肤 ###

![Image text](https://github.com/lin-xin/manage-system/raw/master/screenshots/wms1.png)

### 浅绿色皮肤 ###

![Image text](https://github.com/lin-xin/manage-system/raw/master/screenshots/wms2.png)
