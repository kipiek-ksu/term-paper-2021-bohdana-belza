program l8_16;
var p,l:longint;
function euk(n,m:longint):longint;
begin
     if n=m
     then euk:=n
     else if n>m
          then euk:=euk(n-m,m)
          else euk:=euk(n,m-n)
end;
Begin
     readln(n,m);
     writeln(euk(n,m));
End.