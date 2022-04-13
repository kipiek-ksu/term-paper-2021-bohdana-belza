program fs;
var
a,b,c,d,:integer;
begin
 read(a,b,c,d);
  if (a<=b) and (b<=c) and (c<=d) then write(d,d,d,d)
 else
  if (a>b) and (b>c) and (c>d) then write(a,b,c,d)
 else
 write( sqr(a),sqr(b),sqr(c),sqr(d));

end.