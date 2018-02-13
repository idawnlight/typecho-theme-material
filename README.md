# Material 原质

>原之质，物之渊

![](https://ooo.0o0.ooo/2017/06/29/5954eabb468a2.png)


## Contents 目录

- [General 概括](#general-概括)
- [Feature 特性](#feature-特性)
- [Demo 演示](#demo-演示)
- [Setup 设置](#setup-设置)
- [Preview 预览](#preview-预览)
- [Contributing 贡献](#contributing-贡献)
- [License 许可证](#license-许可证)


## General 概括

- Author 作者：Viosey
- Maintainer 维护者：黎明余光
- Version 版本：3.2.0
- Compatibility 兼容：PHP 5.4+, MySQL, Typecho 1.0+

## Feature 特性

- 侧边栏含有有关博客的详细信息以及相关操作
- 极其丰富的自定义设置
- 自带中英文界面语言
- 自带多种功能与特效
- PanGu.php 中英文之间自动添加空格
- 使用 JavaScript 实现的更新检测
- localstorage 强缓存策略

## Demo 演示

Experience the Material theme in live: [typecho-theme-material Demo](https://blog.lim-light.com)

体验 Material 主题: [typecho-theme-material 演示](https://blog.lim-light.com)

## Setup 设置

- [Github 地址](https://github.com/idawnlight/typecho-theme-material)，点击 "Download ZIP" 下载，解压后将文件夹**改名为 "Material"**(或其他) 后上传到 `/usr/themes`，并启用主题
- 下载最新文件 然后覆盖原文件即可更新主题, 部分新增加的功能需要到后台开启才会生效 (建议更新后先切换为其他主题, 再切换回该主题)。否则有可能会导致莫名其妙的 bug...
- 在 "设置外观" 中打造一个属于你自己的博客
- 关于文章缩略图
	- 文章缩略图为文章内第一张图片，自定义字段 “图片地址” 优先级最高
	- 缩略图支持 Markdown 格式, HTML 格式以及附件形式, Markdown 格式为 `![图片描述](图片链接)` 。
	- 如果想要自定义某篇文章的缩略图, 但是不想让该图片在文章中出现, 则可以使用该格式 `<img src="图片链接" width="0px" /> ` 
- 首页文章概览默认最大输出80个字符, 可手动添加截断符 `<!--more-->` 控制输出
- 在侧边栏中使用友情链接, 需安装此友情链接插件  [typecho-links-material](https://github.com/idawnlight/typecho-links-material)



## Preview 预览


![](https://ooo.0o0.ooo/2017/09/09/59b2c51075282.png)

![](https://ooo.0o0.ooo/2017/09/09/59b2c51110ac8.png)

![](https://ooo.0o0.ooo/2017/09/09/59b2c510dbb97.png)


## Contributing 贡献

All kinds of contributions (enhancements, new features, documentation & code improvements, issues & bugs reporting) are welcome.

欢迎各种形式的贡献，包括但不限于优化，添加功能，文档 & 代码的改进，问题和 bugs 的报告。期待您的 `Pull Request`。


## License 许可证

Open sourced under the GPL v3.0 license.

根据 GPL V3.0 许可证开源。
