Program z15;
var a,b:integer; r,u,v:real;
begin
  readln(a,b);
  if a>b then u:=b else u:=a;
  if a*b>(a+b) then v:=a+b else v:=a*b;
  if (u+sqr(v))>3.14 then r:=3.14 else r:=u+sqr(v);
  writeln(r:2:3);
end.