Program l2_43;
var t,m,s,D:real;
begin
read(t,m,s);
D:=sqr(t*m)+4*t*s*m;
if D<=0 then write ('net reshenii');
else
v:=((-t)*m+sqrt(D))/(2*t);
if v<0 then write('net reshenii') else
write(v:2:3);
end.