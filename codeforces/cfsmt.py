#Codeforces solution submitter
#Usage: python cfsmt.py foo/bar/213C.cpp

import urllib2
import urllib
import sys

bound = 'abc650019169157247'
upload = '\r\n--' + bound + '\r\nContent-Disposition: form-data; name="sourceFile"; filename=""\r\nContent-Type: application/octet-stream\r\n\r\n'
useragent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:14.0) Gecko/20100101 Firefox/14.0.1'
def gen_data(key, val):
	global bound
	return '\r\n--' + bound + '\r\nContent-Disposition: form-data; name="%s"\r\n\r\n%s' % (key, val)

num_arg = len(sys.argv) - 1
if num_arg != 1:
	print 'Illegal argument!'
	sys.exit()
filepath = sys.argv[1]
reader = open(filepath, "r")
code = reader.read()
filename = filepath.split('/')[-1]
print filename + ' to submit:'
proid = filename.split('.')[0]
suffix = filename.split('.')[1]
if suffix == 'cpp':
	protype = 1
elif suffix == 'py':
	protype = 7
print proid, protype

opener = urllib2.build_opener(urllib2.HTTPCookieProcessor)
username = 'eucho'
password = '123456'
req_log = urllib2.Request('http://codeforces.com/enter')
data_log = 'submitted=true&handle=%s&password=%s&remember=on&_tta=84' % (username, password)
req_log.add_header('User-Agent', useragent)
req_log.add_data(data_log)
r = opener.open(req_log)
print 'Login success!'

req_sub = urllib2.Request('http://codeforces.com/problemset/submit')
req_sub.add_header('User-Agent', useragent)
req_sub.add_header('Connection', 'keep-alive')
req_sub.add_header('Content-Type', 'multipart/form-data; boundary=' + bound)
req_sub.add_header('Referer', 'http://codeforces.com/problemset/submit')
raw_data = ''
raw_data += gen_data('action', 'submitSolutionFormSubmitted')
raw_data += gen_data('submittedProblemCode', proid)
raw_data += gen_data('programTypeId', protype)
raw_data += gen_data('source', code)
raw_data += upload
raw_data += gen_data('_tta', '84')
raw_data += '\r\n--' + bound + '--'
res = open('raw', 'w')
res.write(raw_data)
print 'data length: ' + str(len(raw_data))
req_sub.add_header('Content-Length', len(raw_data))
req_sub.add_data(raw_data)
r = opener.open(req_sub)
print 'Submit success!'