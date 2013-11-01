 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版 ~ 图论";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<style type="text/css">
.section {
	border: 1px dotted greenyellow;
	margin: 5px;
	padding: 1px;
}

.subsection {
	margin-left: 20px;
	margin-right: 20px;
	border: 1px dotted rgb(102, 85, 85);
	margin-top: 5px;
}

.subsubsection {
	margin-left: 40px;
	margin-right: 40px;
	border: 1px dotted rgb(102, 85, 85);
	margin-top: 5px;
}
</style>
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header class="fixed-header">
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/">acm模版 </a>
		</div>
	</header>

	<section class="fixed-content">
		<div class="section">
			<div class="section-title">
				<h2>图论</h2>

			</div>
			<div>
				<pre class="prettyprint">
</pre>

			</div>
			<div class="subsection">
				<h3>图的一维数组邻接表表示法</h3>
				<pre class="prettyprint">
const int N=10000;
const int M=100;
int fir[N],toV[M],len[M],next[M],cnt;
void addedge(int u, int v, int w) {
    toV[cnt] = v;
    len[cnt] = w;
    next[cnt] = fir[u];
    fir[u] = cnt++;
}
void init(int nv, int ne) {
    memset(fir, -1, sizeof(fir));
    cnt=0;
    int u,v,w;
    for (int i = 0; i &lt; ne; ++i) {
        scanf("%d%d%d", &amp;u, &amp;v, &amp;w);
        addedge(u, v, w); // 不加下面的为有向图
        addedge(v u, w); // 加下面额为无向图
    }
}
</pre>

			</div>
			<div class="subsection">
				<h3>Dijkstra</h3>
				<pre class="prettyprint">
适用条件
	单源最短路径(从源点 s 到其它所有顶点 v); 
	不存在负边权

原始算法
1 对于全体点集，划分为两个集合，一个为达成最短路的集合，一个反之
2 每次松弛操作为
	1.将当前离源点最近的点加入达成最短路的集合
	2.根据新加入的点，维护未加入的点的最短距离
	3 直至找到目标点加入

考虑和最小生成树 Prime 的相似之处
复杂度 O(n^2)，不可以处理负权图

优化方式
	可以考虑在选择最近点的时候，选择用堆来优化
	复杂度约为 O(n*logn)

</pre>

				<div class="subsubsection">
					<h4>O($n^2$)算法</h4>
					<pre class="prettyprint">
const int N = 100;
const int INF = 0x3ffff;
int cost[N][N];//两点之间的代价
int path[N];//当前节点的父亲
int lowcost[N];//当前节点到根的代价
//n 个节点，st 为源点
void dijkstra(int n,int st) {
    int i, j, _min, pre;
    bool vis[N];
    memset(vis,0,sizeof(vis));
    vis[st] = 1;
    for(i=0; i&lt;n; i++) {
        lowcost[i] = cost[st][i];
        path[i] = st;
    }
    lowcost[st] = 0;
    path[st] = -1;
    pre = st;
    for(i = 0; i &lt; n; i++) {
        for(j=0; j&lt;n; j++)
            if(vis[j]==0&amp;&amp;lowcost[pre]+cost[pre][j]&lt;lowcost[j])
                lowcost[j]=lowcost[pre]+ lost[pre][j], path[j] = pre;
 
        _min = INF;
        for(j=0; j&lt;n; j++)
            if(vis[j] == 0 &amp;&amp; lowcost[j] &lt; _min)
                _min = lowcost[j] , pre = j;
 
        vis[pre] = 1;
    }
    return ;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>堆优化 O(n*log(n))算法</h4>
					<pre class="prettyprint">
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
        while (!que.empty() &amp;&amp; vis[que.top().v] == 1) {
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
 
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>Bellman-Ford</h3>
				<pre class="prettyprint">
适用条件
	单源最短路径(从源点 s 到其它所有顶点 v); 
	可以存在负边权

原始算法
（1）初始化：将除源点外的所有顶点的最短距离估计值 d[v] ←+∞, d[s] ←0;
（2）迭代求解：反复对边集 E 中的每条边进行松弛操作，使得顶点集 V 中的每个顶点 v 的最短距离估计值逐步逼近其最短距离；（运行|v|-1 次）
（3）检验负权回路：判断边集 E 中的每一条边的两个端点是否收敛。如果存在未收敛的顶点，则算法返回 false，表明问题无解；否则算法返回 true，并且从源点可达的顶点 v 的最短距离保存在 d[v]中。
</pre>

			</div>
			<div class="subsection">
				<h3>SPFA</h3>
				<pre class="prettyprint">
将源点入队
队列不空时循环：
	从队列中取出一个点
	对于该点所有邻接定点，如果通过取出点中转后距离更短
	更新最短距离
	如果该点不再队列中，入队
结束

SPFA 是 Bellman-Ford 的其中一种实现，一般都不用前者，而用 SPFA。
O(kE)，除了个别最坏的情况外，是个很好的算法。

Bellman-Ford 算法的一种队列实现，减少了不必要的冗余计算。 
它可以在 O(kE)的时间复杂度内求出源点到其他所有点的最短路径，可以处理负边。

原理：只有那些在前一遍松弛中改变了距离估计值的点，才可能引起他们的邻接点的距离估计值的改变。
判断负权回路：记录每个结点进队次数，超过|V|次表示有负权。

</pre>

				<div class="subsubsection">
					<h4>栈实现</h4>
					<pre class="prettyprint">
const int INF = 0x3F3F3F3F;
const int V = 30001;
const int E = 150001;
int pnt[E], cost[E], nxt[E];
stack&lt;int&gt;sta;
int e, head[V];
int dist[V];
bool vis[V];
void init() {
    e = 0;
    memset(head, -1, sizeof(head));
}
void addedge(int u, int v, int c) {
    pnt[e] = v;
    cost[e] = c;
    nxt[e] = head[u];
    head[u]
    = e++;
}
int SPFA(int src, int n) {
    int i,u,v;
    for( i=1; i &lt;= n; ++i ) {
        vis[i] = 1;
        dist[i] = INF;
    }
    while(!sta.empty())sta.pop();
    dist[src] = 0;
    sta.push(src);
    vis[src] = 0;
    while(!sta.empty()) {
        u=sta.top();
        sta.pop();
        vis[u] = 1;
        for( i=head[u]; i != -1; i=nxt[i] ) {
            v = pnt[i];
            if(dist[v] &gt; dist[u] + cost[i]) {
                dist[v] = dist[u] + cost[i];
                if(vis[v]) {
                    sta.push(v);
                    vis[v] = 0;
                }
            }
        }
    }
    return dist[n];
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>队列实现</h4>
					<pre class="prettyprint">
而且有负权回路判断
const int INF = 0x3F3F3F3F;
const int V = 1001;
const int E = 20001;
int pnt[E], cost[E], nxt[E];
int e, head[V], dist[V];
bool vis[V];
int cnt[V]; // 入队列次数
queue&lt;int&gt; que;
void init() {
    e = 0;
    memset(head, -1, sizeof(head));
}
inline void addedge(int u, int v, int c) {
    pnt[e] = v;
    cost[e] = c;
    nxt[e] = head[u];
    head[u] = e++;
}
int SPFA(int src, int n) {
    int i,u,v;
    for( i=1; i &lt;= n; ++i ) {
        dist[i] = INF;
        cnt[i]=0;
        vis[i]=1;
    }
    while(!que.empty())que.pop();
    que.push(src);
    vis[src] =0;
    dist[src] = 0;
    +
    +cnt[src];
    while( !que.empty() ) {
        u = que.front();
        que.pop();
        vis[u] =1;
        for( i=head[u]; i != -1; i=nxt[i] ) {
            v = pnt[i];
            if(dist[v] &gt; dist[u] + cost[i] ) {
                dist[v] = dist[u] + cost[i];
                if(vis[v]) {
                    que.push(v);
                    vis[v]=0;
                    if((++cnt[v])&gt;n)return -1;//出现负权回路
                }
            }
        }
    }
    if( dist[n] == INF ) return -2; // src 与 n 不可达
    return dist[n]; // 返回 src 到 n 的最短距离
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>Vector 储存</h4>
					<pre class="prettyprint">

typedef struct {
    int from,to,dis;
} E;
int N,M,X;
vector&lt; vector&lt;E&gt; &gt; map;
queue&lt;int&gt; que;
vector&lt;bool&gt; inQue;
vector&lt;int&gt; dis;

{
    /*X 为源点*/
    map.clear();
    while(!que.empty())que.pop();
    inQue.clear();
    dis.clear();
    map.resize(N+1);
    inQue.resize(N+1,false);
    dis.resize(N+1,INF);
    map2.resize(N+1);//初始化 map2
    for(i=0; i&lt;M; i++) {
        scanf("%d%d%d",&amp;e.from,&amp;e.to,&amp;e.dis);
        map[e.from].push_back(e);
    }
    que.push(X);
    inQue[X]=true;
    dis[X]=0;
    while(!que.empty()) {
        w=que.front();
        que.pop();
        inQue[w]=false;
        for(i=0; i&lt;map[w].size(); i++) {
            if(dis[map[w][i].to]&gt;dis[w]+map[w][i].dis) {
                dis[map[w][i].to]=dis[w]+map[w][i].dis;
                if(!inQue[map[w][i].to]) {
                    que.push(map[w][i].to);
                    inQue[map[w][i].to]=true;
                }
            }
        }
    }
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>最小生成树</h3>
				<pre class="prettyprint">
</pre>

				<div class="subsubsection">
					<h4>Kruskal 算法</h4>
					<pre class="prettyprint">
const int N=1000;
const int E = N*N/2;
struct Edge {
    int from,to,val;
    bool operator&lt;=(const Edge&amp; e)const {
        return val &lt;= e.val;
    }
    bool operator&lt;(const Edge&amp; e)const {
        return val &lt; e.val;
    }
} edge[E];
int pre[N],rank[N];
void init(int n) {
    for(int i=0; i&lt;n; i++) {
        pre[i] = i, rank[i] = 0;
    }
}
int find_pre(int node) {
    if(pre[node] != node) {
        pre[node] = find_pre(pre[node]);
    }
    return pre[node];
}
void merge_pre(int from, int to) {
    from = find_pre(from);
    to = find_pre(to);
    if(from != to) {
        if(rank[from] &gt; rank[to]) {
            pre[to] = from;
        } else {
            pre[from] = to;
            if(rank[from] == rank[to]) {
                ++rank[to];
            }
        }
    }
}
int kruskal(int n,int m) {
    sort(edge, edge + m);
    init(n);
    int find_edge = 0, i, pre_from, pre_to;
    int w = 0;
    for(i = 0; i &lt; m; i++) {
        pre_from = find_pre(edge[i].from);
        pre_to = find_pre(edge[i].to);
        if(pre_from == pre_to) {
            continue;
        }
        merge_pre(pre_from, pre_to);
        w += edge[i].val;
        find_edge++;
        if(find_edge+1 == n)break;
    }
    return w;
}

</pre>
				</div>

				<div class="subsubsection">
					<h4>Prim 算法</h4>
					<pre class="prettyprint">
const int N=1000;
const int inf = 0x3fffffff;
int vis[N], lowc[N];
int prim(int cost[][N], int n,int st) {
    int minc, res = 0, i, j, pos;
    memset(vis,0,sizeof(vis));
    vis[st] = 1;
    for(i=0; i&lt;n; i++) {
        lowc[i] = cost[st][i];
    }
    lowc[st] = inf;
    for(i = 0; i &lt; n; i++) {
        minc = inf;
        for(j = 0; j &lt; n; j++) {
            if(vis[j] == 0 &amp;&amp; minc &gt; lowc[j]) {
                minc = lowc[j];
                pos = j;
            }
        }
        if(inf == minc)return -1;
        res += minc;
        vis[pos] = 1;
        for(j = 0; j &lt; n; j++) {
            if(vis[j] == 0 &amp;&amp; lowc[j] &gt; cost[pos][j]) {
                lowc[j] = cost[pos][j];
            }
        }
    }
    return res;
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>欧拉图</h3>
				<pre class="prettyprint">
欧拉通路 (欧拉迹):通过图中每条边且只通过一次，并且经过每一顶点的通路。
欧拉回路 (欧拉闭迹):通过图中每条边且只通过一次，并且经过每一顶点的回路。
欧拉图:存在欧拉回路的图。
简单说欧拉通路就是首尾不相接，而欧拉回路要求首尾相接。
</pre>

				<div class="subsubsection">
					<h4>无向图的判定</h4>
					<pre class="prettyprint">
欧拉通路:图连通；图中只有 2 个度为奇数的节点(就是欧拉通路的 2 个端点)
欧拉回路:图连通；图中所有节点度均为偶数
</pre>
				</div>

				<div class="subsubsection">
					<h4>有向图的判定</h4>
					<pre class="prettyprint">
欧拉通路:图连通；除 2 个端点外其余节点入度=出度；1 个端点入度比出度大 1；一个端点入度比出度小 1
欧拉回路:图连通；所有节点入度=出度
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>网络流</h3>
				<pre class="prettyprint">
const int N = 100;
const int E = 1000;
#define typec int // type of cost
const typec inf = 0x3f3f3f3f; // max of cost
struct edge {
    int x, y, nxt;
    typec c;
} bf[E];
int ne, head[N], cur[N], ps[N], dep[N];
void init() {
    ne = 2;
    memset(head,0,sizeof(head));
}
void addedge(int x, int y, typec c) {
//无向图需调用两次 addedge
// add an arc(x -&gt; y, c); vertex: 0 ~ n-1;
    bf[ne].x = x;
    bf[ne].y = y;
    bf[ne].c = c;
    bf[ne].nxt = head[x];
    head[x] = ne++;
    bf[ne].x = y;
    bf[ne].y = x;
    bf[ne].c = 0;
    bf[ne].nxt = head[y];
    head[y] = ne++;
}
typec flow(int n, int s, int t) {
    typec tr, res = 0;
    int i, j, k, f, r, top;
    while (1) {
        memset(dep, -1, n * sizeof(int));
        for (f = dep[ps[0] = s] = 0, r = 1; f != r; )
            for (i = ps[f++], j = head[i]; j; j = bf[j].nxt) {
                if (bf[j].c &amp;&amp; -1 == dep[k = bf[j].y]) {
                    dep[k] = dep[i] + 1;
                    ps[r++] = k;
                    if (k == t) {
                        f = r;
                        break;
                    }
                }
            }
        if (-1 == dep[t]) break;
        memcpy(cur, head, n * sizeof(int));
        for (i = s, top = 0; ; ) {
            if (i == t) {
                for (k = 0, tr = inf; k &lt; top; ++k)
                    if (bf[ps[k]].c &lt; tr)
                        tr = bf[ps[f = k]].c;
                for (k = 0; k &lt; top; ++k)
                    bf[ps[k]].c -= tr, bf[ps[k]^1].c += tr;
                res += tr;
                i = bf[ps[top = f]].x;
            }
            for (j=cur[i]; cur[i]; j = cur[i] = bf[cur[i]].nxt)
                if (bf[j].c &amp;&amp; dep[i]+1 == dep[bf[j].y]) break;
            if (cur[i]) {
                ps[top++] = cur[i];
                i = bf[cur[i]].y;
            } else {
                if (0 == top) break;
                dep[i] = -1;
                i = bf[ps[--top]].x;
            }
        }
    }
    return res;
}
</pre>

			</div>
			<div class="subsection">
				<h3>给定的度序列构成无向图</h3>
				<pre class="prettyprint">
对于一个给定的度序列，看能不能形成一个简单无向图
 Havel 算法的思想简单的说如下：
 （1）对序列从大到小进行排序。
 （2）设最大的度数为 t ，把最大的度数置0，然后把最大度数后（不包括自己）的 t 个度数分别减 1（意思就是把度数最大的点与后几个点进行连接）
 （3）如果序列中出现了负数，证明无法构成。如果序列全部变为 0，证明能构成，跳出循环。前两点不出现，就跳回第一步！

</pre>

			</div>
			<div class="subsection">
				<h3>最大团</h3>
				<pre class="prettyprint">
const int V = 1000;
int g[V][V], dp[V], stk[V][V], mx;
int dfs(int n, int ns, int dep) {
    if (0 == ns) {
        if (dep &gt; mx) mx = dep;
        return 1;
    }
    int i, j, k, p, cnt;
    for (i = 0; i &lt; ns; i++) {
        k = stk[dep][i];
        cnt = 0;
        if (dep + n - k &lt;= mx) return 0;
        if (dep + dp[k] &lt;= mx) return 0;
        for (j = i + 1; j &lt; ns; j++) {
            p = stk[dep][j];
            if (g[k][p]) stk[dep + 1][cnt++] = p;
        }
        dfs(n, cnt, dep + 1);
    }
    return 1;
}
int clique(int n) {
    int i, j, ns;
    for (mx = 0, i = n - 1; i &gt;= 0; i--) {
        for (ns = 0, j = i + 1; j &lt; n; j++)
            if (g[i][j]) stk[1][ ns++ ] = j;
        dfs(n, ns, 1);
        dp[i] = mx;
    }
    return mx;
}
 
</pre>

			</div>
			<div class="subsection">
				<h3>次小生成树</h3>
				<pre class="prettyprint">
#include &lt;iostream&gt;
#include &lt;cstdio&gt;
#include &lt;cstdlib&gt;
#include &lt;cmath&gt;
#include &lt;cstring&gt;
const int
MAXN=501,MAXM=MAXN*MAXN*4,INF=0x7FFFF
                              FFF;
using namespace std;
struct edge {
    edge *next,*op;
    int t,c;
    bool mst;
}
ES[MAXM],*V[MAXN],*MST[MAXN],*CLS[MAXN
                                 ];
int N,M,EC=-1,MinST,Ans,NMST;
int DM[MAXN],F[MAXN];
inline void addedge(edge **V,int a,int b,int c) {
    ES[++EC].next=V[a];
    V[a]=ES+EC;
    V[a]-&gt;t=b;
    V[a]-&gt;c=c;
    ES[++EC].next=V[b];
    V[b]=ES+EC;
    V[b]-&gt;t=a;
    V[b]-&gt;c=c;
    V[a]-&gt;op=V[b];
    V[b]-&gt;op=V[a];
    V[a]-&gt;mst=V[b]-&gt;mst=false;
}
void init() {
    int i,a,b,c;
    freopen("conf.in","r",stdin);
    freopen("conf.out","w",stdout);
    scanf("%d%d",&amp;N,&amp;M);
    for (i=1; i&lt;=M; i++) {
        scanf("%d%d%d",&amp;a,&amp;b,&amp;c);
        addedge(V,a,b,c);
    }
    Ans=INF;
}
void prim() {
    int i,j,Mini;
    for (i=1; i&lt;=N; i++)
        DM[i]=INF;
    for (i=1; i;) {
        DM[i]=-INF;
        for (edge *e=V[i]; e; e=e-&gt;next) {
            if (e-&gt;c &lt; DM[j=e-&gt;t]) {
                DM[j]=e-&gt;c;
                CLS[j]=e-&gt;op;
            }
        }
        Mini=INF;
        i=0;
        for (j=1; j&lt;=N; j++)
            if (DM[j]!=-INF &amp;&amp; DM[j]&lt;Mini) {
                Mini=DM[j];
                i=j;
            }
    }
    for (i=2; i&lt;=N; i++) {
        MinST+=CLS[i]-&gt;c;
        CLS[i]-&gt;mst=CLS[i]-&gt;op-&gt;mst=true;
        addedge(MST,CLS[i]-&gt;t,CLS[i]-&gt;op-&gt;t,CLS[i]-&gt;c);
    }
}
void dfs(int i) {
    for (edge *e=MST[i]; e; e=e-&gt;next) {
        int j=e-&gt;t;
        if (F[j]==-INF) {
            F[j]=F[i];
            if (e-&gt;c &gt; F[j])
                F[j]=e-&gt;c;
            dfs(j);
        }
    }
}
void smst() {
    int i,j;
    for (i=1; i&lt;=N; i++) {
        for (j=1; j&lt;=N; j++)
            F[j]=-INF;
        F[i]++;
        dfs(i);
        for (edge *e=V[i]; e; e=e-&gt;next) {
            if (!e-&gt;mst) {
                NMST=MinST + e-&gt;c -F[e-&gt;t];
                if (NMST &lt; Ans)
                    Ans=NMST;
            }
        }
    }
}
int main() {
    init();
    prim();
    smst();
    if (Ans==INF)
        Ans=-1;
    printf("Cost: %d\nCost: %d\n",MinST,Ans);
    return 0;
}
</pre>

			</div>
			<div class="subsection">
				<h3>第 K 短路</h3>
				<pre class="prettyprint">
使用 A*+djikstra 求第 k 短路。
#include&lt;iostream&gt;
#include&lt;cstdio&gt;
#include&lt;cstring&gt;
#include&lt;queue&gt;
#define MAXN 1001
using namespace std;
struct node {
    int p,g,h;
    bool operator &lt; (node a) const {
        return a.g+a.h&lt;g+h;
    }
};
struct node1 {
    int x,y,w,next;
} line[MAXN*100],line1[MAXN*100];
int n,m,i,link[MAXN],link1[MAXN],g[MAXN],s,e,k;
bool used[MAXN];
priority_queue&lt;node&gt; myqueue;
void djikstra() {
    int i,k,p;
    memset(used,0,sizeof(used));
    memset(g,0x7F,sizeof(g));
    g[e]=0;
    for (p=1; p&lt;=n; p++) {
        k=0;
        for (i=1; i&lt;=n; i++)
            if (!used[i] &amp;&amp; (!k || g[i]&lt;g[k]))
                k=i;
        used[k]=true;
        k=link1[k];
        while (k) {
            if (g[line1[k].y]&gt;g[line1[k].x]+line1[k].w)
                g[line1[k].y]=g[line1[k].x]+line1[k].w;
            k=line1[k].next;
        }
    }
    return ;
}
int Astar() {
    int t,times[MAXN];
    node h,temp;
    while (!myqueue.empty()) myqueue.pop();
    memset(times,0,sizeof(times));
    h.p=s;
    h.g=0;
    h.h=0;
    myqueue.push(h);
    while (!myqueue.empty()) {
        h=myqueue.top();
        myqueue.pop();
        times[h.p]++;
        if (times[h.p]==k &amp;&amp; h.p==e) return h.h+h.g;
        if (times[h.p]&gt;k) continue;
        t=link[h.p];
        while (t) {
            temp.h=h.h+line[t].w;
            temp.g=g[line[t].y];
            temp.p=line[t].y;
            myqueue.push(temp);
            t=line[t].next;
        }
    }
    return -1;
}
int main() {
    scanf("%d%d",&amp;n,&amp;m);
    memset(link,0,sizeof(link));
    memset(link1,0,sizeof(link1));
    for (i=1; i&lt;=m; i++) {
        scanf("%d%d%d",&amp;line[i].x,&amp;line[i].y,&amp;line[i].w);
        line[i].next=link[line[i].x];
        link[line[i].x]=i;
        line1[i].x=line[i].y;
        line1[i].y=line[i].x;
        line1[i].w=line[i].w;
        line1[i].next=link1[line1[i].x];
        link1[line1[i].x]=i;
    }
    scanf("%d%d%d",&amp;s,&amp;e,&amp;k);
    if (s==e) k++;
    djikstra();
    printf("%d\n",Astar());
    return 0;
}
</pre>

			</div>
			<div class="subsection">
				<h3>查分约束</h3>
				<pre class="prettyprint">
如果一个系统由 n 个变量和 m 个不等式组成，形如 Xj-Xi&lt;=b*k（i，j 属于[1，n]，k 属于[1，m] ）， 这样的系统称之为差分约束系统。

差分约束系统通常用于求关于一组变量的不等式组。

求解差分约束系统可以转化为图论中单源最短路问题。

Xj-Xi&lt;=k 
==&gt; d[v]-d[u]&lt;=w[u,v] 
==&gt; 所以转化为图论求解 

也就是 if(d[v]-d[u] &gt;w[u,v])那么 d[v]-d[u]&lt;=w[u,v] 。 
路径距离初始化 dis[i]=INF


再增加一个源点 s，源点到所有定点的距离为 0
(添加源点的实质意义为默认另外一系列的不等式组 Xi-X0&lt;=0）,再对源点利用 spfa 算法。
 
 注意几个问题：
 1、当 0 没有被利用的时候，0 作为超级源点。当 0 已经被利用了，将 n+1（未被利用）置为超级源点。
 2、对于 Xj-Xi=k 可以转换为 Xj-Xi&lt;=k Xj-Xi&gt;=k 来处理。
 3、若要判断图中是否出现负环，可以利用深度优先搜索。
 
 以前利用 spfa 是这样的（head-&gt;****-&gt;tail），当 head 和 tail 之间所有点都遍历完了才轮得上 tail 这个点，这样的话我们无法判断图中有没有负环，我们可以这样改变一样遍历顺序，head-&gt;tail-&gt;***-&gt;head。 

当深度优先搜索过程中下次再次遇见 head（也就是head 节点依然在标记栈中）时，则可判断图中含有负环，否则没有。

4、当图连通时，只需要对源点 spfa 一次；当图不连通时，对每个定点 spfa 一次。

5、对于 Xj-Xi&lt;k or Xj-Xi&gt;k , 差分约束系统只针对&gt;= or &lt;=， 所以我们还要进行巧妙转换编程大于等于小于等于。
</pre>

			</div>
			<div class="subsection">
				<h3>二分匹配</h3>
				<pre class="prettyprint">
</pre>

				<div class="subsubsection">
					<h4>Hungary（匈牙利）算法</h4>
					<pre class="prettyprint">
const int N=601;
//行为上部，列为下部，挑最少的点，使得所有的边和挑的点相连。最小顶点覆盖。
int n1,n2;
//n1,n2 为二分图的顶点集,其中 x∈n1,y∈n2
bool _map[N][N],vis[N];
int link[N];
//link 记录 n2 中的点 y 在 n1 中所匹配的 x 点的编号
int find(int x) {
    int i;
    for(i=0; i&lt;n2; i++) {
        if(_map[x][i]&amp;&amp;!vis[i]) {
//x-&gt;i 有边,且节点 i 未被搜索
            vis[i] = true;//标记节点已被搜索
//如果 i 不属于前一个匹配 M 或被 i 匹配到的节点可以寻找到增广路
            if(link[i]==-1 || find(link[i])) {
                link[i]=x;//更新
                return true;//匹配成功
            }
        }
    }
    return false;
}
int mach() {
    int ans = 0;
    memset(link, -1, sizeof(link));
    for (int i = 0; i &lt; n1; i++) {
        memset(vis,false,sizeof(vis));
        if (find(i))ans++;
// 如果从第 i 个点找到了增光轨，总数加一
    }
    return ans;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>Hopcroft–Karp 算法</h4>
					<pre class="prettyprint">
Hopcroft–Karp 算法是匈牙利算法的改进，时间复杂度 0(E*V^1/2).
算法实质其实还是匈牙利算法求增广路，改进的地方是在深度搜索增广路前，先通过广度搜索，查找多条可以增广的路线，从而不再让 dfs“一意孤行”。其中算法用到了分层标记防止多条增广路重叠，这里是精髓
typedef long long ll;
#define inf (int)1e10
#define maxn 50005
vector&lt;int&gt;vec[maxn];
int headU[maxn],headV[maxn];
int du[maxn],dv[maxn];
int uN,vN;
bool bfs() {
    queue&lt;int&gt;q;
    int dis=inf;
    memset(du,0,sizeof(du));
    memset(dv,0,sizeof(dv));
    for(int i=1; i&lt;=uN; i++)
        if(headU[i]==-1)q.push(i);
    while(!q.empty()) {
        int u=q.front();
        q.pop();
        if(du[u]&gt;dis)break;
        for(int i=0; i&lt;vec[u].size(); i++)
            if(!dv[vec[u][i]]) {
                dv[vec[u][i]]=du[u]+1;
                if(headV[vec[u][i]]==-1)dis=dv[vec[u][i]];
                else {
                    du[headV[vec[u][i]]]=dv[vec[u][i]]+1;
                    q.push(headV[vec[u][i]]);
                }
            }
    }
    return dis!=inf;
}
bool dfs(int u) {
    for(int i=0; i&lt;vec[u].size(); i++)
        if(dv[vec[u][i]]==du[u]+1) {
            dv[vec[u][i]]=0;
            if(headV[vec[u][i]]==-1||dfs(headV[vec[u][i]])) {
                headU[u]=vec[u][i];
                headV[vec[u][i]]=u;
                return 1;
            }
        }
    return 0;
}
int Hopcroft() {
    memset(headU,-1,sizeof(headU));
    memset(headV,-1,sizeof(headV));
    int ans=0;
    while(bfs())
        for(int i=1; i&lt;=uN; i++)
            if(headU[i]==-1&amp;&amp;dfs(i))ans++;
    return ans;
}
int main() {
    int u,v,w;
    while(~scanf("%d%d%d",&amp;u,&amp;v,&amp;w)) {
        for(int i=0; i&lt;maxn; i++)vec[i].clear();
        uN=u;
        int tu,tv;
        while(w--) {
            scanf("%d%d",&amp;tu,&amp;tv);
            vec[tu].push_back(tv);
        }
        printf("%d\n",Hopcroft());
    }
    return 0;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>最大权匹配的 KM 算法</h4>
					<pre class="prettyprint">
typedef long long ll;
#define inf (int)1e10
#define maxn 150
int edge[maxn][maxn];//邻接矩阵
int du[maxn],dv[maxn];//可行顶标
int head[maxn];//匹配节点的父节点
bool visu[maxn],visv[maxn];//判断是否在交错树上
int uN;//匹配点的个数
int slack[maxn];//松弛数组
bool dfs(int u) {
    visu[u]=true;
    for(int v=0; v&lt;uN; v++)
        if(!visv[v]) {
            int t=du[u]+dv[v]-edge[u][v];
            if(t==0) {
                visv[v]=true;
                if(head[v]==-1||dfs(head[v])) {
                    head[v]=u;
                    return true;
                }
            } else slack[v]=min(slack[v],t);
        }
    return false;
}
int KM() {
    memset(head,-1,sizeof(head));
    memset(du,0,sizeof(du));
    memset(dv,0,sizeof(dv));
    for(int u=0; u&lt;uN; u++)
        for(int v=0; v&lt;uN; v++)
            du[u]=max(du[u],edge[u][v]);
    for(int u=0; u&lt;uN; u++) {
        for(int i=0; i&lt;uN; i++)slack[i]=inf;
        while(true) {
            memset(visu,0,sizeof(visu));
            memset(visv,0,sizeof(visv));
            if(dfs(u))break;
            int ex=inf;
            for(int v=0; v&lt;uN; v++)if(!visv[v])
                    ex=min(ex,slack[v]);
            for(int i=0; i&lt;uN; i++) {
                if(visu[i])du[i]-=ex;
                if(visv[i])dv[i]+=ex;
                else slack[i]-=ex;
            }
        }
    }
    int ans=0;
    for(int u=0; u&lt;uN; u++)
        ans+=edge[head[u]][u];
    return ans;
}
int main() {
//read;
    while(~scanf("%d",&amp;uN)) {
        int sum=0;
        for(int i=0; i&lt;uN; i++)
            for(int j=0; j&lt;uN; j++) {
                scanf("%d",&amp;edge[i][j]);
                sum+=edge[i][j];
            }
        printf("%d\n",sum-KM());
    }
    return 0;
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>强连通分支算法</h3>
				<pre class="prettyprint">
有向图 G=(V, E)的一个强连通分支就是一个最大的顶点子集 C，对于 C 中每对顶点(s, t)，有 s 和 t 是强连通的，并且 t 和 s 也是强连通的，即顶点 s 和 t 是互达的。

</pre>

				<div class="subsubsection">
					<h4>Kosaraju 算法</h4>
					<pre class="prettyprint">
Kosaraju 算法的解释和实现都比较简单，为了找到强连通分支，首先对图 G 运行 DFS，计算出各顶点完成搜索的时间 f；然后计算图的逆图 GT，对逆图也进行 DFS 搜索，但是这里搜索时顶点的访问次序不是按照顶点标号的大小，而是按照各顶点 f 值由大到小的顺序；逆图 DFS 所得到的森林即对应连通区域
</pre>
				</div>

				<div class="subsubsection">
					<h4>矩阵储存</h4>
					<pre class="prettyprint">
const int MAXV = 1024;
int g[MAXV][MAXV], dfn[MAXV], num[MAXV], n,
scc, cnt;
void dfs(int k) {
    num[k] = 1;
    for(int i=1; i&lt;=n; i++)
        if(g[k][i] &amp;&amp; !num[i])
            dfs(i);
    dfn[++cnt] = k;//记录第cnt个出栈的顶点为k
}
void ndfs(int k) {
    num[k] = scc;
    for(int i=1; i&lt;=n; i++)
        if(g[i][k] &amp;&amp; !num[i])
            ndfs(i);
}
void kosaraju() {
    int i, j;
    for(i=1; i&lt;=n; i++)
        if(!num[i])
            dfs(i);
    memset(num, 0, sizeof num);
    for(i=n; i&gt;=1; i--)
        if(!num[dfn[i]]) {
            scc++;
            ndfs(dfn[i]);
        }
    cout&lt;&lt;"Found: "&lt;&lt;scc&lt;&lt;endl;
}

</pre>
				</div>


				<div class="subsubsection">
					<h4>邻接表储存</h4>
					<pre class="prettyprint">
const int MAXN = 100;
vector&lt;int&gt; adj[ MAXN ] ; //正向邻接表
vector&lt;int&gt; radj[ MAXN ] ; //反向邻接表
vector&lt;int&gt; ord; //后序访问顺序
int vis[MAXN],cnt,n;
void dfs ( int v ) {
    vis[v]=1;
    for (int i = 0, u, _size = adj[v].size(); i&lt; _size; i++ )
        if ( !vis[u=adj[v][i]] )
            dfs(u);
    ord.push_back(v);
}
void ndfs ( int v ) {
    vis[v]=cnt;
    for (int i = 0, u, _size = radj[v].size(); i &lt; _size; i++ )
        if ( !vis[u=radj[v][i]] )
            ndfs(u);
}
void kosaraju () {
    int i;
    memset(vis,0,sizeof(vis));
    ord.clear();
    for ( i=0 ; i&lt;n ; i++ )
        if ( !vis[i] )
            dfs(i);
    memset(vis,0,sizeof(vis));
    for ( cnt=0,i=ord.size()-1 ; i&gt;=0 ; i-- )
        if ( !vis[ord[i]] ) {
            ndfs(ord[i]);
            cnt++;
        }
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>Tarjan 算法</h3>
				<pre class="prettyprint">
#define M 5010 //题目中可能的最大点数

int STACK[M],top=0; //Tarjan 算法中的栈
bool InStack[M]; //检查是否在栈中
int DFN[M]; //深度优先搜索访问次序
int Low[M]; //能追溯到的最早的次序
int ComponentNumber=0; //有向图强连通分量个数
int Index=0; //索引号
vector &lt;int&gt; Edge[M]; //邻接表表示
vector &lt;int&gt; Component[M]; //获得强连通分量结果
int InComponent[M]; //记录每个点在第几号强连通分量里
int ComponentDegree[M]; //记录每个强连通分量的度
void Tarjan(int i) {
    int j;
    DFN[i]=Low[i]=Index++;
    InStack[i]=true;
    STACK[++top]=i;
    for (int e=0; e&lt;Edge[i].size(); e++) {
        j=Edge[i][e];
        if (DFN[j]==-1) {
            Tarjan(j);
            Low[i]=min(Low[i],Low[j]);
        } else if (InStack[j])
            Low[i]=min(Low[i],DFN[j]);
    }

    if (DFN[i]==Low[i]) {
        ComponentNumber++;
        do {
            j=STACK[top--];
            InStack[j]=false;
            Component[ComponentNumber].push_back(j);
            InComponent[j]=ComponentNumber;
        } while (j!=i);
    }
}

void solve(int N) {
    memset(STACK,-1,sizeof(STACK));
    memset(InStack,0,sizeof(InStack));
    memset(DFN,-1,sizeof(DFN));
    memset(Low,-1,sizeof(Low));
    for(int i=0; i&lt;N; i++)
        if(DFN[i]==-1)
            Tarjan(i);
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

