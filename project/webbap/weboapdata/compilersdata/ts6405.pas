Program n;
var m,n,m1,n1,p:integer;
 Begin
     readln(m,n);
     m1:=m;
     n1:=n;
     while (n<>0) do
     begin
          m:=m+n;
          n:=m-n;
          m:=m-n;
          n:=n mod m;
     end;
     writeln(((m1/m)*(n1/m)*m):0:0);
End.