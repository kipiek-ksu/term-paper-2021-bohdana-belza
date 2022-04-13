program l5z13;
var x,k:real;n,i:longint;
function st(a,b:real):real;
var i:word;g:real;
         begin
         g:=1;
         for i:=1 to trunc(b) do
          g:=g*a;
          st:=g;
         end;
Begin
     readln(n,x);

     for i:=1 to n do
     k:=k+st(sin(x),i);

     writeln(k:0:4);
End.