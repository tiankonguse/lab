<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "CSS Properties Reference List";
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
            <h2><?php echo $title;?></h2>
            <div class="copy">
                 <table class="resource_table">
                    <caption>Background</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>background</code></td>
                                <td>A shorthand property for setting all background properties in one declaration</td>
                                <td><span>background-color</span><span>background-image</span><span>background-repeat</span><span>background-attachment</span><span>background-position</span></td>
                            </tr>
                            <tr>
                                <td><code>background-attachment</code></td>
                                <td>Sets whether a background image is fixed or scrolls with the rest of the page</td>
                                <td><span>scroll</span><span>fixed</span></td>
                            </tr>
                            <tr>
                                <td><code>background-color</code></td>
                                <td>Sets the background color of an element</td>
                                <td><span>color-rgb</span><span>color-hex</span><span>color-name</span><span>transparent</span></td>
                            </tr>
                            <tr>
                                <td><code>background-image</code></td>
                                <td>Sets an image as the background</td>
                                <td><span>url(URL)</span><span>none</span></td>
                            </tr>
                            <tr>
                                <td><code>background-position</code></td>
                                <td>Sets the starting position of a background image</td>
                                <td><span>top left</span><span>top center</span><span>top right</span><span>center left</span><span>center center</span><span>center right</span><span>bottom left</span><span>bottom center</span><span>bottom right</span><span>x% y%</span><span>xpos ypos</span></td>
                            </tr>
                            <tr>
                                <td><code>background-repeat</code></td>
                                <td>Sets if/how a background image will be repeated</td>
                                <td><span>repeat</span><span>repeat-x</span><span>repeat-y</span><span>no-repeat</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Border</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>border</code></td>
                                <td>A shorthand property for setting all of the properties for the four borders in one declaration</td>
                                <td><span>border-width</span><span>border-style</span><span>border-color</span></td>
                            </tr>
                            <tr>
                                <td><code>border-bottom</code></td>
                                <td>A shorthand property for setting all of the properties for the bottom border in one declaration</td>
                                <td><span>border-bottom-width</span><span>border-style</span><span>border-color</span></td>
                            </tr>
                            <tr>
                                <td><code>border-bottom-color</code></td>
                                <td>Sets the color of the bottom border	border-color</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><code>border-bottom-style</code></td>
                                <td>Sets the style of the bottom border	border-style</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><code>border-bottom-width</code></td>
                                <td>Sets the width of the bottom border</td>
                                <td><span>thin</span><span>medium</span><span>thick</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>border-color</code></td>
                                <td>Sets the color of the four borders, can have from one to four colors</td>
                                <td>color</td>
                            </tr>
                            <tr>
                                <td><code>border-left</code></td>
                                <td>A shorthand property for setting all of the properties for the left border in one declaration</td>
                                <td><span>border-left-width</span><span>border-style</span><span>border-color</span></td>
                            </tr>
                            <tr>
                                <td><code>border-left-color</code></td>
                                <td>Sets the color of the left border</td>
                                <td>border-color</td>
                            </tr>
                            <tr>
                                <td><code>border-left-style</code></td>
                                <td>Sets the style of the left border</td>
                                <td>border-style</td>
                            </tr>
                            <tr>
                                <td><code>border-left-width</code></td>
                                <td>Sets the width of the left border</td>
                                <td><span>thin</span><span>medium</span><span>thick</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>border-right</code></td>
                                <td>A shorthand property for setting all of the properties for the right border in one declaration</td>
                                <td><span>border-right-width</span><span>border-style</span><span>border-color</span></td>
                            </tr>
                            <tr>
                                <td><code>border-right-color</code></td>
                                <td>Sets the color of the right border</td>
                                <td>border-color</td>
                            </tr>
                            <tr>
                                <td><code>border-right-style</code></td>
                                <td>Sets the style of the right border</td>
                                <td>border-style</td>
                            </tr>
                            <tr>
                                <td><code>border-right-width</code></td>
                                <td>Sets the width of the right border</td>
                                <td><span>thin</span><span>medium</span><span>thick</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>border-style</code></td>
                                <td>Sets the style of the four borders, can have from one to four styles</td>
                                <td><span>none</span><span>hidden</span><span>dotted</span><span>dashed</span><span>solid</span><span>double</span><span>groove</span><span>ridge</span><span>inset</span><span>outset</span></td>
                            </tr>
                            <tr>
                                <td><code>border-top</code></td>
                                <td>A shorthand property for setting all of the properties for the top border in one declaration</td>
                                <td><span>border-top-width</span><span>border-style</span><span>border-color</span></td>
                            </tr>
                            <tr>
                                <td><code>border-top-color</code></td>
                                <td>Sets the color of the top border</td>
                                <td>border-color</td>
                            </tr>
                            <tr>
                                <td><code>border-top-style</code></td>
                                <td>Sets the style of the top border</td>
                                <td>border-style</td>
                            </tr>
                            <tr>
                                <td><code>border-top-width</code></td>
                                <td>Sets the width of the top border</td>
                                <td><span>thin</span><span>medium</span><span>thick</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>border-width</code></td>
                                <td>A shorthand property for setting the width of the four borders in one declaration, can have from one to four values</td>
                                <td><span>thin</span><span>medium</span><span>thick</span><span>length</span></td>
                            </tr>

                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Classification</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>clear</code></td>
                                <td>Sets the sides of an element where other floating elements are not allowed</td>
                                <td><span>left</span><span>right</span><span>both</span><span>none</span></td>
                            </tr>
                            <tr>
                                <td><code>cursor</code></td>
                                <td>Specifies the type of cursor to be displayed</td>
                                <td><span>url</span><span>auto</span><span>crosshair</span><span>default</span><span>pointer</span><span>move</span><span>e-resize</span><span>ne-resize</span><span>nw-resize</span><span>n-resize</span><span>se-resize</span><span>sw-resize</span><span>s-resize</span><span>w-resize</span><span>text</span><span>wait</span><span>help</span></td>
                            </tr>
                            <tr>
                                <td><code>display</code></td>
                                <td>Sets how/if an element is displayed</td>
                                <td><span>none</span><span>inline</span><span>block</span><span>list-item</span><span>run-in</span><span>compact</span><span>marker</span><span></span><span>table</span><span>inline-table</span><span>table-row-group</span><span>table-header-group</span><span>table-footer-group</span><span>table-row</span><span>table-column-group</span><span>table-column</span><span>table-cell</span><span>table-caption</span></td>
                            </tr>
                            <tr>
                                <td><code>float</code></td>
                                <td>Sets where an image or a text will appear in another element</td>
                                <td><span>left</span><span>right</span><span>none</span></td>
                            </tr>
                            <tr>
                                <td><code>position</code></td>
                                <td>Places an element in a static, relative, absolute, or fixed position</td>
                                <td><span>static</span><span>relative</span><span>absolute</span><span>fixed</span></td>
                             </tr>
                             <tr>
                                <td><code>visibility</code></td>
                                <td>Sets if an element should be visible or invisible</td>
                                <td><span>visible</span><span>hidden</span><span>collapse</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Dimension</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>height</code></td>
                                <td>Sets the height of an element</td>
                                <td><span>auto</span><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>line-height</code></td>
                                <td>Sets the distance between lines</td>
                                <td><span>normal</span><span>number</span><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>max-height</code></td>
                                <td>Sets the maximum height of an element</td>
                                <td><span>none</span><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>max-width</code></td>
                                <td>Sets the maximum width of an element</td>
                                <td><span>none</span><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>min-height</code></td>
                                <td>Sets the minimum height of an element</td>
                                <td><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>min-width</code></td>
                                <td>Sets the minimum width of an element</td>
                                <td><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>width</code></td>
                                <td>Sets the width of an element
                                </td><td><span>auto</span><span>length</span><span>%</span></td>

                            </tr><tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Font</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>font</code></td>
                                <td>A shorthand property for setting all of the properties for a font in one declaration</td>
                                <td><span>font-style</span><span>font-variant</span><span>font-weight</span><span>font-size/line-height</span><span>font-family</span><span>caption</span><span>icon</span><span>menu</span><span>message-box</span><span>small-caption</span><span>status-bar</span></td>
                            </tr>
                            <tr>
                                <td><code>font-family</code></td>
                                <td>A prioritized list of font family names and/or generic family names for an element</td>
                                <td><span>family-name</span><span>generic-family</span></td>
                            </tr>
                            <tr>
                                <td><code>font-size</code></td>
                                <td>Sets the size of a font</td>
                                <td><span>xx-small</span><span>x-small</span><span>small</span><span>medium</span><span>large</span><span>x-large</span><span>xx-large</span><span>smaller</span><span>larger</span><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>font-size-adjust</code></td>
                                <td>Specifies an aspect value for an element that will preserve the x-height of the first-choice font</td>
                                <td><span>none</span><span>number</span></td>
                            </tr>
                            <tr>
                                <td><code>font-stretch</code></td>
                                <td>Condenses or expands the current font-family</td>
                                <td><span>normal</span><span>wider</span><span>narrower</span><span>ultra-condensed</span><span>extra-condensed</span><span></span><span>condensed</span><span>semi-condensed</span><span>semi-expanded</span><span>expanded</span><span>extra-expanded</span><span>ultra-expanded</span></td>
                            </tr>
                            <tr>
                                <td><code>font-style</code></td>
                                <td>Sets the style of the font</td>
                                <td><span>normal</span><span>italic</span><span>oblique</span></td>
                            </tr>
                            <tr>
                                <td><code>font-variant</code></td>
                                <td>Displays text in a small-caps font or a normal font</td>
                                <td><span>normal</span><span>small-caps</span></td>
                            </tr>
                            <tr>
                                <td><code>font-weight</code></td>
                                <td>Sets the weight of a font</td>
                                <td><span>normal</span><span>bold</span><span>bolder</span><span>lighter</span><span>100</span><span>200</span><span>300</span><span></span><span>400</span><span>500</span><span>600</span><span>700</span><span>800 </span><span>900</span></td>
                            </tr><tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Generated Content</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>content</code></td>
                                <td>Generates content in a document. Used with the ::before and ::after pseudo-elements</td>
                                <td><span>string</span><span>url</span><span>counter(name)</span><span>counter(name, list-style-type)</span><span>counters(name, string)</span><span>counters(name, string, list-style-type)</span><span>attr(X)</span><span>open-quote</span><span>close-quote</span><span>no-open-quote</span><span>no-close-quote</span></td>
                            </tr>
                            <tr>
                                <td><code>counter-increment</code></td>
                                <td>Sets how much the counter increments on each occurrence of a selector</td>
                                <td><span>none</span><span>identifier</span><span>number</span></td>
                            </tr>
                            <tr>
                                <td><code>counter-reset</code></td>
                                <td>Sets the value the counter is set to on each occurrence of a selector</td>
                                <td><span>none</span><span>identifier</span><span>number</span></td>
                            </tr>
                            <tr>
                                <td><code>quotes</code></td>
                                <td>Sets the type of quotation marks</td>
                                <td><span>none</span><span>string string</span></td>
                            </tr>

                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>List and Marker</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>list-style</code></td>
                                <td>A shorthand property for setting all of the properties for a list in one declaration</td>
                                <td><span>list-style-type</span><span>list-style-position</span><span>list-style-image</span></td>
                            </tr>
                            <tr>
                                <td><code>list-style-image</code></td>
                                <td>Sets an image as the list-item marker</td>
                                <td><span>none</span><span>url</span></td>
                            </tr>
                            <tr>
                                <td><code>list-style-position</code></td>
                                <td>Sets where the list-item marker is placed in the list</td>
                                <td><span>inside</span><span>outside</span></td>
                            </tr>
                            <tr>
                                <td><code>list-style-type</code></td>
                                <td>Sets the type of the list-item marker</td>
                                <td><span>none</span><span>disc</span><span>circle</span><span>square</span><span>decimal</span><span>decimal-leading-zero</span><span>lower-roman</span><span>upper-roman</span><span>lower-alpha</span><span>upper-alpha</span><span>lower-greek</span><span>lower-latin</span><span>upper-latin</span><span>hebrew</span><span>armenian</span><span>georgian</span><span>cjk-ideographic</span><span>hiragana</span><span>katakana</span><span>hiragana-iroha</span><span>katakana-iroha</span></td>
                            </tr>
                            <tr>
                                <td><code>marker-offset</code></td>
                                <td>&nbsp;</td>
                                <td><span>auto</span><span>length</span></td>
                            </tr>

                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Margin</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>margin</code></td>
                                    <td>A shorthand property for setting the margin properties in one declaration</td>
                                    <td><span>margin-top</span><span>margin-right</span><span>margin-bottom</span><span>margin-left</span></td>
                                </tr>
                                <tr>
                                    <td><code>margin-bottom</code></td>
                                    <td>Sets the bottom margin of an element</td>
                                    <td><span>auto</span><span>length</span><span>%</span></td>
                                </tr>
                                <tr>
                                    <td><code>margin-left</code></td>
                                    <td>Sets the left margin of an element</td>
                                    <td><span>auto</span><span>length</span><span>%</span></td>
                                </tr>
                                <tr>
                                    <td><code>margin-right</code></td>
                                    <td>Sets the right margin of an element</td>
                                    <td><span>auto</span><span>length</span><span>%</span></td>
                                </tr>
                                <tr>
                                    <td><code>margin-top</code></td>
                                    <td>Sets the top margin of an element</td>
                                    <td><span>auto</span><span>length</span><span>%</span></td>
                                </tr>
                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Outlines</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>outline</code></td>
                                <td>A shorthand property for setting all the outline properties in one declaration</td>
                                <td><span>outline-color</span><span>outline-style</span><span> outline-width</span></td>
                            </tr>
                            <tr>
                                <td><code>outline-color</code></td>
                                <td>Sets the color of the outline around an element</td>
                                <td><span>color</span><span>invert</span></td>
                            </tr>
                            <tr>
                                <td><code>outline-style</code></td>
                                <td>Sets the style of the outline around an element</td>
                                <td><span>none</span><span>dotted</span><span>dashed</span><span>solid</span><span>double</span><span>groove</span><span>ridge</span><span>inset</span><span>outset</span></td>
                            </tr>
                            <tr>
                                <td><code>outline-width</code></td>
                                <td>Sets the width of the outline around an element</td>
                                <td><span>thin</span><span>medium</span><span>thick</span><span>length	</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Padding</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>padding</code></td>
                                <td>A shorthand property for setting all of the padding properties in one declaration</td>
                                <td><span>padding-top</span><span>padding-right</span><span>padding-bottom</span><span>padding-left</span></td>
                            </tr>
                            <tr>
                                <td><code>padding-bottom</code></td>
                                <td>Sets the bottom padding of an element</td>
                                <td><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>padding-left</code></td>
                                <td>Sets the left padding of an element</td>
                                <td><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>padding-right</code></td>
                                <td>Sets the right padding of an element</td>
                                <td><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>padding-top</code></td>
                                <td>Sets the top padding of an element</td>
                                <td><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Positioning</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>bottom</code></td>
                                <td>Sets how far the bottom edge of an element is above/below the bottom edge of the parent element</td>
                                <td><span>auto</span><span>%</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>clip</code></td>
                                <td>Sets the shape of an element. The element is clipped into this shape, and displayed</td>
                                <td><span>shape</span><span>auto</span></td>
                            </tr>
                            <tr>
                                <td><code>left</code></td>
                                <td>Sets how far the left edge of an element is to the right/left of the left edge of the parent element</td>
                                <td><span>auto</span><span>%</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>overflow</code></td>
                                <td>Sets what happens if the content of an element overflow its area</td>
                                <td><span>visible</span><span>hidden</span><span>scroll</span><span>auto</span></td>
                            </tr>
                            <tr>
                                <td><code>position</code></td>
                                <td>Places an element in a static, relative, absolute, or fixed position</td>
                                <td><span>static</span><span>relative</span><span>absolute</span><span>fixed</span></td>
                            </tr>
                            <tr>
                                <td><code>right</code></td>
                                <td>Sets how far the right edge of an element is to the left/right of the right edge of the parent element</td>
                                <td><span>auto</span><span>%</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>top</code></td>
                                <td>Sets how far the top edge of an element is above/below the top edge of the parent element</td>
                                <td><span>auto</span><span>%</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>vertical-align</code></td>
                                <td>Sets the vertical alignment of an element</td>
                                <td><span>baseline</span><span>sub</span><span>super</span><span>top </span><span>text-top</span><span>middle</span><span>bottom</span><span>text-bottom</span><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>z-index</code></td>
                                <td>Sets the stack order of an element</td>
                                <td><span>auto</span><span>number</span></td>
                            </tr>
                        <tr>
                            <td><a href="#">Back to Top</a></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Text</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>border-collapse</code></td>
                                <td>Sets whether the table borders are collapsed into a single border or detached as in standard HTML</td>
                                <td><span>collapse</span><span>separate</span></td>
                            </tr>
                            <tr>
                                <td><code>border-spacing</code></td>
                                <td>Sets the distance that separates cell borders (only for the “separated borders” model)</td>
                                <td>length length</td>
                            </tr>
                            <tr>
                                <td><code>caption-side</code></td>
                                <td>Sets the position of the table caption</td>
                                <td><span>top</span><span>bottom</span><span>left</span><span>right</span></td>
                            </tr>
                            <tr>
                                <td><code>empty-cells</code></td>
                                <td>Sets whether or not to show empty cells in a table (only for the “separated borders” model)</td>
                                <td><span>show</span><span>hide</span></td>
                            </tr>
                            <tr>
                                <td><code>table-layout</code></td>
                                <td>Sets the algorithm used to display the table cells, rows, and columns</td>
                                <td><span>auto</span><span>fixed</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">Back to Top</a></td>
                                <td>&nbsp;</td>
                            </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Text</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>color</code></td>
                                <td>Sets the color of a text</td>
                                <td>color</td>
                            </tr>
                            <tr>
                                <td><code>direction</code></td>
                                <td>Sets the text direction</td>
                                <td><span>ltr</span><span>rtl</span></td>
                            </tr>
                            <tr>
                                <td><code>line-height</code></td>
                                <td>Sets the distance between lines</td>
                                <td><span>normal</span><span>number</span><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>letter-spacing</code></td>
                                <td>Increase or decrease the space between characters</td>
                                <td><span>normal</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>text-align</code></td>
                                <td>Aligns the text in an element</td>
                                <td><span>left</span><span>right</span><span>center</span><span>justify</span></td>
                            </tr>
                            <tr>
                                <td><code>text-decoration</code></td>
                                <td>Adds decoration to text</td>
                                <td><span>none</span><span>underline</span><span>overline</span><span>line-through</span><span>blink</span></td>
                            </tr>
                            <tr>
                                <td><code>text-indent</code></td>
                                <td>Indents the first line of text in an element</td>
                                <td><span>length</span><span>%</span></td>
                            </tr>
                            <tr>
                                <td><code>text-shadow</code></td>
                                <td>Adds a shadow to text</td>
                                <td><span>none</span><span>color</span><span>length</span></td>
                            </tr>
                            <tr>
                                <td><code>text-transform</code></td>
                                <td>Controls the letters in an element</td>
                                <td><span>none</span><span>capitalize</span><span>uppercase</span><span>lowercase</span></td>
                            </tr>
                            <tr>
                                <td><code>unicode-bidi</code></td>
                                <td>&nbsp;</td>
                                <td><span>normal</span><span>embed</span><span>bidi-override</span></td>
                            </tr>
                            <tr>
                                <td><code>white-space</code></td>
                                <td>Sets how white space inside an element is handled</td>
                                <td><span>normal</span><span>pre</span><span>nowrap</span></td>
                            </tr>
                            <tr>
                                <td><code>word-spacing</code></td>
                                <td>Increases or decreases the space between words</td>
                                <td><span>normal</span><span>length</span>
                            </td>
                        </tr><tr>
                            <td><a href="#">Back to Top</a></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Pseudo-Classes</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>:active</code></td>
                                <td>Adds special style to an activated element</td>
                            </tr>
                            <tr>
                                <td><code>:focus</code></td>
                                <td>Adds special style to an element while the element has focus</td>
                            </tr>
                            <tr>
                                <td><code>:hover</code></td>
                                <td>Adds special style to an element when you mouse over it</td>
                            </tr>
                            <tr>
                                <td><code>:link</code></td>
                                <td>Adds special style to an unvisited link</td>
                            </tr>
                            <tr>
                                <td><code>:visited</code></td>
                                <td>Adds special style to a visited link</td>
                            </tr>
                            <tr>
                                <td><code>:first-child</code></td>
                                <td>Adds special style to an element that is the first child of some other element</td>
                            </tr>
                            <tr>
                                <td><code>:lang</code></td>
                                <td>Allows the author to specify a language to use in a specified element</td>
                            </tr>
                        <tr>
                            <td><a href="#">Back to Top</a></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Pseudo-Elements</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <tbody><tr>
                                <td><code>::first-letter</code></td>
                                <td>Adds special style to the first letter of a text</td>
                            </tr>
                            <tr>
                                <td><code>::first-line</code></td>
                                <td>Adds special style to the first line of a text</td>
                            </tr>
                            <tr>
                                <td><code>::before</code></td>
                                <td>Inserts some content before an element</td>
                            </tr>
                            <tr>
                                <td><code>::after</code></td>
                                <td>Inserts some content after an element</td>
                            </tr>
                        <tr>
                            <td><a href="#">Back to Top</a></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody></table>

                    <table class="resource_table">
                    <caption>Media Types</caption>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody><tr>
                            <td><code>all</code></td>
                            <td>Used for all media type devices</td>
                        </tr>
                        <tr>
                            <td><code>aural</code></td>
                            <td>Used for speech and sound synthesizers</td>
                        </tr>
                        <tr>
                            <td><code>braille</code></td>
                            <td>Used for Braille tactile feedback devices</td>
                        </tr>
                        <tr>
                            <td><code>embossed</code></td>
                            <td>Used for paged Braille printers</td>
                        </tr>
                        <tr>
                            <td><code>handheld</code></td>
                            <td>Used for small or handheld devices</td>
                        </tr><tr>
                            <td><code>print</code></td>
                            <td>Used for printers</td>
                        </tr>
                        <tr>
                            <td><code>projection</code></td>
                            <td>Used for projected presentations, like slides</td>
                        </tr>
                        <tr>
                            <td><code>screen</code></td>
                            <td>Used for computer screens</td>
                        </tr>
                        <tr>
                            <td><code>tty</code></td>
                            <td>Used for media using a fixed-pitch character grid, like teletypes and terminals</td>
                        </tr><tr>
                            <td><code>tv</code></td>
                            <td>Used for television-type devices</td>
                        </tr>
                        <tr>
                            <td><code>*</code></td>
                            <td>Used as the media attribute of the link tag or with the @media attribute.</td>
                        </tr>
                        <tr>
                            <td><a href="#">Back to Top</a></td>
                            <td>&nbsp;</td>
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
