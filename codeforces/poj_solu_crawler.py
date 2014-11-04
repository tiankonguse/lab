import urllib
import urllib2
from HTMLParser import HTMLParser

class GetSource(HTMLParser):
    def __init__(self):
        HTMLParser.__init__(self)
        self.links = []
    def handle_starttag(self, tag, attrs):
        if tag == 'a' and len(attrs) > 0:
            for (var, val) in attrs:
                if var == 'href' and val.startswith('showsource'):
                    self.links.append('http://poj.org/' + val)

class CodeParse(HTMLParser):
    def __init__(self):
        HTMLParser.__init__(self)
        self.code = []
        self.pro_id = ''
    def handle_starttag(self, tag, attrs):
        self.cur_tag = tag
        self.cur_att = attrs
        if tag == 'a':
            for (var, val) in attrs:
                if var == 'href' and val.startswith('problem'):
                    self.pro_id = val[-4:]
    def handle_data(self, data):
        if self.cur_tag == 'pre':
            self.code.append(str(data))
    def handle_entityref(self, name):
        self.code.append('&%s;' % (name))
    def handle_charref(self, name):
        self.code.append('&#%s;' % (name))

username = ‘mstchief’
req = urllib2.Request("http://poj.org/login")
rawdata = {'user_id1':username, 'password1':'jiubugaosunimima'}
data = urllib.urlencode(rawdata)
req.add_data(data)
opener = urllib2.build_opener(urllib2.HTTPCookieProcessor)
opener.open(req)
req = urllib2.Request('http://poj.org/status?result=0&user_id='+username)

r = opener.open(req)
sta = r.read()
hp = GetSource()
hp.feed(sta)
hp.close()
for add in hp.links:
    req = urllib2.Request(add)
    r = opener.open(req)
    codeparser = CodeParse()
    codeparser.feed(r.read())
    codeparser.close()
    print codeparser.pro_id
    output = open('source_' + codeparser.pro_id + '.cpp', 'w')
    for line in codeparser.code:
        output.write(codeparser.unescape(line))
    output.close()
