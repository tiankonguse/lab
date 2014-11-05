<?php
/*
------WebKitFormBoundaryvqP1gmt6BGTL7bHc
Content-Disposition: form-data; name="sourceFile"; filename=""
Content-Type: application/octet-stream

contestId
472

submittedProblemIndex 
A

programTypeId 

1 "GNU C++ 4.7"
5 "Java 6"
23 "Java 7"
36 "Java 8"
13 "Perl 5.12"
6 "PHP 5.3"
7 "Python 2.7"
31 "Python 3.3"
8 "Ruby 2"
34 "JavaScript V8 3"
*/
function submit($contestId, $problem, $lang, $source){
    $submitUrl = "http://codeforces.com/contest/".$contestId."/submit";
    
    $ret = post($submitUrl);
    
    $csrf = getCsrfToken($ret);

    $_tta = tta();
    
    $data = array(
			'csrf_token' => $csrf,
			'action' => "submitSolutionFormSubmitted",
			'_tta' => $_tta,
			'submittedProblemIndex' => $problem,
			'programTypeId' => $lang,
			'contestId' => $contestId,
			'source' => $source
	);
    

    
    $header = array();
    $header[] = "Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryYNYmdyfCkN5wxdOg";
    
    $newSubmitUrl = $submitUrl."?csrf_token=".$csrf;
    $ret = post($newSubmitUrl, $data, $submitUrl, $header);
    
    myprint($ret);
    
    $ret = post("http://codeforces.com/contest/".$contestId."/my", array(), $newSubmitUrl);
    
    myprint($ret);
}



$source = '#include<cstdio>
#include<cstdlib>
#include<cstring>
#include<iostream>
#include<string>
#include<queue>
#include<map>
#include<cmath>
#include<stack>
#include<algorithm>
#include<functional>
#include<stdarg.h>
using namespace std;
#ifdef __int64
typedef __int64 LL;
#else
typedef long long LL;
#endif

const int debug = 0;
typedef unsigned uint;
typedef unsigned char uchar;

const int N = 400100;
const int OneNumMax = 1<<16;
char str1[N];
char str2[N];

int p1,p2,len,q;
int ans = 0;
int end;
uint* a;
uint* b;
uchar A[8][N];
uchar B[8][N];
int oneNum[OneNumMax];

void bulid(const char * const q, uchar A[32][N]) {
    int l = strlen(q);
    for(int i = 0; i < 8; i++) {
        for(int j = 0; i + j < l; j++) {
            if(q[i+j] == \'1\') {
                A[i][j>>3] |= (1U << (j & 7));
            }
        }
    }
}

inline uint countbits(uint x) {
    return oneNum[x >> 16] + oneNum[x & ((1 << 16) - 1)];
}

int main() {
    int q;
    for(int i = 1; i < OneNumMax; ++i) {
        oneNum[i] = oneNum[i >> 1] + (i & 1);
    }


    memset(A,0,sizeof(A));
    memset(B,0,sizeof(B));

    scanf("%s",str1);
    scanf("%s",str2);
    bulid(str1,A);
    bulid(str2,B);
    scanf("%d",&q);
    while(q--) {
        scanf("%d%d%d",&p1,&p2,&len);

        ans = 0;
        a = (uint*)(A[p1&7] + (p1>>3));
        b = (uint*)(B[p2&7] + (p2>>3));
        end = p1 + len;
        while(len >= 32) {
            ans += countbits(*a++ ^ *b++);
            len -= 32;
        }

        ans += countbits((*a ^ *b) & ((1U << len) - 1));

        printf("%d\n",ans);
    }

    return 0;
}';

//submit("472", "A", "a", $source);