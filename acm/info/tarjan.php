<?php
session_start ();
require ("../../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "acm算法讲解 ~ tarjan 求连通分支问题";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>acm/css/main.css" rel="stylesheet">
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN;?>";
</script>
</head>
<body>
    <header>
        <div class="title">
            <h1><a href="<?php echo MAIN_DOMAIN; ?>acm/info"><?php echo $title;?></a></h1>
            <div class="sub-title">
                <strong>作者:</strong> tiankonguse <strong>电子邮件:</strong> <a
                    href="mailto:i@tiankonguse.com">i@tiankonguse.com</a> <strong>主页:</strong>
                <a href="http://tiankonguse.com/">http://tiankonguse.com/</a>
            </div>
        </div>
    </header>

    <section>
        <div class="container">

            <div class="section">
                <h2>问题</h2>
                <div>在有向图G中，如果两个顶点间至少存在一条路径，称两个顶点强连通(strongly connected)。如果有向图G的任意两个顶点都强连通，称G是一个强连通图。</div>
            </div>

            <div class="section">
                <h2>Tarjan算法</h2>
                <div>
<p>Tarjan算法是基于对图深度优先搜索的算法，每个强连通分量为搜索树中的一棵子树。</p>
<p>搜索时，把当前搜索树中未处理的节点加入一个堆栈，回溯时可以判断栈顶到栈中的节点是否为一个强连通分量。</p>
<p>DFN(u)为节点u搜索的次序编号</p>
<p>Low(u)为u或u的子树能够追溯到的最早的栈中节点的次序号。</p>
<p>当DFN(u)=Low(u)时，以u为根的搜索子树上所有节点是一个强连通分量</p>
                </div>
            </div>
            <div class="section">
                <h2> tarjan 模板</h2>
                <div>
<pre class="prettyprint lang-cpp">// 图为 n 个点， m 条边。
int N,M;

// E[] 和 head, ecnt 使用边表储存有向图
struct edge {
    int from,to,next;
} E[MAXN];
int head[MAXN],ecnt;

// 如果在同一个联通分支里的点的 Belong 指向同一个数字
int Belong[MAXN];

// 辅助数组 以及变量
int Low[MAXN],DFN[MAXN],Stack[MAXN];
int Index,top;
bool Instack[MAXN];


// num[] 和 scc 为 联通分支的个数以及每个联通分支的大小
int num[MAXN],scc;

//用于向边表中插入一条有向边
void Insert(int from,int to) {
    E[ecnt].from=from;
    E[ecnt].to=to;
    E[ecnt].next=head[from];
    head[from]=ecnt++;
}


// 求u 出发可以找到的联通分支。
void Tarjan(int u) {
    int i,v;
    Low[u]=DFN[u]=++Index;
    Stack[++top]=u;
    Instack[u]=true;
    for(i=head[u]; i!=-1; i=E[i].next) {
        v=E[i].to;
        if(!DFN[v]) {
            // 没有形成环，继续深搜
            Tarjan(v);
            if(Low[u]&gt;Low[v]){
                //如果 u 大于  v, 说明 v 的某个儿子可以到达v的一个祖先，且这个祖先也是 u 的祖先。
                //那么把 u 的标记为那个临时祖先。
                Low[u]=Low[v];
            }

        } else if(Instack[v] &amp;&amp; Low[u]&gt;DFN[v]) {
            // 找到一个环， v 是 u 的一个祖先
            // u 的 临时祖先标记为 v.
            Low[u]=DFN[v];
        }

    }
    if(Low[u]==DFN[u]) {
        //能够到达这里，说明 u 是一个祖先了。
        //而且 Stack 中 u 之后的都是 u 的儿子，且可以互相到达。
        scc++;
        do {
            v=Stack[top--];
            Instack[v]=false;
            Belong[v]=scc;
            num[scc]++;
        } while(u!=v);
    }
    return;
}

void Init() {
    memset(head,-1,sizeof(head));
}

void Solve() {
    memset(num,0,sizeof(num));
    memset(DFN,0,sizeof(DFN));
    memset(Instack,false,sizeof(Instack));
    memset(Low,0,sizeof(Low));
    Index=scc=top=0;
    for(int  i=1; i&lt;=N; i++) { //缩点
        if(!DFN[i]) Tarjan(i);
    }
}
</pre>
                </div>
            </div>
            <div class="section">
                <h2>常用算法</h2>
                <ul>
                    <li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/tarjan.php">tarjan</a></li>
                    <li>Kosaraju算法</li>
                    <li>Gabow算法</li>
                </ul>
            </div>
        
        <div class="section">
            <h2>相关阅读</h2>
            <div>
                <p><a href="http://www.cppblog.com/MatoNo1/archive/2011/07/28/150748.html" target="_blank">http://www.cppblog.com/MatoNo1/archive/2011/07/28/150748.html</a></p>
                <p><a href="http://blog.csdn.net/bysen32/article/details/6882225" target="_blank">http://blog.csdn.net/bysen32/article/details/6882225</a></p>
            </div>
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
