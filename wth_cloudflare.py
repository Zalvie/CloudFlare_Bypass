import requests, urlparse

url = 'https://leakforums.org/index.php'

r = requests.get(url)

if r.status_code == 503 and 'refresh' in r.headers:
	r = requests.head(urlparse.urljoin(url, r.headers['refresh'][r.headers['refresh'].find('/'):]))
	print 'Clearance :', r.cookies['cf_clearance']
