program K3_22;
var s,t,sum;
function g(a,b:real):real;
 begin
g:=(a*a+b*b)/(a*a+2*a*b+3*b*b+4);
 end;
begin
read (s,t);
sum:=g(1.2,s)+g(t,s)-g(2*s-1,s*t);
writeln(sum:0:3);
end.