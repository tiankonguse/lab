 <?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
$title = "latex 学习笔记";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>
<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse &amp; vincent 的实验室 </a>
		</div>
	</header>

	<section>
		<div class="container">
			<h3>latex 学习笔记</h3>
			<div>
				<pre>
	LATEX是一种排版系统,它非常适用于生成高印刷质量的科技和数学类文档。
	这个系统同样适用于生成从简单的信件到完整书籍的所有其他种类的文档。
	LATEX 使用 TEX 作为它的格式化引擎。
	
	对大多数计算机,从个人计算机(PC)和 Mac 到大型的 UNIX 和 AVMS 系统,LATEX 都有适用版本。
	
	
LaTeX与传统的字处理软件有下列两个基本的不同:

1.一般地, 使用容易学的LaTeX的标记语言来写LaTeX文档, 而不是使用图形界面来确定格式

TEX
    由Donald E. Knuth ( 高德纳) 编写的计算机程序
    TEX :由三个希腊字母组成,发音为“tech”
    最初用于出版工业的数字印刷设备
    用于文章和数学公式的排版


LATEX
    发音为’Lay-Tech’
    是一个基于TeX的程序包
    提供了预先定义好的专业页面设置
    预定义的页面：article格式， paper格式等
    LATEX 是一个宏包,其目的是使作者能够利用一个预先定义好的专业页面设置,从而得以高质量地排版和打印他们的作品。
    LATEX 最早是由 Leslie Lamport[1] 编写的,并使用 TEX 作为其排版系统引擎。

    
CTEX
    是CTEX 中文套装的简称,
    包括GSview,WinEdt 等常用工具
    对其中的中文支持部分进行了配置,使得安装后马上就可以使用中文。




LaTeX的优点
    让你的文档足够漂亮以应对各种场合
    可以容易地编辑公式,生成脚注,索引,目录,参考文献等复杂结构
    可以免去很多费力不讨好的页面设计工作
    有大量的模版可以借鉴,很容易套用
    免费,并且有很好的可移植性


LaTeX的缺点

    不适合排版非结构化的文档
    不是所见即所得的
    开发全新的版面是很困难的


如何最终形成一个.PDF文件
    编辑源文件 .tex
    运行LaTeX编译源文件,形成 .dvi
    dvi生成 .pdf

基本的语法规则
    空格:连续的空格被认为只有一个 用~表示空格
    有些特殊的符号是不能直接使用的:$ & % # _ { } 应该写成 \$ \& \% \# \_ \{ \}
    断行:\\
    分段:文字之后的一个空行是段落结束的标志
    注释:%之后都文字都是注释,是无效的语句
    引号:左右引号不同
    LaTeX的命令:以 "\" 开始

插入数学公式
    $a^2+b^2=c^2$
    \[a^2+b^2=c^2\]
    \begin{equation}a^2+b^2=c^2\end{equation}

插入表格
    \begin{table}
    \begin{tabular}{c|rl}
    \hline
    data1 & data2 & data3
    \hline
    \end{tabular}
    \caption{something}
    \end{table}


插入图形
    最常用的是 .eps 格式的图形

插入参考文献


空白距离
    LATEX 将空格和制表符等空白字符视为相同的空白距离(space)。
    多个连续的空白字符等同为一个空白字符。
    在 LATEX 文件中,每行开始的空白字符将被忽略,而单个的回车符被视为一空格。
    
    LATEX 使用空行来结束段落,两行文本中的空行标志上一段落的结束和新段落的开始。
    如同空格一样,多个空行所起的作用和一个空行的作用是相同的。

特殊字符
    下面的这些字符是 L TEX 的保留字符
    #  $  %  ^    &  _  {   }  ~ \
    当然,这些字符前面加上反斜线,就可以在文本中得到它们。
    \# \$ \% \^{} \& \_ \{ \} \~{}
    
    另外一些符号可以由特殊的命令或作为重音命令得到。
    反斜线 \ 不能够通过在其前添加另外的反斜线来得到,相反的,\\ 是一个用来断行的命令。
    例如 这个$\backslash$ 可以生成 \。


LATEX 命令
    LATEX 命令(commands)是大小写敏感的并有下面两种格式:
        以一反斜线 \ 开始,加上只包含字母字符命令名组成。
        命令名后的空格符、数字或其它非字母字符标志该命令的结束。
        
        由一反斜线和一特殊字符组成。

    LATEX 忽略命令后面的空格。
    如果你希望在命令后面得到一空格,可以在命令后面加上 {} 和一个空格,或者加上一个特殊的空白距离命令。
    {} 将阻止 LATEX 吞噬掉命令后面的空格。

    许多命令需要一个参数(parameter)并用一对大括号(curly braces){ }将其括起来置于命令名称的后面。
    也有一些命令支持用方括号(square brace)括起来的可选参数。

注释
    当 LATEX 在处理源文件时,如果遇到一个百分号字符 %,那么 LATEX将忽略 % 后的该行文本,分行符以及下一行开始的空白字符。
    % 也可以用来分割不允许有空格或分行的较长输入文本。
    
    如果需要较长的注释,你可以使用 verbatim 宏集所提供的 comment 环境。
    当然,你需要在源文件的导言区里加上命令 \usepackage{verbatim}。


源文件的结构
    LATEX 需要所处理的源文件遵从一定的结构
    每个 LATEX 文档必须以如下的命令开始:\documentclass{...}
    使用如下的命令来调入一些宏集: \usepackage{...}
    开始文档:\begin{document}
    文档结束:\end{document}


文档类
    当 LATEX 处理源文件时,首先需要知道的是作者所要创建的文档类型。
    该信息可以通过命令 \documentclass 来提供给 LATEX。
    \documentclass[options]{class}
    这里 class 指明了所要创建的文档类型。

article 排版科技期刊、短报告、程序文档、邀请函等。
report 排版多章节的长报告、短篇的书籍、博士论文等。
book 排版书籍。
slides 排版幻灯片。其中使用了较大的 sans serif 字体。也可以考虑使用 FoilTEX 来得到相同的效果。

    文档类的属性可以通过选项(options)来加以调节,不同的选项用逗号隔开。

10pt, 11pt, 12pt  设置文档所使用的字体的大小。如果没有声明任何选项,缺省将使用 10pt 字体。
a4paper, letterpaper, . . . 定义纸张的大小,缺省的设置为letterpaper。此外,还可以使用a5paper,b5paper,executivepaper 和 legalpaper。
fleqn 设置该选项将使数学公式左对齐,而不是中间对齐。
leqno 设置该选项将使数学公式的编号防置于左侧。
titlepage, notitlepage 指定是否在文档标题(document title)后开始一新页。article 文档类缺省不开始新页,而 book 文档类则相反。
onecolumn, twocolumn 指定 L TEX 以单列(one column)或双列(two column)方式排版文档。
twoside, oneside 指定 L TEX 排版的文档为双面或单面格式。article 和 report 缺省使用单面格式,而 book 则缺省使用双面格式。需要注意的是该选项仅作用于文档的式样。twoside 选项不会通知你的打印机让以得到双面的打印输出。
openright, openany 此选项决定新的章是仅仅在右边页(奇数页)还是在下一可用页开始。该选项对 article 文档类不起作用,因为该类中并没有定义“章”(Chapter)。report 类中新的一章开始于下一可用页,而 book 类中新的一章总是开始于右边页。


宏包
    调入宏包使用如下的命令:\usepackage[options]{package}
    这里 package 是宏包的名称,options 是用来触发宏包中的特殊功能的一组关键词。


各类 LTEX 文件
    .tex LATEX 或 TEX 源文件。可以用 latex 处理。
    sty LATEX 宏包文件。可使用命令 \usepackage 将其加载到你的 LATEX 文件中。
    .dtx 文档化 TEX 文件。这也是 LATEX 宏包发布的主要格式。通过处理一个.dtx 文件就可以得到该 LATEX 宏包中所包括的宏代码文档。
    .ins 为相应的 .dtx 文件的安装文件。如果你在网络上下载了一 LATEX 宏包,你通常会发现会有一个 .dtx 和一个 .ins 文件。使用 LATEX 对 .ins文件进行处理,可以从 .dtx 文件中提取出宏包。
    .dvi 与设备无关文件。这是 LATEX 编译运行的主要结果。你可以使用 DVI预览器浏览其内容,或者使用像 dvips 这样的应用程序输出到打印机。
    .log 记录了上次编译运行时的详细信息。
    .toc 存储了所有章节标题。该文件将在下次编译运行时被读入并生成目录。
    .lof 类似 .toc 文件,可生成图形目录。
    .lot 类似 .toc 文件,可生成表格目录。
    .aux 另一个用来向下次编译运行传递信息的辅助文件。除了其它信息外,.aux 文件通常包含交叉引用信息。
    .idx 如果你的文件中包含有索引,L TEX 使用此文件存储所有的索引词条。此文件需要使用 makeindex 处理。
    .ind 经过处理后的 .idx 文件。可在下次编译运行时加入到你的文档中。
    .ilg 运行 makeindex 时生成的记录文件。



页面式样
    LATEX 支持三种预定的页眉、页脚(header/footer)格式,称为页面式样(page styles)。
    命令\pagestyle{style}中的参数定义了所使用页面式样。
    
plain 页眉为空,页脚由居中的的页码组成。这是默认的页面式样。
headings 页眉由当前的章节标题和页码组成,页脚为空。(这是本文档所使用的页面式样)
empty 设置页眉、页脚均为空。


大型文档
    当处理大型文档时,最好将源文件分成几个部分。LATEX 有两条命令来处理这种情况。

    \include{filename}
    \includeonly{filename,filename,. . . }
	
				</pre>
				
				
				
			</div>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>
