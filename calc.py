import operator as op; import re, sys

cat = ['+[]', '+!![]'] + [''.join(['!+[]'] + ['+!![]' for _ in (range(1, i))]) for i in range(2, 10)]

parse = '''
       var t,r,a,f, GgydmCQ={"FblpsuEanzgG":!+[]+!![]+!![]+!![]+!![]};
        t = document.createElement('div');
        t.innerHTML="<a href='/'>x</a>";
        t = t.firstChild.href;r = t.match(/https?:\/\//)[0];
        t = t.substr(r.length); t = t.substr(0,t.length-1);
        a = document.getElementById('jschl-answer');
        f = document.getElementById('challenge-form');
        ;GgydmCQ.FblpsuEanzgG+=!+[]+!![]+!![]+!![]+!![];GgydmCQ.FblpsuEanzgG-=!+[]+!![]+!![]+!![]+!![];GgydmCQ.FblpsuEanzgG+=!+[]+!![]+!![]+!![]+!![]+!![]+!![]+!![];GgydmCQ.FblpsuEanzgG*=+((!+[]+!![]+!![]+!![]+[])+(!+[]+!![]+!![]+!![]));GgydmCQ.FblpsuEanzgG-=+((!+[]+!![]+[])+(!+[]+!![]+!![]+!![]+!![]+!![]));GgydmCQ.FblpsuEanzgG-=+((!+[]+!![]+!![]+[])+(+[]));GgydmCQ.FblpsuEanzgG-=+((!+[]+!![]+[])+(!+[]+!![]+!![]+!![]+!![]));GgydmCQ.FblpsuEanzgG*=+((!+[]+!![]+!![]+[])+(!+[]+!![]+!![]+!![]+!![]+!![]+!![]+!![]+!![]));GgydmCQ.FblpsuEanzgG+=+((!+[]+!![]+[])+(!+[]+!![]+!![]+!![]+!![]+!![]+!![]+!![]+!![]));
'''

items = [filter(None, x) for x in re.findall(r'(?:(?:"(:)(.*?)})|([-+\*\/])=(.*?))\;', parse)]

def calc(s):
  output = None

  for o in ''.join(['\n' if e in list('()') else e for e in list(s)]).split('\n'):
    if '[' not in o: continue

    answer = 1 if o.replace('[]+[]', '[]') == '!![]' else cat.index(o.replace('[]+[]', '[]'))

    if isinstance(output, basestring) or '[]+[]' in o:
        answer = str(answer)
    
    if output == None:
      output = answer 
    else: 
      output += answer

  return output

def calculate(y, z, output):
  return ({'+': op.add, '-': op.sub, '*': op.mul, '/': op.div}[z])(output, y)

for s, l in items:
    c = int(calc(l))
    output = c if s == ':' else calculate(c, s, output)

print output
