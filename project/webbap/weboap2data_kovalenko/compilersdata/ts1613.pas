vara,b,h,x,y,z:real;
begin
Readln (a,b,h);
x:=a;
While x<=b do
      begin
      z:=exp(1+x);
      Writeln (z:0:4);
      x:=x+h;
      end;
Readln;
end.