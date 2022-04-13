program l5z18;
var k:real;n,a,i:longint;
function st(a,b:longint):longint;
var i,g:longint;
         begin
         g:=1;
         for i:=1 to b do
          g:=g*a;
          st:=g;
         end;
Begin
     readln(a,n);
     k:=1;
     for i:=0 to n do
     k:=k*(a+i);
     k:=k/st(a,n);
     writeln(k:0:3);
End.