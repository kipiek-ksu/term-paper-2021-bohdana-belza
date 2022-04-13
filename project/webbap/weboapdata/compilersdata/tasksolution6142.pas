Program l7_1;
var p,x,sum:real;
    i:byte;
Begin
     readln(x);
     p:=x;
     sum:=x;
     i:=3;
     while i<14 do
     begin
          p:=(-p*sqr(x))/(i*(i-1));
          sum:=sum+p;
          i:=i+2;
          end;
     writeln(sum:0:6);
End.