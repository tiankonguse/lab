<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "CSS Selectors Reference List";
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
                       <caption>Basic and Contextual Selectors</caption>
                            <thead>
                                <tr>
                                    <th>Pattern</th>
                                    <th>Meaning</th>
                                    <th>Described in Section</th>
                                </tr>
                            </thead>
                                <tbody><tr>
                                    <td><code>*</code></td>
                                    <td>Any element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#universal-selector">Universal selector</a></td>
                                </tr>
                                <tr>
                                    <td><code>E</code></td>
                                    <td>An element of type E</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#type-selectors">Type selector</a></td>
                                </tr>
                                <tr>
                                    <td><code>E F</code></td>
                                    <td>An F element descendant of an E element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#descendant-combinators">Descendant combinator</a></td>
                                </tr>
                                <tr>
                                    <td><code>E &gt; F</code></td>
                                    <td>An F element child of an E element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#child-combinators">Child combinator</a></td>
                                </tr>
                                <tr>
                                    <td><code>E + F</code></td>
                                    <td>An F element immediately preceded by an E element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#adjacent-sibling-combinators">Adjacent sibling combinator</a></td>
                                </tr>
                                <tr>
                                    <td><code>E ~ F</code></td>
                                    <td>An F element preceded by an E element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#general-sibling-combinators">General sibling combinator</a></td>
                                </tr>

                                <tr>
                                    <td><a href="#">Back to Top</a></td>
                                    <td>&nbsp;</td>
                                </tr>
                        </tbody></table>

                        <table class="resource_table">
                        <caption>ID and Class</caption>
                            <thead>
                                <tr>
                                    <th>Pattern</th>
                                    <th>Meaning</th>
                                    <th>Described in Section</th>
                                </tr>
                            </thead>
                                <tbody><tr>
                                    <td><code>E#myid</code></td>
                                    <td>An E element with ID equal to “myid”</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#id-selectors">ID selectors</a></td>
                                </tr>
                                <tr>
                                    <td><code>E.warning</code></td>
                                    <td>An E element whose class is “warning” (the document language specifies how class is determined)</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#class-html">Class selectors</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Back to Top</a></td>
                                    <td>&nbsp;</td>
                                </tr>
                        </tbody></table>

                        <table class="resource_table">
                        <caption>Attribute Selectors</caption>
                            <thead>
                                <tr>
                                    <th>Pattern</th>
                                    <th>Meaning</th>
                                    <th>Described in Section</th>
                                </tr>
                            </thead>
                                <tbody><tr>
                                    <td><code>E[foo]</code></td>
                                    <td>An E element with a “foo” attribute</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#attribute-selectors">Attribute selectors</a></td>
                                </tr>
                                <tr>
                                    <td><code>E[foo="bar"]</code></td>
                                    <td>An E element whose “foo” attribute value is exactly equal to “bar”</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#attribute-selectors">Attribute selectors</a></td>
                                </tr>
                                <tr>
                                    <td><code>E[foo~="bar"]</code></td>
                                    <td>An E element whose “foo” attribute value is a list of whitespace-separated values, one of which is exactly equal to “bar”</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#attribute-selectors">Attribute selectors</a></td>
                                </tr>
                                <tr>
                                    <td><code>E[foo^="bar"]</code></td>
                                    <td>An E element whose “foo” attribute value begins exactly with the string “bar”</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#attribute-selectors">Attribute selectors</a></td>
                                </tr>
                                <tr>
                                    <td><code>E[foo$="bar"]</code></td>
                                    <td>An E element whose “foo” attribute value ends exactly with the string “bar”</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#attribute-selectors">Attribute selectors</a></td>
                                </tr>
                                <tr>
                                    <td><code>E[foo*="bar"]</code></td>
                                    <td>An E element whose “foo” attribute value contains the substring “bar”</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#attribute-selectors">Attribute selectors</a></td>
                                </tr>
                                <tr>
                                    <td><code>E[foo|="en"]</code></td>
                                    <td>An E element whose “foo” attribute has a hyphen-separated list of values beginning (from the left) with “en”</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#attribute-selectors">Attribute selectors</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Back to Top</a></td>
                                    <td>&nbsp;</td>
                                </tr>
                        </tbody></table>

                        <table class="resource_table">
                        <caption>Structural Pseudo-Classes</caption>
                            <thead>
                                <tr>
                                    <th>Pattern</th>
                                    <th>Meaning</th>
                                    <th>Described in Section</th>
                                </tr>
                            </thead>
                                <tbody><tr>
                                    <td><code>E:root</code></td>
                                    <td>An E element, root of the document</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:nth-child(n)</code></td>
                                    <td>An E element, the n-th child of its parent</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:nth-last-child(n)</code></td>
                                    <td>An E element, the n-th child of its parent, counting from the last one</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:nth-of-type(n)</code></td>
                                    <td>An E element, the n-th sibling of its type</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:nth-last-of-type(n)</code></td>
                                    <td>An E element, the n-th sibling of its type, counting from the last one</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:first-child</code></td>
                                    <td>An E element, first child of its parent</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:last-child</code></td>
                                    <td>An E element, last child of its parent</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:first-of-type</code></td>
                                    <td>An E element, first sibling of its type</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:last-of-type</code></td>
                                    <td>An E element, last sibling of its type</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:only-child</code></td>
                                    <td>An E element, only child of its parent</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:only-of-type</code></td>
                                    <td>An E element, only sibling of its type</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:empty</code></td>
                                    <td>An E element that has no children (including text nodes)</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:root</code></td>
                                    <td>An E element, root of the document</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#structural-pseudos">Structural pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:not(s)</code></td>
                                    <td>An E element that does not match simple selector s</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#negation">Negation pseudo-classes</a></td>
                                </tr>

                                <tr>
                                    <td><a href="#">Back to Top</a></td>
                                    <td>&nbsp;</td>
                                </tr>
                        </tbody></table>

                        <table class="resource_table">
                        <caption>UI Pseudo-Classes</caption>
                            <thead>
                                <tr>
                                    <th>Pattern</th>
                                    <th>Meaning</th>
                                    <th>Described in Section</th>
                                </tr>
                            </thead>
                                <tbody><tr>
                                    <td><span><code>E:link</code></span><span><code>E:visited</code></span></td>
                                    <td>An E element being the source anchor of a hyperlink of which the target is not yet visited (:link) or already visited (:visited)</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#link">The link pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><span><code>E:active</code></span><span><code>E:hover</code></span><span><code>E:focus</code></span></td>
                                    <td>An E element during certain user actions</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#useraction-pseudos">The user action pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:target</code></td>
                                    <td>An E element being the target of the referring URI</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#target-pseudo">The target pseudo-class</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:lang(fr)</code></td>
                                    <td>An element of type E in language "fr" (the document language specifies how language is determined)</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#lang-pseudo">The :lang() pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><code>E:enabled</code></td>
                                    <td>A user interface element E which is enabled or disabled	</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#UIstates">The UI element states pseudo-classes</a></td>
                                </tr>
                                <tr>
                                    <td><span><code>E:disabled</code></span><span><code>E:checked</code></span></td>
                                    <td>A user interface element E which is checked&nbsp;(for instance a radio-button or checkbox)</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#UIstates">The UI element states pseudo-classes</a></td>
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
                                    <th>Pattern</th>
                                    <th>Meaning</th>
                                    <th>Described in Section</th>
                                </tr>
                            </thead>
                                <tbody><tr>
                                    <td><code>E::first-line</code></td>
                                    <td>The first formatted line of an E element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#first-line">The ::first-line pseudo-element</a></td>
                                </tr>
                                <tr>
                                    <td><code>E::first-letter</code></td>
                                    <td>The first formatted letter of an E element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#first-letter">The ::first-letter pseudo-element</a></td>
                                </tr>
                                <tr>
                                    <td><code>E::before</code></td>
                                    <td>Generated content before an E element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#gen-content">The ::before pseudo-element</a></td>
                                </tr>
                                <tr>
                                    <td><code>E::after</code></td>
                                    <td>Generated content after an E element</td>
                                    <td><a href="http://www.w3.org/TR/selectors/#gen-content">The ::after pseudo-element</a></td>
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
