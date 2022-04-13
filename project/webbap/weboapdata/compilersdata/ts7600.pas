program z1;
var a,b,c:integer;
begin
read(a,b,c);
if a>0 then a:=sqr(a);
if b>0 then b:=sqr(b);
if c>0 then c:=sqr(c);
write(a,' ',b,' ',c);
end.