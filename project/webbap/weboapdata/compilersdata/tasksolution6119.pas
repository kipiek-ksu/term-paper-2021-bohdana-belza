program D_5_13;
var i,i2,n: integer;
    k,m2,x: real;
begin
 read(n,x);
 k:=0;
 for i:=1 to n do
  begin
   m2:=1;
    for i2:=1 to i do
     m2:=m2*sin(x);
   k:=k+m2;
  end;
 writeln(k:0:4);
end.