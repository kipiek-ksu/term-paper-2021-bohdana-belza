program tem2_51;
var k,t,n,n1,n2,d,x: real;
begin
 read(k,t,n);
 t:=t*60;
 d:=sqr(n*k)+4*n*t*k;
 x:=(n*k-sqrt(d))/(2*n);
 if x<0 then
  x:=(n*k+sqrt(d))/(2*n);
 n2:=t/x;
 n1:=t/(x-k);
 write(n1:0:3,' ',n2:0:3);
end.