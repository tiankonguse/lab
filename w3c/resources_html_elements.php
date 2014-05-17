<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$titlee = "HTML and HTML5 Elements Reference List";
$titlec = "HTML and HTML5 元素参考列表";
$title = $titlee . " | " . $titlec;
$h1title = "tiankonguse 的实验室 ";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/main.css">
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>
<script src="js/text.js"></script>
</head>
<body>
    <header>
        <div class="title">
        <h1><a href="<?php echo MAIN_DOMAIN; ?>"><?php echo $h1title;  ?> </a></h1>
        </div>
    </header>
    <section>
        <div class="container">
            <h2>
    <div class="wrap-out">
                <div class="wrap-in">
                    <div class="top"><?php echo $titlee;?></div>
                    <div class="bottom"><?php echo $titlec;?></div>
                </div>
</div>
            </h2>
            <div class="copy">
                    <table class="resource_table">
                        <caption>
    <div class="wrap-out">
        <div class="wrap-in">
            <div class="top">Root Element</div>
            <div class="bottom">根元素</div>
        </div>
    </div>
</caption>
                          <thead>
                            <tr>
                              <th>Tag</th>
                              <th>Description</th>
                            </tr>
                          </thead>
                            <tbody><tr>
<td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/html" title="<html>">&lt;html&gt;</a></code></td> 
<td>
    <div class="wrap-out">
        <div class="wrap-in">
            <div class="top">Represents the root of an HTML or XHTML document. All other elements must be descendants of this element.</div>
            <div class="bottom">代表 HTML 或 XHTML 文档的根。所有其他的元素必须是这个元素的子节点。</div>
        </div>
    </div>
</td>
                            </tr>
                        </tbody></table>

                        <table class="resource_table">
                        <caption>
    <div class="wrap-out">
        <div class="wrap-in">
            <div class="top">Document Metadata</div>
            <div class="bottom">文档元信息</div>
        </div>
    </div>
</caption>
                          <thead>
                            <tr>
                              <th>Tag</th>
                              <th>Description</th>
                            </tr>
                          </thead>
                            <tbody><tr>
<td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/head" title="<head>">&lt;head&gt;</a></code></td>
<td>
    <div class="wrap-out">
        <div class="wrap-in">
            <div class="top">Represents a collection of metadata about the document, including links to or definitions of scripts and style sheets.</div>
            <div class="bottom">代表关于这个文档的元信息的集合, 包括 链接或定义的脚本和样式 </div>
        </div>
    </div>
</td>
                            </tr>
                            <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/title" title="<title>">&lt;title&gt;</a></code></td>
                              <td>
<div class="wrap-out">
<div class="wrap-in">
<div class="top">Defines the title of the document, shown in a browser’s title bar or on the page’s tab. It can only contain text and any contained tags are not interpreted.</div>
<div class="bottom">定义文档的标题，在浏览器的标题栏或页面选卡上显示。它只能包含文本和任何非解释性标签</div>
</div>
</div>
</td>
                            </tr>
                            <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/base" title="<base>">&lt;base&gt;</a></code></td>
                              <td>
<div class="wrap-out">
<div class="wrap-in">
<div class="top">Defines the base URL for relative URL in the page.</div>
<div class="bottom">定义相对于这个页面的 根 URL.</div>
</div>
</div>
</td>
                            </tr>
                            <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/link" title="<link>">&lt;link&gt;</a></code></td>
                              <td>
<div class="wrap-out">
<div class="wrap-in">
<div class="top">Used to link JavaScript and external CSS with the current HTML document.</div>
<div class="bottom">当前 HTML 文档用来链接 JavaScript 和 外部 CSS </div>
</div>
</div>
</td>
                            </tr>
                            <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/meta" title="<meta>">&lt;meta&gt;</a></code></td>
                              <td>
<div class="wrap-out">
<div class="wrap-in">
<div class="top">Defines metadata that can’t be defined using other HTML element.</div>
<div class="bottom"> 定义一些不能用其它 HTML 元素定义的元信息。 </div>
</div>
</div>
</td>
                            </tr>
                            <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/style" title="<style>">&lt;style&gt;</a></code></td>
                              <td>
<div class="wrap-out">
<div class="wrap-in">
<div class="top">Style tag is used to write inline CSS.</div>
<div class="bottom"> 写内联 CSS 时的 样式标签. </div>
</div>
</div>
</td>
                            </tr>
                        </tbody></table>

                        <table class="resource_table">
                        <caption>
    <div class="wrap-out">
        <div class="wrap-in">
            <div class="top">Scripting</div>
            <div class="bottom">脚本</div>
        </div>
    </div>
</caption>
                          <thead>
                            <tr>
                              <th scope="col">Tag</th>
                              <th scope="col">Description</th>
                            </tr>
                          </thead>
                            <tbody><tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/script" title="<script>">&lt;script&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines either an internal script or link to an external script. The script language is JavaScript</div>
                              <div class="bottom">定义一个内部的脚本或链接到外部的脚本。这个脚本的语言是 javascript</div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/noscript" title="<noscript>">&lt;noscript&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines an alternative content to display when the browser doesn’t support scripting.</div>
                              <div class="bottom">定义一个的可替换内容， 当浏览器不支持脚本时显示.</div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              </tbody></table>

                              <table class="resource_table">
                              <caption>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Sections</div>
                              <div class="bottom">区域</div>
                              </div>
                              </div>
                              </caption>
                              <thead>
                              <tr>
                              <th scope="col">Tag</th>
                              <th scope="col">Description</th>
                              </tr>
                              </thead>
                              <tbody><tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/body" title="<body>">&lt;body&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top"> Represents the main content of an HTML document. There is only one <code>&lt;body&gt;</code> element in a document.</div>
                              <div class="bottom">代表 HTML 文档的主要内容。 在一个文档内只能有一个 <code>&lt;body&gt;</code>标签。</div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/section" title="<section>">&lt;section&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines a section in a document</div>
                              <div class="bottom">定义文档的一个区域(section)</div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/nav" title="<nav>">&lt;nav&gt;</a></code> </td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines a section that contains only navigation links</div>
                              <div class="bottom">定义一个只包含导航(nav)链接的区域(section)</div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/article" title="<article>">&lt;article&gt;</a></code> </td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines self-contained content that could exist independantly of the rest of the content</div>
                              <div class="bottom">定义一个独立于无关内容依旧可以存在的完整内容</div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/aside" title="<aside>">&lt;aside&gt;</a></code> </td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines some content set aside from the rest of page content. If it is removed, the remaining content still make sence.</div>
                              <div class="bottom">从无关内容中定义的一些侧栏的内容集。如果它被删除了，剩下的内容依旧保持原样。</div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><a href="/en/HTML/Element/Heading_Elements" title="Elementy blokowe"><code>&lt;h1&gt;,&lt;h2&gt;,&lt;h3&gt;,&lt;h4&gt;,&lt;h5&gt;,&lt;h6&gt;</code></a></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Heading elements implement six levels of document headings, <code>&lt;h1&gt;</code> is the most important and <code>&lt;h6&gt;</code> is the least. A heading element briefly describes the topic of the section it introduces.</div>
                              <div class="bottom">标题元素实现了六个级别的文档标题，<code>&lt;h1&gt;</code>是最重要的，<code>&lt;h6&gt;</code>是最不重要的。 一个标题元素简要的描述了一个区域(section)介绍的话题。</div>
                              </div>
                              </div>

                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/hgroup" title="<hgroup>">&lt;hgroup&gt;</a></code> </td>
                              <td>

                              Groups a set of <code>&lt;h1&gt;</code> to <code>&lt;h6&gt;</code> elements when a heading has multiple levels

                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/header" title="<header>">&lt;header&gt;</a></code> </td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines the header of a page or section. It often contains a logo, the title of the Web site and a navigational table of content.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/footer" title="<footer>">&lt;footer&gt;</a></code> </td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines the footer for a page or section. It often contains a copyright notice, some links to legal information or addresses to give feedback.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/address" title="<address>">&lt;address&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines a section containing contact information.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              </tbody></table>

                              <table class="resource_table">
                              <caption>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Grouping Content</div>
                              <div class="bottom">内容组</div>
                              </div>
                              </div>
                              </caption>
                              <thead>
                              <tr>
                              <th scope="col">Tag</th>
                              <th scope="col">Description</th>
                              </tr>
                              </thead>
                              <tbody><tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/p" title="<p>">&lt;p&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines a portion that should be displayed as a paragrah.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/hr" title="<hr>">&lt;hr&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Represents a thematic break between paragraphs of a section or article or any longer content.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/pre" title="<pre>">&lt;pre&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Indicates that its content is preformatted and that this format must be preserved.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/blockquote" title="<blockquote>">&lt;blockquote&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Represents a citation.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/ol" title="<ol>">&lt;ol&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines an ordered list of items, that is a list which change its meaning if we change the order of its elements</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/ul" title="<ul>">&lt;ul&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines an unordered list of items.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/li" title="<li>">&lt;li&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines a item of a enumeration list often preceded by a bullet in English.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/dl" title="<dl>">&lt;dl&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Defines a definition list, that is a list of terms and their associated definitions.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/dt" title="<dt>">&lt;dt&gt;</a></code></td>
                              <td>Represents a term defined by the next <code>&lt;dd&gt;</code>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/dd" title="<dd>">&lt;dd&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Represents the definition of the terms immediately listed before it.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/figure" title="<figure>">&lt;figure&gt;</a></code> </td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Represents a figure illustrated a part of the document.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/figcaption" title="<figcaption>">&lt;figcaption&gt;</a></code> </td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Represents the legend of a figure.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/div" title="<div>">&lt;div&gt;</a></code></td>
                              <td>
                              <div class="wrap-out">
                              <div class="wrap-in">
                              <div class="top">Represents a generic container with no special meaning.</div>
                              <div class="bottom"></div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              </tbody></table>

                              <table class="resource_table">
                              <caption>Text-Level Semantics</caption>
                              <thead>
                              <tr>
                              <th scope="col">Tag</th>
                              <th scope="col">Description</th>
                              </tr>
                              </thead>
                              <tbody><tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/a" title="<a>">&lt;a&gt;</a></code></td>
                              <td>Represents an <em>hyperlink</em>, linking to another resource.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/em" title="<em>">&lt;em&gt;</a></code></td>
                              <td>Represents <em>emphasized</em> text, like a stress accent.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/strong" title="<strong>">&lt;strong&gt;</a></code></td>
                              <td>Represents especially <em>important</em> text.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/small" title="<small>">&lt;small&gt;</a></code></td>
                              <td>Represents a <em>side comment</em>, that is text like a disclaimer, a copyright which is not essential to the comprehension of the document.<code> </code></td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/s" title="<s>">&lt;s&gt;</a></code></td>
                              <td>Represents content that is no <em>longer accurate or relevant</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/cite" title="<cite>">&lt;cite&gt;</a></code></td>
                              <td>Represents the <em>title of a work</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/q" title="<q>">&lt;q&gt;</a></code></td>
                              <td>Represents an inline <em>quotation</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/dfn" title="<dfn>">&lt;dfn&gt;</a></code></td>
                              <td>Represents a term whose <em>definition</em> is contained in its nearest ancestor content.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/abbr" title="<abbr>">&lt;abbr&gt;</a></code></td>
                              <td>Represents an <em>abbreviation</em> or an <em>acronym</em>, eventually with its meaning.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/data" title="<data>">&lt;data&gt;</a></code> </td>
                              <td>Associates to its content a <em>machine-readable equivalent</em>. (This element is only in the WHATWG version of the HTML standard, and not in the W3C version of HTML5).</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/time" title="<time>">&lt;time&gt;</a></code> </td>
                              <td>Represents a <em>date</em> and <em>time</em> value, eventually with a machine-readable equivalent.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/code" title="<code>">&lt;code&gt;</a></code></td>
                              <td>Represents some <em>computer code</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/var" title="<var>">&lt;var&gt;</a></code></td>
                              <td>Represents a <em>variable, that is an actual mathematical expression or programming context, an identifier representing a constant, a symbol identifying a physical quantity, a function parameter, or a mere placeholder in prose.</em></td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/samp" title="<samp>">&lt;samp&gt;</a></code></td>
                              <td>Represents the <em>output</em> of a program or a computer.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/kbd" title="<kbd>">&lt;kbd&gt;</a></code></td>
                              <td>Represents <em>user input</em>, often from the keyboard, but not necessary, it may represent other input, like transcribed voice commands.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/sub" title="<sub>">&lt;sub&gt;</a></code>,<code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/sup" title="<sup>">&lt;sup&gt;</a></code></td>
                              <td>Represents a <em>subscript</em>, respectively a <em>superscript.</em></td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/i" title="<i>">&lt;i&gt;</a></code></td>
                              <td>Represents some text in an <em>alternate</em> voice or mood, or at least of different quality, such as a taxonomic designation, a technical term, an idiomatic phrase, a thought or a ship name.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/b" title="<b>">&lt;b&gt;</a></code></td>
                              <td>Represents a text which to which attention is drawn for <em>utilitarian purposes</em>. It doesn’t convey extra importance and doesn’t implicate an alternate voice.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/u" title="<u>">&lt;u&gt;</a></code></td>
                              <td>Represents <em>unarticulate</em> non-textual annoatation, such labeling the text as being misspelt or labeling a proper name in Chinese text.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/mark" title="<mark>">&lt;mark&gt;</a></code> </td>
                              <td>Represents text highlighted for <em>reference</em> purposes, that is for its relevance in another context.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/ruby" title="<ruby>">&lt;ruby&gt;</a></code> </td>
                              <td>Represents content to be marked with <em>ruby annotations</em>, short runs of text presented alongside the text. This is often used in conjunction with East Asian language where the annotations act as a guide for pronunciation, like the Japanese <em>furigana</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/rt" title="<rt>">&lt;rt&gt;</a></code> </td>
                              <td>Represents the <em>text of a ruby annotation</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/rp" title="<rp>">&lt;rp&gt;</a></code> </td>
                              <td>Represents <em>parenthesis</em> around a ruby annotation, used to display the annotation in an alternate way by browsers not supporting the standard display for annotations.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/bdi" title="<bdi>">&lt;bdi&gt;</a></code> </td>
                              <td>Represents text that must be <em>isolated</em> from its surrounding for bidirectional text formatting. It allows to embed span of text with a different, or unknown, directionality.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/bdo" title="<bdo>">&lt;bdo&gt;</a></code></td>
                              <td>Represents the <em>directionality</em> of its children, in order to explicitly override the Unicode bidirectional algorithm.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/span" title="<span>">&lt;span&gt;</a></code></td>
                              <td>Represents text with no specific meaning. This has to be used when no <em>other</em> text-semantic element conveys an adequate meaning, which, in this case, is often brought by global attributes like <code>class</code>, <code>lang</code>, or <code>dir</code>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/br" title="<br>">&lt;br&gt;</a></code></td>
                              <td>Represents a <em>line break</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/wbr" title="<wbr>">&lt;wbr&gt;</a></code> </td>
                              <td>Represents a <em>line break opportunity</em>, that is a suggested wrapping point in order to improve readability of text split on several lines.</td>
                              </tr>
                              </tbody></table>

                              <table class="resource_table">

                              <caption>Edits</caption>
                              <thead>
                              <tr>
                              <th>Tag</th>
                              <th>Description</th>
                              </tr>
                              </thead>
                              <tbody><tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/ins" title="<ins>">&lt;ins&gt;</a></code></td>
                              <td>Defines an <em>addition</em> to the document.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/del" title="<del>">&lt;del&gt;</a></code></td>
                              <td>Defines a <em>removal</em> from the document.</td>
                              </tr>
                              </tbody></table>

                              <table class="resource_table">
                              <caption>Embedded content</caption>
                              <thead>
                              <tr>
                              <th scope="col">Tag</th>
                              <th scope="col">Description</th>
                              </tr>
                              </thead>
                              <tbody><tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/img" title="<img>">&lt;img&gt;</a></code></td>
                              <td>Represents an <em>image</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/iframe" title="<iframe>">&lt;iframe&gt;</a></code></td>
                              <td>Represents a <em>nested browsing context</em>, that is an embedded HTML document.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/embed" title="<embed>">&lt;embed&gt;</a></code> </td>
                              <td>Represents a <em>integration point</em> for an external, often non_HTML, application or interactive content.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/object" title="<object>">&lt;object&gt;</a></code></td>
                              <td>Represents an <em>external resource</em>, which will be treated as an image, an HTML sub-document or an external resource to be processed by a plugin.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/param" title="<param>">&lt;param&gt;</a></code></td>
                              <td>Defines <em>parameters</em> for use by plugins invoked by <code>&lt;object&gt;</code> elements.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/video" title="<video>">&lt;video&gt;</a></code> </td>
                              <td>Represents a <em>video</em>,  and its associated audio files and captions, with the necessary interface to play it.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/audio" title="<audio>">&lt;audio&gt;</a></code> </td>
                              <td>Represents a <em>sound</em>, or an <em>audio stream</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/source" title="<source>">&lt;source&gt;</a></code> </td>
                              <td>Allows authors to specify alternative media resources for media elements like <code>&lt;video&gt;</code> or <code>&lt;audio&gt;</code>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/track" title="<track>">&lt;track&gt;</a></code> </td>
                              <td>Allows authors to specify timed <em>text track</em> for media elements like <code>&lt;video&gt;</code><em> or <code>&lt;audio&gt;</code>.</em></td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/canvas" title="<canvas>">&lt;canvas&gt;</a></code> </td>
                              <td>Represents a <em>bitmap area</em> that scripts can be used to render graphics, like graphs, game graphics, any visual images on the fly.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/map" title="<map>">&lt;map&gt;</a></code></td>
                              <td>In conjunction with <code>&lt;area&gt;</code>, defines an <em>image map</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/area" title="<area>">&lt;area&gt;</a></code></td>
                              <td>In conjunction with <code>&lt;map&gt;</code>, defines an <em>image map</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="/en-US/docs/SVG/Element/svg">&lt;svg&gt;</a></code> </td>
                              <td>Defines an embedded <em>vectorial image</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="/en-US/docs/MathML/Element/math" title="<math>">&lt;math&gt;</a></code> </td>
                              <td>Defines a <em>mathematical formula</em>.</td>
                              </tr>
                              </tbody></table>

                              <table class="resource_table">
                              <caption>Tabular Data</caption>
                              <thead>
                              <tr>
                              <th scope="col">Tag</th>
                              <th scope="col">Description</th>
                              </tr>
                              </thead>
                              <tbody><tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/table" title="<table>">&lt;table&gt;</a></code></td>
                              <td>Represents <em>data with more than one dimension</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/caption" title="<caption>">&lt;caption&gt;</a></code></td>
                              <td>Represents the <em>title of a table</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/colgroup" title="<colgroup>">&lt;colgroup&gt;</a></code></td>
                              <td>Represents a <em>set of one or more columns</em> of a table.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/col" title="<col>">&lt;col&gt;</a></code></td>
                              <td>Represents a <em>column</em> of a table.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/tbody" title="<tbody>">&lt;tbody&gt;</a></code></td>
                              <td>Represents the block of rows that describes the <em>concrete data</em> of a table.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/thead" title="<thead>">&lt;thead&gt;</a></code></td>
                              <td>Represents the block of rows that describes the <em>column labels</em> of a table.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/tfoot" title="<tfoot>">&lt;tfoot&gt;</a></code></td>
                              <td>Represents the block of rows that describes the <em>column summaries</em> of a table.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/tr" title="<tr>">&lt;tr&gt;</a></code></td>
                              <td>Represents a <em>row of cells</em> in a table.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/td" title="<td>">&lt;td&gt;</a></code></td>
                              <td>Represents a <em>data cell</em> in a table.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/th" title="<th>">&lt;th&gt;</a></code></td>
                              <td>Represents a <em>header cell</em> in a table.</td>
                              </tr>
                              </tbody></table>

                              <table class="resource_table">
                              <caption>Forms</caption>
                              <thead>
                              <tr>
                              <th scope="col">Tag</th>
                              <th scope="col">Description</th>
                              </tr>
                              </thead>
                              <tbody><tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/form" title="<form>">&lt;form&gt;</a></code></td>
                              <td>Represents a <em>formular</em>, consisting of controls, that can be submitted to a server for processing.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/fieldset" title="<fieldset>">&lt;fieldset&gt;</a></code></td>
                              <td>Represents a <em>set of controls</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/legend" title="<legend>">&lt;legend&gt;</a></code></td>
                              <td>Represents the <em>caption</em> for a <code>&lt;fieldset&gt;</code>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/label" title="<label>">&lt;label&gt;</a></code></td>
                              <td>Represents the <em>caption</em> of a form control.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/input" title="<input>">&lt;input&gt;</a></code></td>
                              <td>Represents a <em>typed data field</em> allowing the user to edit the data.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/button" title="<button>">&lt;button&gt;</a></code></td>
                              <td>Represents a <em>button</em>.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/select" title="<select>">&lt;select&gt;</a></code></td>
                              <td>Represents a control allowing the <em>selection among a set of options</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/datalist" title="<datalist>">&lt;datalist&gt;</a></code> </td>
                              <td>Represents a <em>set of predefined options</em> for other controls.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/optgroup" title="<optgroup>">&lt;optgroup&gt;</a></code></td>
                              <td>Represents a <em>set of options</em>, logically grouped.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/option" title="<option>">&lt;option&gt;</a></code></td>
                              <td>Represents an <em>option</em> in a <code>&lt;select&gt;</code> element, or a suggestion of a <code>&lt;datalist&gt;</code> element.</td>
                              </tr>
                              <tr>
                              <td><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/textarea" title="<textarea>">&lt;textarea&gt;</a></code></td>
                              <td>Represents a <em>multiline text edit control</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/keygen" title="<keygen>">&lt;keygen&gt;</a></code> </td>
                              <td>Represents a <em>key pair generator control</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/output" title="<output>">&lt;output&gt;</a></code> </td>
                              <td>Represents the <em>result of a calculation</em>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/progress" title="<progress>">&lt;progress&gt;</a></code> </td>
                              <td>Represents the <em>completion progress</em> of a task.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/meter" title="<meter>">&lt;meter&gt;</a></code> </td>
                              <td>Represents a scalar <em>measurement</em> (or a fractional value), within a known range</td>
                              </tr>
                              </tbody></table>

                              <table class="resource_table">
                              <caption>Interactive Elements</caption>
                              <thead>
                              <tr>
                              <th>Tag</th>
                              <th>Description</th>
                              </tr>
                              </thead>
                              <tbody><tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/details" title="<details>">&lt;details&gt;</a></code> </td>
                              <td>Represents a <em>widget</em> from which the user can obtain additional information or controls.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/summary" title="<summary>">&lt;summary&gt;</a></code> </td>
                              <td>Represents a <em>summary</em>, <em>caption</em>, or <em>legend</em> for a given <code>&lt;details&gt;</code>.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/command" title="<command>">&lt;command&gt;</a></code> </td>
                              <td>Represents a <em>command</em> that the user can invoke.</td>
                              </tr>
                              <tr>
                              <td class="html5"><code><a href="https://developer.mozilla.org/en-US/docs/HTML/Element/menu" title="<menu>">&lt;menu&gt;</a></code> </td>
                              <td>Represents a <em>list of commands</em>.</td>
                              </tr>
                              </tbody></table>

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
