var a,b: Real;
    u,v: Real;

 Function min (a,b:Real):Real;
 begin
  If a>b then min:=b
         else min:=a;
  end;

begin
 read(a,b);
 u:=min(a,b);
 v:=min(a*b, a+b);
 writeln(min(u+sqr(v),3.14):5:3);
end.
