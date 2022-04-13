program L_3_1;
var a,b,c,d,R:real;
function delta(k,m,n,p:real):real;
         var D:real;
         begin
           D:=k*p-m*n;
           delta:=D;
         end;
begin
     readln(a,b,c,d);
     R:=delta(a,b,c,d);
     writeln(R:0:3);
end.