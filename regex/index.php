
<div class="section">
	<div>目标</div>
	<div>
		把
		<pre>
&lt;li&gt;1000&lt;li&gt;
&lt;li&gt;1003&lt;/li&gt;
&lt;li&gt;1005&lt;/li&gt;
		</pre>
		转化为
		<pre>
&amp;lt;li&amp;gt;1000&amp;lt;li&amp;gt;
&amp;lt;li&amp;gt;1003&amp;lt;/li&amp;gt;
&amp;lt;li&amp;gt;1005&amp;lt;/li&amp;gt;
		</pre>
	</div>
	<div>搜索的正则表达式</div>
	<div>
		<pre>&lt;([^&gt;]*)&gt;</pre>
	</div>
	<div>替换的正则表达式</div>
	<div>
		<pre>&amp;lt;$1&amp;gt;</pre>
	</div>

</div>









目标 把下面的数据
<pre>
1000	1003	1004	1005	1006	1007	1015（学会dp）	1016	1017
1018	1042（dp）	1046（简单数学）	1054（简单的剪枝）

</pre>

转换为

<pre>
&lt;li&gt;1000&lt;li&gt;
&lt;li&gt;1003&lt;/li&gt;
&lt;li&gt;1005&lt;/li&gt;
&lt;li&gt;1006&lt;/li&gt;
&lt;li&gt;1007&lt;/li&gt;
&lt;li&gt;1015（学会dp）&lt;/li&gt;
&lt;li&gt;1016&lt;/li&gt;
&lt;li&gt;1017&lt;/li&gt;
&lt;li&gt;1018&lt;/li&gt;
&lt;li&gt;1042（dp）&lt;/li&gt;
&lt;li&gt;1046（简单数学）&lt;/li&gt;
&lt;li&gt;1054（简单的剪枝）&lt;/li&gt;
</pre>


([0-9]{4}(?:[^（(0-9]*[（(][^）)]*[)）])?) &lt;li&gt;$1&lt;/li&gt;





