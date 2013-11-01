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
			<header style="text-align: center;"> Dijkstra 算法 </header>

			<div class="section">
				<div>Dijkstra( 迪杰斯特拉 ) 算法是典型的单源最短 路径算法,用于计算一个节点到其他所有节点
					的最短路径。主要特点是以起始点为中心向外 层层扩展,直到扩展到终点为止。 Dijkstra 算
					法是很有代表性的最短路径算法,在很多专业 课程中都作为基本内容有详细的介绍,如数据 结构,图论,运筹学等等。 Dijkstra
					一般的表 述通常有两种方式,一种用永久和临时标号方 式,一种是用 OPEN, CLOSE 表的方式,这里
					均采用永久和临时标号的方式。注意该算法要 求图中不存在负权回路。 ( 判负权回路用 ballmanford)</div>
			</div>

			<div class="section">
				<div>官方算法描述</div>
				<ol>
					<li>置集合 S={2,3,...n}, 数组 d(1)=0, d(i)=W1-&gt;i(1,i 之间存在边 ) or + 无穷大
						(1.i 之间不存在边 )</li>
					<li>在 S 中,令 d(j)=min{d(i),i 属于 S} ,令 S=S-{j} ,若 S 为空集则算法结束, 否则转 3</li>
					<li>对全部 i 属于 S, 如果存在边 j-&gt;i , 那么置 d(i)=min{d(i), d(j)+Wj-&gt;i}
						,转 2</li>
				</ol>
			</div>

			<div class="section">
				<div>人性化算法描述</div>
				<div>s表示起点，t表示终点，path数组表示所有点到s的距离,集合T表示已经找到最短路的点集．集合S表示还未找到最短路的点集</div>
				<ol>
					<li>path[s] = 0, 其他path为正无穷，T为空集</li>
					<li>找到在 S 中 path 值最小的点，用它更新周围点的 path 值，然后把它加到 T 中</li>
					<li>如果 t 不在 T 中，重复 2，否则退出</li>
				</ol>
			</div>


			<div class="section">
				<div>复杂度分析</div>
				<ul>
					<li>Dijkstra 算法的时间复杂度为 O(n^2) 可以用堆优化 \(O(N*log^N)\)</li>
					<li>空间复杂度取决于存储方式,邻接 矩阵为 O(n^2)</li>
				</ul>
			</div>

			<div class="section">
				<div>一般的参考代码</div>
				<pre class="prettyprint">
#include&lt;iostream&gt;
#include&lt;string&gt;
#include&lt;queue&gt;
#include&lt;map&gt;
#include&lt;cmath&gt;
#include&lt;stack&gt;
#include&lt;algorithm&gt;
using namespace std;
const int  E=10000;//边的个数 
const int  V=10000;//定点的个数 
#define typec int // type of cost
const typec inf = 0x3f3f3f3f; // max of cost
typec cost[E], dist[V];
int e, pnt[E], nxt[E], head[V], prev[V], vis[V];
struct qnode {
	int v;typec c;
	qnode(int vv = 0, typec cc = 0) :
			v(vv), c(cc) {
	}
	bool operator &lt;(const qnode&amp; r) const {
		return c &gt; r.c;
	}
};
void dijkstra(int n, const int src) {
	qnode mv;
	int i, j, k, pre;
	priority_queue&lt;qnode&gt; que;
	vis[src] = 1;
	dist[src] = 0;
	que.push(qnode(src, 0));
	for (pre = src, i = 1; i &lt; n; i++) {
		for (j = head[pre]; j != -1; j = nxt[j]) {
			k = pnt[j];
			if (vis[k] == 0 &amp;&amp; dist[pre] + cost[j] &lt; dist[k]) {
				dist[k] = dist[pre] + cost[j];
				que.push(qnode(pnt[j], dist[k]));
				prev[k] = pre;
			}
		}
		while (!que.empty() &amp;&amp; vis[que.top().v] == 1)
			que.pop();
		if (que.empty())
			break;
		mv = que.top();
		que.pop();
		vis[pre = mv.v] = 1;
	}
}
inline void addedge(int u, int v, typec c) {
	pnt[e] = v;
	cost[e] = c;
	nxt[e] = head[u];
	head[u] = e++;
}
void init(int nv, int ne) {
	int i, u, v;
	typec c;
	e = 0;
	memset(head, -1, sizeof(head));
	memset(vis, 0, sizeof(vis));
	memset(prev, -1, sizeof(prev));
	for (i = 0; i &lt; nv; i++)
		dist[i] = inf;
	for (i = 0; i &lt; ne; ++i) {
		scanf("%d%d%d", &amp;u, &amp;v, &amp;c); // %d: type of cost
		addedge(u, v, c); // vertex: 0 ~ n-1, 单向边
	}
}
int main()
{
	return 0;
}
				</pre>
			</div>

			<div class="section">
				<div>一般的参考代码2(\(E*log^E\))</div>
				<pre class="prettyprint">
/*************************************************************************
    &gt; File Name: dijkstra.cpp
    &gt; Author: tiankonguse
    &gt; Mail: shen10000shen@gmail.com
    &gt; Created Time: 2013/5/5 9:54:20
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
const typec inf = 0x3f3f3f3f; // max of cost
typec cost[E], dist[V];
int e, pnt[E], nxt[E], head[V], prev[V], vis[V];

struct qnode {
    int v;
    typec c;
    qnode (int vv = 0, typec cc = 0) : v(vv), c(cc) {}
    bool operator &lt; (const qnode&amp; r) const {
        return c&gt;r.c;
    }
};

void dijkstra(int n, const int src) {
    qnode mv;
    int i, j, k, pre;
    priority_queue&lt;qnode&gt; que;
    vis[src] = 1;
    dist[src] = 0;
    que.push(qnode(src, 0));

    for (pre = src, i=1; i&lt;n; i++) {
        for (j = head[pre]; j != -1; j = nxt[j]) {
            k = pnt[j];
            if (vis[k] == 0 &amp;&amp; dist[pre] + cost[j] &lt; dist[k]) {
                dist[k] = dist[pre] + cost[j];
                que.push(qnode(pnt[j], dist[k]));
                prev[k] = pre;
            }
        }

        while (!que.empty() &amp;&amp; vis[que.top().v] == 1){
            que.pop();
        }

        if (que.empty()) break;
        mv = que.top();
        que.pop();
        vis[pre = mv.v] = 1;
    }
}

inline void addedge(int u, int v, typec c) {
    pnt[e] = v;
    cost[e] = c;
    nxt[e] = head[u];
    head[u] = e++;
}

void init(int nv, int ne) {
    int i, u, v;
    typec c;
    e = 0;
    memset(head, -1, sizeof(head));
    memset(vis, 0, sizeof(vis));
    memset(prev, -1, sizeof(prev));
    for (i = 0; i &lt; nv; i++) dist[i] = inf;
    for (i = 0; i &lt; ne; ++i) {
        scanf("%d%d%d", &amp;u, &amp;v, &amp;c);
        addedge(u, v, c);
        addedge(v, u, c);
    }
}

int main() {

    return 0;
}
				</pre>
			</div>
			<div class="section">
				<div>一般的参考代码3(\(n^2\))</div>
				<pre class="prettyprint">
/*************************************************************************
    &gt; File Name: dijkstra.cpp
    &gt; Author: tiankonguse
    &gt; Mail: shen10000shen@gmail.com
    &gt; Created Time: 2013/5/5 9:54:20
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

const int N = 100;
const int INF = 0x3ffff;
int cost[N][N];//两点之间的代价
int path[N];//当前节点的父亲
int lowcost[N];//当前节点到根的代价

//n个节点，st为源点
void dijkstra(int n,int st) {
    int i,j,_min;
    bool vis[N];

    memset(vis,0,sizeof(vis));
    vis[st] = 1;

    for(i=0; i&lt;n; i++) {
        lowcost[i] = cost[st][i];
        path[i] = st;
    }

    lowcost[st] = 0;
    path[st] = -1;//根
    int pre = st;

    for(i = 0; i &lt; n; i++) {
        for(j=0; j&lt;n; j++) {
            if(vis[j] == 0 &amp;&amp; lowcost[pre] + cost[pre][j] &lt; lowcost[j]) {
                lowcost[j] = lowcost[pre] + cost[pre][j];
                path[j] = pre;
            }
        }
        _min = INF;
        for(j=0; j&lt;n; j++) {
            if(vis[j] == 0 &amp;&amp; lowcost[j] &lt; _min) {
                _min = lowcost[j];
                pre = j;
            }
        }
        vis[pre] = 1;
    }
    return ;
}

int main() {

    return 0;
}
				</pre>
			</div>
			<div class="section">
				<div>一般的参考代码4(\(n^2\))</div>
				<pre class="prettyprint">
/*************************************************************************
    &gt; File Name: dijkstra_n_2_02.cpp
    &gt; Author: tiankonguse
    &gt; Mail: shen10000shen@gmail.com
    &gt; Created Time: 2013/5/7 9:19:13
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

const int N = 100;
const int INF = 0x3ffffff;
int cost[N][N];//两点之间的代价
int path[N];//当前节点的父亲
int lowcost[N];//当前节点到根的代价

//n个节点，st为源点
void dijkstra(int n,int st) {
    int i, j, _min, pre;
    bool vis[N];

    memset(vis,0,sizeof(vis));

    for(i=0; i&lt;n; i++) {
        lowcost[i] = cost[st][i];
        path[i] = st;
    }

    vis[st] = 1;
    lowcost[st] = 0;
    path[st] = -1;//根

    for(i = 0; i &lt; n; i++) {

        _min = INF;
        pre = st;

        for(j=0; j&lt;n; j++) {
            if(vis[j] == 0 &amp;&amp; lowcost[j] &lt; _min) {
                _min = lowcost[j];
                pre = j;
            }
        }

        if(pre == st)break;

        vis[pre] = 1;

        for(j=0; j&lt;n; j++) {
            if(lowcost[pre] + cost[pre][j] &lt; lowcost[j]) {
                lowcost[j] = lowcost[pre] + cost[pre][j];
                path[j] = pre;
            }
        }
    }
    return ;
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

