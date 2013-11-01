<?php
session_start ();
require ("../../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "acm算法讲解";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>acm/css/main.css" rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN;?>";
</script>

<body>

	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/info">acm算法讲解 </a>
			<div class="sub-title">
				<strong>作者:</strong> tiankonguse <strong>电子邮件:</strong> <a
					href="mailto:i@tiankonguse.com">i@tiankonguse.com</a> <strong>主页:</strong>
				<a href="http://tiankonguse.com/">http://tiankonguse.com/</a>
			</div>
		</div>

	</header>

	<section>
		<div class="container">
			<header style="text-align: center;"> Bellman-Ford 算法</header>

			<div class="section">
				<div>Dijkstra 算法中要求边的权非负,如果遇到负权,则可以采用 Bellman-Ford 算法。</div>
			</div>

			<div class="section">
				<h2>适用条件 &amp; 范围</h2>
				<ul>
					<li>单源最短路径 ( 从源点 s 到其它所有顶点 v);</li>
					<li>有向图 &amp; 无向图 ( 无向图可以看作 (u,v),(v,u) 同属于边集 E 的有向图 );</li>
					<li>边权可正可负 ( 如有负权回路输出错误提示 );</li>
					<li>差分约束系统 ;</li>
				</ul>
			</div>
			<div class="section">
				<h2>算法描述</h2>
				<ol>
					<li>对每条边进行 |V|-1 次 Relax 操作 ;|V| 表示节点的个 数</li>
					<li>如果存在 (u,v)∈E 使得 dis[u]+w(u,v) &lt; dis [v], 则存在负权回路 ; 否则 dis[v]
						即为 s 到 v 的最短距离 ,pre [v] 为前驱。 <br />dis[u] 表示经过第 1 步后 s 到 u 的最短距离
						,w 表示 u-&gt;v 边权值 ,pre[v] 所 表示的就是上一次更新 dis[v] 的中间点即第 1 步中的 u 点
					</li>
				</ol>
			</div>
			<div class="section">
				<h2>Bellman-Ford 算法思想</h2>
				<div>Bellman-Ford 算法能在更普遍的情况下 (存在负权边)解决单源点最短路径问题。 对于给定的带权(有向或无向)图 G=
					( V,E ),其源点为 s ,加权函数 w 是 边集 E 的映射。对图 G 运行 Bellman- Ford
					算法的结果是一个布尔值,表明图中是 否存在着一个从源点 s 可达的负权回路。若 不存在这样的回路,算法将给出从源点 s 到 图 G
					的任意顶点 v 的最短s路径 d[v] 。</div>
			</div>
			<div class="section">
				<h2>Bellman-Ford 算法流程</h2>
				<ol>
					<li>初始化:将除源点外的所有顶点的最短 距离估计值 d[v] ←+∞, d[s] ←0;</li>
					<li>迭代求解:反复对边集 E 中的每条 边进行松弛操作,使得顶点集 V 中的每个顶点 v
						的最短距离估计值逐步逼近其最短距离;(运行 |v|-1 次)</li>
					<li>检验负权回路:判断边集 E 中的每 一条边的两个端点是否收敛。如果存在未收敛的 顶点,则算法返回 false
						,表明问题无解;否则 算法返回 true ,并且从源点可达的顶点 v 的最 短距离保存在 d[v] 中。</li>
				</ol>
			</div>
			<div class="section">
				<h2>算法描述如下</h2>
				<pre class="prettyprint">
Bellman-Ford(G,w,s) : boolean // 图 G ,边集 函数 w , s 为源点
   1 for each vertex v ∈ V ( G ) do // 初始化 1 阶段
   2 d[v] ←+∞
   3 d[s] ←0; //1 阶段结束
   4 for i=1 to |v|-1 do //2 阶段开始,双重循环。
   5 for each edge ( u,v ) ∈ E(G) do // 边集数组要用到,穷举每条边。
   6 If d[v]&gt; d[u]+ w(u,v) then // 松弛判断
   7 d[v]=d[u]+w(u,v) // 松弛操作 2 阶段结束
   8 for each edge ( u,v ) ∈ E(G) do
   9 If d[v]&gt; d[u]+ w(u,v) then
   10 Exit false
   11 Exit true
					</pre>
			</div>
			<div class="section">
				<h2>描述性证明</h2>
				<ol>
					<li>首先指出,图的任意一条最短路径既不能包含 负权回路,也不会包含正权回路,因此它最多 包含 |v|-1 条边。</li>

					<li>其次,从源点 s 可达的所有顶点如果 存在 最短路径,则这些最短路径构成一个以 s 为根 的最短路径树。
						Bellman-Ford 算法的迭代松 弛操作,实际上就是按顶点距离 s 的层次,逐 层生成这棵最短路径树的过程。</li>
					<li>在对每条边进行 1 遍松弛的时候,生成了 从 s 出发,层次至多为 1 的那些树枝。也 就是说,找到了与 s 至多有 1
						条边相联的 那些顶点的最短路径;对每条边进行第 2 遍松弛的时候,生成了第 2 层次的树枝, 就是说找到了经过 2
						条边相连的那些顶点 的最短路径......。因为最短路径最多只包 含 |v|-1 条边,所以,只需要循环 |v|-1 次。</li>
					<li>每实施一次松弛操作,最短路径树上就会有一 层顶点达到其最短距离,此后这层顶点的最短 距离值就会一直保持不变,不再受后续松弛操
						作的影响。(但是,每次还要判断松弛,这里 浪费了大量的时间,怎么优化?单纯的优化是 否可行?)</li>
					<li>如果没有负权回路,由于最短路径树的高 度最多只能是 |v|-1 ,所以最多经过 |v|-1 遍 松弛操作后,所有从 s
						可达的顶点必将求出最 短距离。如果 d[v] 仍保持 +∞ ,则表明从 s 到 v 不可达。</li>
					<li>如果有负权回路,那么第 |v|-1 遍松弛操作仍然会成 功,这时,负权回路上的顶点不会收敛。</li>

				</ol>
			</div>
			<div class="section">
				<h2>松弛操作</h2>
				<div>松弛操作 ( 重定向自松弛技术 )</div>
				<div>单源最短路径算法中使用了松弛 ( relaxation )操作。对于每个顶点 v∈V ,都设 置一个属性 d[v]
					,用来描述从源点 s 到 v 的最 短路径上权值的上界,称为最短路径估计 ( shortest-path estimate )。。</div>
				<div>经过初始化以后,对所有 v∈V , π[v]=NIL ,对 v∈V-{s} , 有 d[s]=0 以及 d[v]=∞ 。
					π[v] 代表 S 到 v 的当前最短路径中 v 点之前的一个点的编号 , 我们用下面的 Θ(V) 时间的过程来
					对最短路径估计和前趋进行初始化</div>
				<pre class="prettyprint">INITIALIZE-SINGLE-SOURCE(G,s)
   1 for each vertex v∈V[G]
   2 do d[v]←∞
   3 π[v]←NIL
   4 d[s]←0
							</pre>
				<div>在松弛一条边 (u,v) 的过程中,要测试是否可 以通过 u ,对迄今找到的 v 的最短路径进行
					改进;如果可以改进的话,则更新 d[v] 和 π[v] 。一次松弛操作可以减小最短路径估计 的值 d[v] ,并更新 v 的前趋域
					π[v](S 到 v 的 当前最短路径中 v 点之前的一个点的编 号 ) 。下面的伪代码对边 (u,v) 进行了一步松 弛操作。</div>
				<pre class="prettyprint">RELAX(u, v, w)
   1 if(d[v]&gt;d[u]+w(u,v))
   2 then d[v]←d[u]+w(u,v)
   3 π[v]←u
						</pre>
				<div>每个单源最短路径算法中都会调用 INITIALIZE-SINGLE-SOURCE ,然后重复对边进 行松弛的过程。</div>
				<div>另外,松弛是改变最短路径和前趋的唯一 方式。各个单源最短路径算法间区别在 于对每条边进行松弛操作的次数,以及
					对边执行松弛操作的次序有所不同。在 Dijkstra 算法以及关于有向无回路图的 最短路径算法中,对每条边执行一次松 弛操作。在
					Bellman-Ford 算法中,每 条边要执行多次松弛操作。</div>
			</div>

			<div class="section">
				<div>参考代码</div>
				<pre class="prettyprint">
/*************************************************************************
    &gt; File Name: BellmanFord.cpp
    &gt; Author: tiankonguse
    &gt; Mail: shen10000shen@gmail.com
    &gt; Created Time: 2013/5/5 16:20:44
************************************************************************/

#include&lt;iostream&gt;
#include&lt;cstdio&gt;
#include&lt;cstring&gt;
#include&lt;cstdlib&gt;
#include&lt;set&gt;
#include&lt;map&gt;
#include&lt;queue&gt;
#include&lt;stack&gt;
#include&lt;functional&gt;
#include&lt;algorithm&gt;
using namespace std;
typedef int typec;
const int V = 100;
const int E = 10000;
const typec inf=0x3f3f3f3f; // max of cost
//n个定点，m个边
int n, m, pre[V], edge[E][3];
typec dist[V];
int relax (int u, int v, typec c) {
    if (dist[v] &gt; dist[u] + c) {
        dist[v] = dist[u] + c;
        pre[v] = u;
        return 1;
    }
    return 0;
}
int bellman (int src) {
    int i, j;
    for (i=0; i&lt;n; ++i) {
        dist[i] = inf;
        pre[i] = -1;
    }

    dist[src] = 0;
    bool flag;
    for (i=1; i&lt;n; ++i) {
        flag = false; // 优化
        for (j=0; j&lt;m; ++j) {
            if( 1 == relax(edge[j][0], edge[j][1], edge[j][2]) ) flag = true;
        }
        if( !flag ) break;
    }

    for (j=0; j&lt;m; ++j) {
        if (1 == relax(edge[j][0], edge[j][1], edge[j][2]))
            return 0; // 有负圈
    }
    return 1;
}


int main() {

    return 0;
}
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

